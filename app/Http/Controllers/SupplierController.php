<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:suppliers',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Create a new supplier...
        $supplier = Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        // Redirect to the suppliers index page...
        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact( 'supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|regex:/^(\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9})$/',
            'address' => 'required|string',
        ]);

        // Update the product
        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect()->route('suppliers.edit', $supplier->id)->with('success', 'Product updated successfully');
    }
    public function show(Supplier $supplier)
    {
        // $product = $supplier->load('products');
        $products = $supplier->products; // retrieve all products supplied by the supplier

        // $products = Product::all();
        return view('suppliers.show', compact('supplier','products'));
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
            ->with('success', 'Product deleted successfully');
    }

}
