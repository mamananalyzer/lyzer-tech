<?php

namespace App\Http\Controllers;

use App\Models\CRM;
use App\Models\User;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Quotation;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class CRMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = User::where('role_id', 1)->get();
        $customer = Customer::all();
        $sales_quot = User::where('role_id', 1)->get();
        $product = Product::all();
        $quotation_list = Quotation::all();
        return view('base.CRM', compact('sales', 'customer', 'sales_quot', 'product', 'quotation_list'));
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
        $idNumberQuot = str_pad($idNumberQuot+1, 3, '0', STR_PAD_LEFT);
        // Format the current date with Roman numerals for the month and last two digits of the year
        $romanMonth = intval(date('m'));
        $romanMonth = $romanMonth > 0 && $romanMonth < 13 ? $this->intToRoman($romanMonth) : '';
        $lastTwoDigitsOfYear = substr(date('Y'), -2);
        $quotNumber = 'Quot.' . $idNumberQuot . '/' . $romanMonth . '/' . $lastTwoDigitsOfYear . '/' . $request->input('sales');
        
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
        $total = $price*$request->input('qty');
        
        //$discount
        $discount = $request->input('discount', 90);
        
        //$amount
        $amount = $total-($total*$discount/100);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CRM $cRM)
    {
        //
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
    public function update(Request $request, CRM $cRM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CRM $cRM)
    {
        //
    }
}
