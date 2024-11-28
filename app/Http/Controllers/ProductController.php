<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $product = Product::all();
        return view('base.product'
            // , compact('product')
        );
    }

    public function getData()
    {
        $product = Product::all();

        return DataTables::of($product)
            ->editColumn('created_at', function ($product) {
                return $product->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function($product) {
                $showUrl = route('Product.show', $product->id_product);
                // $editUrl = route('Product.edit', $product->id_product);
                // <a href="'.$editUrl.'" class="btn btn-xs btn-primary">Edit</a>
                $deleteUrl = route('Product.destroy', $product->id_product);
                return '
                    <a href="'.$showUrl.'" class="btn btn-xs btn-primary">View</a>
                    <form action="'.$deleteUrl.'" method="POST" style="display: inline-block;">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>
                ';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_product)
    {
        $id = Product::find($id_product);

        if ($id) {
            $id->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
