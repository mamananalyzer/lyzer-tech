<?php

namespace App\Http\Controllers;

use App\Models\CRM;
use App\Models\User;
use App\Models\CRMCustomer;
use App\Models\CRMVisit;
use App\Models\CRMPo;
use App\Models\Product;
use App\Models\Quotation;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use DataTables;

class CRMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Team Members
        $sales = User::where('role_id', 1)->get();
        $names = User::where('role_id', 1)->get('name');
        $task = DB::table('quotation')
            ->join('users', 'quotation.sales', '=', 'users.name')
            ->whereIn('users.name', $names)
            ->select('users.name', DB::raw('count(*) as task'))
            ->groupBy('users.name')
            ->get();
        $totaltask = Quotation::count();


        //Customer List
        $customer = CRMCustomer::all();
        // $customers = Customer::all();

        // dd($customers);

        // Quotation
        $quotation_list = Quotation::all();

        //Canvas Quot
        $sales_quot = User::where('role_id', 9)->get();
        $product = Product::all();

        return view('base.CRM', compact('sales', 'customer', 'sales_quot', 'product', 'quotation_list', 'task', 'totaltask'));
    }

    public function customer_getData()
    {
        $customers = CRMCustomer::all();

        // dd($customers);

        return DataTables::of($customers)
            ->editColumn('created_at', function ($customer) {
                return $customer->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function ($customer) {
                $showUrl = route('Customers.show', $customer->id_customer);
                $editUrl = route('Customers.edit', $customer->id_customer);
                $deleteUrl = route('Customers.destroy', $customer->id_customer);
                return '
                    <a href="' . $showUrl . '" class="btn btn-xs btn-primary">View</a>
                    ';
                    // <a href="' . $editUrl . '" class="btn btn-xs btn-primary">Edit</a>
                    // <form action="' . $deleteUrl . '" method="POST" style="display: inline-block;">
                    //     ' . csrf_field() . '
                    //     ' . method_field('DELETE') . '
                    //     <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    // </form>
            })
            ->rawColumns(['action']) // Allow raw HTML in the action column
            ->make(true);
    }

    public function visit_getData()
    {
        $visits = CRMVisit::all();

        // dd($visits);

        return DataTables::of($visits)
            ->editColumn('created_at', function ($visit) {
                return $visit->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function ($visit) {
                $showUrl = route('Visit.show', $visit->id_visit);
                $editUrl = route('Visit.edit', $visit->id_visit);
                $deleteUrl = route('Visit.destroy', $visit->id_visit);
                return '
                    <a href="' . $showUrl . '" class="btn btn-xs btn-primary">View</a>
                    <a href="' . $editUrl . '" class="btn btn-xs btn-primary">Edit</a>
                    ';
                    // <form action="' . $deleteUrl . '" method="POST" style="display: inline-block;">
                    //     ' . csrf_field() . '
                    //     ' . method_field('DELETE') . '
                    //     <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    // </form>
            })
            ->rawColumns(['action']) // Allow raw HTML in the action column
            ->make(true);
    }

    public function po_getData()
    {
        $po = CRMPo::all();

        // dd($po);

        return DataTables::of($po)
            ->editColumn('created_at', function ($po) {
                return $po->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function ($po) {
                $showUrl = route('Po.show', $po->id_po);
                $editUrl = route('Po.edit', $po->id_po);
                $deleteUrl = route('Po.destroy', $po->id_po);
                return '
                    <a href="' . $showUrl . '" class="btn btn-xs btn-primary">View</a>
                    <a href="' . $editUrl . '" class="btn btn-xs btn-primary">Edit</a>
                    ';
                    // <form action="' . $deleteUrl . '" method="POST" style="display: inline-block;">
                    //     ' . csrf_field() . '
                    //     ' . method_field('DELETE') . '
                    //     <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    // </form>
            })
            ->rawColumns(['action']) // Allow raw HTML in the action column
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    function intToRoman($num)
    {
        $roman = "";
        $map = array(
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1
        );

        foreach ($map as $romanDigit => $value) {
            $matches = intval($num / $value);
            $roman .= str_repeat($romanDigit, $matches);
            $num = $num % $value;
        }

        return $roman;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function quot_store(Request $request)
    {

        // dd($request->all());

        // Handle form submission logic here
        $validatedData = $request->validate([
            'project' => 'required',
            'customer' => 'required',
            'sales' => 'required',
            'status' => 'required',
            'paidby' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'qty' => 'required',
        ]);

        //$quotNumber
        $idNumberQuot = Quotation::latest('id_quotation')->value('id_quotation');
        $idNumberQuot = str_pad($idNumberQuot + 1, 3, '0', STR_PAD_LEFT);
        // Format the current date with Roman numerals for the month and last two digits of the year
        $romanMonth = intval(date('m'));
        $romanMonth = $romanMonth > 0 && $romanMonth < 13 ? $this->intToRoman($romanMonth) : '';
        $lastTwoDigitsOfYear = substr(date('Y'), -2);
        $quotNumber = $request->input('status') . $idNumberQuot . '/' . $romanMonth . '/' . $lastTwoDigitsOfYear . '/' . $request->input('sales');

        //$detail
        // Assuming $selectedType contains the selected type
        $selectedTypeforDetail = $request->input('type');
        // Retrieve the detail based on the selected type
        $detail = Product::where('type', $selectedTypeforDetail)->value('spek1');
        // $detail now contains the price for the selected type

        //$price
        // Assuming $selectedType contains the selected type
        $selectedTypeforPrice = $request->input('type');
        // Retrieve the price based on the selected type
        $price = Product::where('type', $selectedTypeforPrice)->value('price');
        // $price now contains the price for the selected type

        //$total
        $total = $price * $request->input('qty');

        //$discount
        $discount = $request->input('discount', 90);

        //$amount
        $amount = $total - ($total * $discount / 100);

        // Create a new User instance
        $quotation = Quotation::create([
            'quotNumber' => $quotNumber,
            'project' => $validatedData['project'],
            'customer' => $validatedData['customer'],
            'amount' => $amount,
            'sales' => $validatedData['sales'],
            'status' => $validatedData['status'],
            'paidby' => $validatedData['paidby'],
            'brand' => $validatedData['brand'],
            'type' => $validatedData['type'],
            'detail' => $detail,
            'price' => $price,
            'qty' => $validatedData['qty'],
            'total' => $total,
            'discount' => $discount,
        ]);

        $quotation->save();

        return redirect('/CRM')->with('success', 'Form submitted successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function customers_store(Request $request)
    {
        // dd($request->all());

        // Handle form submission logic here
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed file types and size as needed
            'area' => 'required|max:255',
            'address' => 'required|max:255',
            'phonenumber' => 'required|max:255',
            'mobilephone' => 'required|max:255',
            'company' => 'required|max:255',
            'position' => 'required|max:255',
        ]);


        $yearOfJoin = Carbon::now()->year;
        $validatedData['id_customer'] = $yearOfJoin . 1234;

        // $validatedData['company'] = $request->input('company', "PT. LyZer-Tech");
        $validatedData['image'] = $request->input('image', 1);
        $validatedData['status'] = $request->input('status', 1);

        // Handle file upload
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images', 'public');
        //     $validatedData['image'] = $imagePath;
        // } else {
        //     return redirect()->back()->withErrors(['image' => 'Image upload failed'])->withInput();
        // }

        // Create a new Customer instance
        $customer = new CRMCustomer([
            'id_customer' => $validatedData['id_customer'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'image' => $validatedData['image'],
            'area' => $validatedData['area'],
            'address' => $validatedData['address'],
            'phonenumber' => $validatedData['phonenumber'],
            'mobilephone' => $validatedData['mobilephone'],
            'company' => $validatedData['company'],
            'position' => $validatedData['position'],
            'status' => $validatedData['status'],
        ]);

        // dd($user); // Dump and die

        $customer->save();

        return redirect('/CRM')->with('success', 'Form submitted successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function visit_store(Request $request)
    {
        // dd($request->all());

        $request['contact_person'] = $request->input('password', '12345');
        $request['contact_number'] = $request->input('password', '12345');

        CRMVisit::create($request->only([
            'customer_name',
            'location',
            'contact_person',
            'contact_number',
            'visit_date',
            'visit_time',
            'purpose',
        ]));

        return back()->with('success', 'CRMVisit added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function po_store(Request $request)
    {
        // dd($request->all());

        // Set a default value for 'status'
        $request['status'] = $request->input('status', '1');

        // Initialize $filePath as null
        $filePath = null;

        // Store the file if it exists
        if ($request->hasFile('file_po')) {
            $fileName = $request->file('file_po')->getClientOriginalName();
            // Save the file in the "po" folder and get the file name only
            $request->file('file_po')->storeAs('po', $fileName, 'public');
            // Assign the file name to $filePath
            $filePath = $fileName;
        }

        // dd($filePath);

        // Create the CRMPo record
        CRMPo::create([
            'po_number' => $request->input('po_number'),
            'company' => $request->input('company'),
            'file_po' => $filePath, // Save the file path or null if no file uploaded
            'status' => $request->input('status'),
            'sales' => $request->input('sales'),
            'delivery_date' => $request->input('delivery_date'),
        ]);

        // Return success response
        return back()->with('success', 'CRMPo added successfully!');
    }

    public function po_download($filename)
    {
        $path = 'po/' . $filename;

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->download($path);
        }

        abort(404, 'File not found');
    }

    /**
     * Display the specified resource.
     */
    public function customers_show($CRMCustomer)
    {
        $CRMCustomer = CRMCustomer::findOrFail($CRMCustomer);
        // dd($CRMCustomer);

        // dd($role);
        return view('base.CRMCustomerShow', compact('CRMCustomer'));
    }

    public function po_show($CRMPo)
    {
        $CRMPo = CRMPo::findOrFail($CRMPo);
        // dd($CRMCustomer);

        // dd($role);
        return view('base.CRMPoShow', compact('CRMPo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CRM $cRM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function po_update(Request $request, CRMPo $CRMPo)
    {
        // dd($CRMPo->status);

        if ($request->hasFile('file_po')) {
            $fileName = $request->file('file_po')->getClientOriginalName();
            $request->file('file_po')->storeAs('po', $fileName, 'public');

            // Update both file_po and status in one operation
            $CRMPo->update([
                'file_po' => $fileName,
                'status' => $CRMPo->status + 1,
            ]);
        }

        return back()->with('success', 'File PO updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CRM $cRM)
    {
        //
    }

    public function visit_destroy($id_visit)
    {
        $id = CRMVisit::find($id_visit);

        if ($id) {
            $id->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
