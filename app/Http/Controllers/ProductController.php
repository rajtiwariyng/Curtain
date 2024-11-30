<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\SupplierCollection;
use App\Models\SupplierCollectionDesign;
use App\Models\Color;
use App\Models\Composition;
use App\Models\DesignType;
use App\Models\ProductType;
use App\Models\Type;
use App\Models\Usage;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show the "Add Product" form
    public function create()
    {
        $suppliers=Supplier::all();
        $supplierCollection=SupplierCollection::all();
        $supplierCollectionDesign=SupplierCollectionDesign::all();
        $colours=Color::all();
        $compositions=Composition::all();
        $designTypes=DesignType::all();
        $productTypes=ProductType::all();
        $types=Type::all();
        $usages=Usage::all();
        return view('admin.product.create',compact('suppliers','supplierCollection','supplierCollectionDesign','colours','compositions','designTypes','productTypes','types','usages'));
    }

    // Store the product in the database
public function store(Request $request)
{
    $lastTallyCode = Product::max('tally_code');
    $lastDesignSKU = Product::max('design_sku');

    // Generate the next tally_code
    $nextTallyCode = $this->generateNextCode($lastTallyCode, 'CAB');

    // Generate the next design_sku
    $nextDesignSKU = $this->generateNextCode($lastDesignSKU, 'SKU');

    // Validate the incoming request data
    $request->validate([
        'product_name' => 'required|string|max:255',
        'file_number' => 'required|string|unique:products,file_number',
        'supplier_name' => 'required|integer',
        'supplier_collection' => 'required|integer',
        'supplier_collection_design' => 'required|integer',
        'rubs_martendale' => 'nullable|string|max:255',
        'width' => 'nullable|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image_alt' => 'required|string|max:255',
        'colour' => 'required|array|min:1',
        'colour.*' => 'string|max:255',
        'composition' => 'required|array|min:1',
        'composition.*' => 'string|max:255',
        'design_type' => 'required|array|min:1',
        'design_type.*' => 'string|max:255',
        'usage' => 'required|array|min:1',
        'usage.*' => 'string|max:255',
        'type' => 'required|array|min:1',
        'type.*' => 'string|max:255',
        'note' => 'nullable|string|max:255',
        'supplier_price' => 'required|numeric|min:0',
        'freight' => 'required|numeric|min:0',
        'profit_percentage' => 'required|numeric|min:0',
        'gst_percentage' => 'required|numeric|min:0',
        'mrp' => 'required|numeric|min:0',
    ]);

    // Handle the image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    // Prepare the data for insertion
    $productData = [
        'product_name' => $request->input('product_name'),
        'tally_code' => $nextTallyCode,
        'file_number' => $request->input('file_number'),
        'supplier_name' => $request->input('supplier_name'),
        'supplier_collection' => $request->input('supplier_collection'),
        'supplier_collection_design' => $request->input('supplier_collection_design'),
        'design_sku' => $nextDesignSKU,
        'rubs_martendale' => $request->input('rubs_martendale'),
        'width' => $request->input('width'),
        'image' => $imagePath,
        'image_alt' => $request->input('image_alt'),
        'colour' => json_encode($request->input('colour')), // Convert array to comma-separated string
        'composition' => json_encode($request->input('composition')), // Convert array to comma-separated string
        'design_type' => json_encode($request->input('design_type')), // Convert array to comma-separated string
        'usage' => json_encode($request->input('usage')), // Convert array to comma-separated string
        'type' => json_encode($request->input('type')), // Convert array to comma-separated string
        'note' => $request->input('note'),
        'currency' => $request->input('currency'),
        'supplier_price' => $request->input('supplier_price'),
        'freight' => $request->input('freight'),
        'duty_percentage' => $request->input('duty_percentage'),
        'profit_percentage' => $request->input('profit_percentage'),
        'gst_percentage' => $request->input('gst_percentage'),
        'mrp' => $request->input('mrp'),
        'unit' => $request->input('unit'),
    ];

    Product::create($productData);

    // Return a response, redirecting or showing a success message
    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}
 
 private function generateNextCode($lastCode, $prefix)
    {
        if (!$lastCode) {
            return $prefix . '000001'; // Starting point if no entries exist
        }

        // Extract the numeric part of the code
        $numberPart = (int) substr($lastCode, strlen($prefix));

        // Increment the number and format it back to a 6-digit string
        $nextNumber = str_pad($numberPart + 1, 6, '0', STR_PAD_LEFT);

        return $prefix . $nextNumber;
    }
 // Display the product list
 public function index()
 {
     $products = Product::with('ProductType','Supplier','SupplierCollection','SupplierCollectionDesign')->paginate(10); // You can adjust the pagination size
     $usages = Usage::all();
     $colors = Color::all();
     $compositions = Composition::all();
     $designTypes = DesignType::all(); // You can adjust the pagination size
     $types = Type::all();

     return view('admin.product.index', compact('products','usages','colors','compositions','designTypes','types'));
 }

 // Show the form for editing the product
 public function edit($id)
 {
     $product = Product::findOrFail($id);


     $product->usage = json_decode($product->usage, true);
     $product->colour = json_decode($product->colour, true);
     $product->composition = json_decode($product->composition, true);
     $product->design_type = json_decode($product->design_type, true);
     $product->type = json_decode($product->type, true);

    //  dd($product->usage);
    // Convert the comma-separated values back to arrays for use in the form
    // $product->usage = explode(',', $product->usage);
    // $product->colour = explode(',', $product->colour);
    // $product->composition = explode(',', $product->composition);
    // $product->design_type = explode(',', $product->design_type);
    // $product->type = explode(',', $product->type);

    $suppliers=Supplier::all();
    $supplierCollections=SupplierCollection::all();
    $supplierCollectionDesigns=SupplierCollectionDesign::all();
    $colours=Color::all();
    $compositions=Composition::all();
    $designTypes=DesignType::all();
    $productTypes=ProductType::all();
    $types=Type::all();
    $usages=Usage::all();

     return view('admin.product.edit', compact('product','suppliers','supplierCollections','supplierCollectionDesigns','colours','compositions','designTypes','productTypes','types','usages'));
 }

 // Update the product in the database
 public function update(Request $request, $id)
 {
     $product = Product::findOrFail($id);
     $product->update($request->all());
     return redirect()->route('products.index')->with('success', 'Product updated successfully');
 }

 // Remove the product from the database
 public function destroy($id)
 {
     $product = Product::findOrFail($id);
     $product->delete();

     return redirect()->route('products.index')->with('success', 'Product deleted successfully');
 }
 public function show($id)
{
    $product = Product::findOrFail($id); // Retrieve the product by ID
    return view('admin.product.view', compact('product')); // Pass the product data to the view
}

