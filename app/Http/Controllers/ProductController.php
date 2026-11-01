<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Cart;
class ProductController extends Controller
{
    public function productList(){

        $products      = Product::with('category')->get();
        return view('products.product-list',compact('products'));
    }

    public function productForm(){
        $categories    = Category::all();
        $subCategories = SubCategory::all();
        return view('products.product-form',compact('categories','subCategories'));
    }

    public function storeProduct(Request $request){

        $request->validate([
            'name'              => 'required|string|max:255',
            'slug'              => 'nullable|string|unique:products,slug',
            'description'       => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'sku'               => 'nullable|string|unique:products,sku',
            'price'             => 'required|numeric|min:0',
            'sale_price'        => 'nullable|numeric|min:0',
            'quantity'          => 'nullable|integer|min:1',
            'category_id'       => 'required|exists:categories,category_id',
            'subcategory_id'    => 'nullable|exists:sub_categories,subcategory_id',
            'brand_id'          => 'nullable|exists:brands,id',
            'vendor_id'         => 'nullable|exists:vendors,id',
            'tags'              => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors'            => 'nullable|string',
            'size'              => 'nullable|string',
            'ingredients'       => 'nullable|string',
            'skin_type'         => 'nullable|in:oily,dry,sensitive,combination,normal',
        ]);
    
        // ✅ Resize & Save Main Image (720x1005)
         // Handle Image Upload with error handling
         $imagePath = null;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $savePath = public_path('assets/img/' . $filename);
    
            // Create ImageManager with GD driver
            $manager = new ImageManager(new Driver());
            // Read, resize, and save
            $manager->read($imageFile)
                    ->cover(720, 1005) // Resize and crop to exactly 720x1005
                    ->save($savePath);
    
            $imagePath = $filename;
        }
    
        // ✅ Resize & Save Gallery Images
        $galleryPaths = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $galleryName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('assets/img/gallery/' . $galleryName);

                $manager = new ImageManager(new Driver());
                $manager->read($file)
                         ->cover(720, 1005)
                         ->save($savePath);
    
