<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Job; // Import the Job model
use App\Models\Team; // Ensure Team model is imported
use App\Models\Tool; // Ensure Tool model is imported
use App\Models\Product; // Ensure Product model is imported
use App\Models\Invoice; // Ensure Product model is imported

class CustomerController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            // Add other validation rules here
        ]);

        $customer = Customer::create($data);

        return response()->json(['message' => 'Customer created successfully', 'data' => $customer], 201);
    }

    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $data = $request->all();
        $customer->update($data);

        return response()->json($customer);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }

    public function getAllTeams()
{
    $teams = Team::all(); // Ensure Team model is properly set up
    return response()->json($teams);
}


public function getAllTools()
{
    $tools = Tool::all(); // Ensure Tool model is properly set up
    return response()->json($tools);
}
public function getAllJobs()
{
    $jobs = Job::all(); // Ensure Job model is properly set up
    return response()->json($jobs);
}


public function getAllProducts()
{
    $products = Product::all(); 
    return response()->json($products);
}

public function getProductById($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    return response()->json($product);
}

// Create a new product
public function createProduct(Request $request)
{

 


    $request->validate([
        'ProductDetail' => 'required|string|max:255',  // Use camelCase
        'Cost' => 'required|numeric',
        'QuickSelectOption' => 'required|boolean',
    ]);

    $product = Product::create([
        'ProductDetail' => $request->ProductDetail,
        'Cost' => $request->Cost,
        'QuickSelectOption' => $request->QuickSelectOption,
    ]);

    return response()->json($product, 201); // 201 Created
}

public function updateProduct(Request $request, $id)
{
    
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $validatedData = $request->validate([
        'ProductDetail' => 'required|string|max:255',  // Use camelCase
        'Cost' => 'required|numeric',
        'QuickSelectOption' => 'required|boolean',
    ]);

    \Log::info('Validated Data: ', $validatedData);
    \Log::info('Product Before Update: ', $product->toArray());
    \DB::enableQueryLog();

    // Map the fields to PascalCase for the database
    $product->update([
        'ProductDetail' => $validatedData['ProductDetail'],
        'Cost' => $validatedData['Cost'],
        'QuickSelectOption' => $validatedData['QuickSelectOption'],
    ]);
    \Log::info(\DB::getQueryLog());

    return response()->json($product, 200);
}



// Delete a product
public function deleteProduct($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $product->delete();

    return response()->json(['message' => 'Product deleted successfully']);
}

public function getAllInvoices()
{
    $invoices = Invoice::all(); 
    return response()->json($invoices);
}


}