public function getProductDetails($productId)
{
    // Fetch the product with related data
    $product = Product::with([
        'ProductType',
        'Supplier',
        'SupplierCollection', // Corrected the relationship name
        'SupplierCollectionDesign',
        'Type',
        'Color',
        'Composition',
        'DesignType',
        'Usage'
    ])->find($productId);

    // Check if the product exists
    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    // Return product details as JSON
    return response()->json($product);
}

    public function download_csv()
    {
        // Fetch the required data from the database
        $query = Product::with('ProductType',
            'Supplier',
            'SupplierCollection',
            'SupplierCollectionDesign'
        );
        $products = $query->get();

       
        // Prepare the CSV data
        $header = [
                'Date',
                'Product Name',
                'Type',
                'Tally Code',
                'File Number',
                'Supplier Name',
                'Supplier Collection',
                'Supplier Collection Design',
                'Design SKU',
                'Rubs Martendale',
                'Width',
                'Composition',
                'Design_type',
                'Usage',
                'Note',
                'Currency',
                'Supplier Price',
                'Freight',
                'Duty Percentage',
                'Profit Percentage',
                'GST Percentage',
                'MRP',
                'Unit'
            ];

        // Create an array for CSV rows, starting with the header
        $data[] = $header;

        // Populate CSV rows with product data
        if(!empty($products)){
            foreach ($products as $product) {
                $row = [
                    date('d M Y', strtotime($product->created_at)), // Format the date
                    $product->product_name,
                    optional($product->ProductType)->name, // Get related data safely using optional
                    $product->tally_code,
                    $product->file_number,
                    optional($product->Supplier)->name, // Get related data safely using optional
                    optional($product->SupplierCollection)->name, // Get related data safely using optional
                    optional($product->SupplierCollectionDesign)->name, // Get related data safely using optional
                    $product->design_sku,
                    $product->rubs_martendale,
                    $product->width,
                    $product->composition,
                    $product->design_type,
                    $product->usage,
                    $product->note,
                    $product->currency,
                    $product->supplier_price,
                    $product->freight,
                    $product->duty_percentage,
                    $product->profit_percentage,
                    $product->gst_percentage,
                    $product->mrp,
                    $product->unit
                ];
    
                $data[] = $row;
            }

        }else{
            $data[] = array();
        }
    
        // Call helper function to generate and download the CSV file
        return $this->array_to_csv($data, 'Products.csv');
    }

    public function array_to_csv($array,
        $download = ""
    ) {
        if ($download != "") {
            // Set the headers for CSV file download
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $download . '"');
        }

        // Open output stream to write the CSV data
        ob_start();
        $f = fopen('php://output', 'w');

        if ($f === false) {
            // Handle the error if fopen fails
            return response()->json(['error' => 'Unable to open output stream for CSV'], 500);
        }

        // Write each line of the array into the CSV file
        foreach ($array as $line) {
            if (fputcsv($f, $line) === false) {
                fclose($f);
                // Handle the error if fputcsv fails
                return response()->json(['error' => 'Error writing CSV data'], 500);
            }
        }

        // Close the file and get the output content
        fclose($f);
        $csvData = ob_get_contents();
        ob_end_clean();

        // Output or return the CSV data
        if ($download == "") {
            return $csvData; // For internal usage or tests
        } else {
            echo $csvData; // For download
        }
    }



}