                $galleryPaths[] = $galleryName;
            }
        }
    
        // Convert Comma-Separated Fields into JSON Arrays
        $tags = $request->tags ? explode(',', $request->tags) : [];
        $colors = $request->colors ? explode(',', $request->colors) : [];
        $sizes = $request->size ? explode(',', $request->size) : [];
    
        // Store Product
        Product::create([
            'name'              => $request->name,
            'slug'              => $request->slug ?: Str::slug($request->name),
            'description'       => $request->description,
            'short_description' => $request->short_description,
            'sku'               => $request->sku,
            'price'             => $request->price,
            'sale_price'        => $request->sale_price,
            'quantity'          => $request->quantity,
            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'brand_id'          => $request->brand_id,
            'vendor_id'         => $request->vendor_id,
            'tags'              => json_encode($tags),
            'image'             => $imagePath,
            'gallery_images'    => count($galleryPaths) ? json_encode($galleryPaths) : null,
            'colors'            => json_encode($colors),
            'size'              => json_encode($sizes),
            'ingredients'       => $request->ingredients,
            'skin_type'         => $request->skin_type,
        ]);
    
        return redirect()->route('products')->with('success', 'Product added successfully!');
    }
   

    public function editProduct($productId){

        $categories    = Category::all();
        $subCategories = SubCategory::all();
        $product = Product::find($productId);

        return view('products.edit-product',compact('product','categories','subCategories'));
    }
        
    public function updateProduct(Request $request, $productId){

        $product = Product::findOrFail($productId);
    
        $request->validate([
            'name'              => 'required|string|max:255',
            'slug'              => 'nullable|string|unique:products,slug,' . $productId . ',product_id',
            'description'       => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'sku'               => 'nullable|string|unique:products,sku,' . $productId . ',product_id',
            'price'             => 'required|numeric|min:0',
            'sale_price'        => 'nullable|numeric|min:0',
            'quantity'          => 'nullable|integer|min:1',
            'category_id'       => 'required|exists:categories,category_id',
            'subcategory_id'    => 'nullable|exists:sub_categories,subcategory_id',
            'brand_id'          => 'nullable|exists:brands,id',
            'vendor_id'         => 'nullable|exists:vendors,id',
            'tags'              => 'nullable|string',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors'            => 'nullable|string',
            'size'              => 'nullable|string',
            'ingredients'       => 'nullable|string',
            'skin_type'         => 'nullable|in:oily,dry,sensitive,combination,normal',
        ]);
    
        // Set up the image manager
        $manager = new ImageManager(new Driver());
    
        // Handle main image
        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path('assets/img/' . $product->image))) {
                unlink(public_path('assets/img/' . $product->image));
            }
    
            $imageFile = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('assets/img/' . $filename);
    
            $manager->read($imageFile)
                ->cover(720, 1005)
                ->save($imagePath);
    
            $product->image = $filename;
        }
    
        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            if ($product->gallery_images) {
                foreach (json_decode($product->gallery_images) as $img) {
                    $imgPath = public_path('assets/img/gallery/' . $img);
                    if (file_exists($imgPath)) {
                        unlink($imgPath);
                    }
                }
            }
    
            $galleryPaths = [];
            foreach ($request->file('gallery_images') as $file) {
                $galleryName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('assets/img/gallery/' . $galleryName);
    
                $manager->read($file)
                    ->cover(720, 1005)
                    ->save($savePath);
    
                $galleryPaths[] = $galleryName;
            }
    
            $product->gallery_images = json_encode($galleryPaths);
        }
    
        // Normalize input: safely decode JSON or split comma-separated strings
        function normalizeInput($value) {
            if (is_string($value)) {
                $decoded = json_decode($value, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    return array_map('trim', $decoded);
                }
                return array_map('trim', explode(',', $value));
            }
            return [];
        }
        
        $tags   = $request->tags ? normalizeInput($request->tags) : [];
        $colors = $request->colors ? normalizeInput($request->colors) : [];
        $sizes  = $request->size ? normalizeInput($request->size) : [];

    
        // Update other fields
        $product->update([
            'name'              => $request->name,
            'slug'              => $request->slug ?: Str::slug($request->name),
            'description'       => $request->description,
            'short_description' => $request->short_description,
            'sku'               => $request->sku,
            'price'             => $request->price,
            'sale_price'        => $request->sale_price,
            'quantity'          => $request->quantity,
            'category_id'       => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'brand_id'          => $request->brand_id,
            'vendor_id'         => $request->vendor_id,
            'tags'              => json_encode($tags),
            'colors'            => json_encode($colors),
            'size'              => json_encode($sizes),
            'ingredients'       => $request->ingredients,
            'skin_type'         => $request->skin_type,
            // image and gallery_images are handled already
        ]);
    
        return redirect()->route('products')->with('success', 'Product updated successfully!');
    }
    
    public function deleteProduct($productId){

        $product = Product::find($productId);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $product->delete(); 
    
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    public function liveSearchProducts(Request $request){

        $query = $request->input('query');
    
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('slug', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('short_description', 'LIKE', "%{$query}%")
            ->orWhere('sku', 'LIKE', "%{$query}%")
            ->orWhere('price', 'LIKE', "%{$query}%")
            ->orWhere('sale_price', 'LIKE', "%{$query}%")
            ->orWhere('quantity', 'LIKE', "%{$query}%")
            ->orWhere('tags', 'LIKE', "%{$query}%")
            ->orWhere('colors', 'LIKE', "%{$query}%")
            ->orWhere('size', 'LIKE', "%{$query}%")
            ->orWhere('ingredients', 'LIKE', "%{$query}%")
            ->orWhere('skin_type', 'LIKE', "%{$query}%")
            ->get();
    
        return view('admin.partials.product_table_rows', compact('products'));
    }


    public function shop(){
        $products   = Product::all();
        $categories = Category::all();
        if (Auth::check()) {
            // Logged-in user
            $carts = Cart::where('user_id', Auth::id())
                         ->where('status', 'active')
                         ->get();
        } else {
            // Guest user
            $sessionId = session()->getId();
            $carts = Cart::where('session_id', $sessionId)
                         ->whereNull('user_id')
                         ->where('status', 'active')
                         ->get();
        }
        return view('frontend.shop',compact('products','categories','carts'));
    }


}
