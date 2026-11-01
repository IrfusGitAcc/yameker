<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesReportExport;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Customer;
use App\Models\User;
use App\Models\AppUser;
use App\Models\Product;
use App\Models\Order;
class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function categoryList(){
        $categories = Category::withTrashed()->get(); 
        return view('admin.categories',compact('categories'));
    }

    public function categoryPage(){
        return view ('admin.add-category');
    }

    public function addCategory(Request $request){
        
        $request->validate([
            'category_name'  => 'required|string|max:255',
            'slug'           => 'nullable|string|max:255|unique:categories',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = null;
    
        if ($request->hasFile('category_image')) {
            $file       = $request->file('category_image');
            $filename   = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('assets/img/category');
    
    
            $file->move($destinationPath, $filename);
            $imagePath = $filename;
        }
    
        $category = Category::create([
            'category_name'   => $request->category_name,
            'slug'            => $request->slug,
            'category_image'  => $imagePath,
        ]);
    
        return redirect()->back()->with('success', 'Category created successfully!');
    }


    public function editCategory($catId){

        $categoryNow = Category::find($catId);

        return view('admin.edit-category',compact('categoryNow'));
    }
    public function updateCategory(Request $request, $catId) {

        $category = Category::find($catId);
    
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        $request->validate([
            'category_name'  => 'required|string|max:255',
            'slug'           => 'nullable|string|max:255|unique:categories,slug,' . $catId . ',category_id',
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('category_image')) {
            $image = $request->file('category_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // shorter & readable
            $image->move(public_path('assets/img/category'), $imageName);    // store manually
            $category->category_image = $imageName; // ✅ just the filename
        }
    
        $category->category_name = $request->category_name;
        $category->slug = $request->slug;
        $category->save();
    
    
        return redirect()->route('categories', $catId)->with('success', 'Category updated successfully.');
    }

    public function deleteCategory($catId){

        $category = Category::find($catId);
    
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
    
        $category->delete(); // Soft delete the category
    
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
    public function restoreCategory($catId){

        $category = Category::withTrashed()->find($catId); // Get soft-deleted category
    
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }
    
        $category->restore(); // Restore category
    
        return redirect()->back()->with('success', 'Category restored successfully.');
    }

    public function subCategoryList(){

        $subCategories = SubCategory::withTrashed()->get();
        $categories    = Category::all();
        
        return view('admin.subcategories',compact('subCategories','categories'));
    }

    public function addSubCategory(Request $request){

        $request->validate([
            'category_id'      => 'required|exists:categories,category_id',
            'subcategory_name' => 'required|string|max:255|unique:sub_categories,subcategory_name',
            'slug'             => 'required|string|max:255|unique:sub_categories,slug',
        ]);

        $subcat = SubCategory::create([
            'category_id'      => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'slug'             => $request->slug,
        ]);

        return redirect()->back()->with('success','new sub category created successfully');

    }

    public function editSubCategory($subcatId){

        $subCategory = SubCategory::find($subcatId);
        $categories  = Category::all();

        return view('admin.edit-subcategory',compact('subCategory','categories'));

    }

    public function updateSubCategory(Request $request, $subcatId){

        $request->validate([
            'category_id'      => 'required|exists:categories,category_id',
            'subcategory_name' => 'required|string|max:255|unique:sub_categories,subcategory_name',
            'slug'             => 'required|string|max:255|unique:sub_categories,slug',
        ]);

        $subCategory = SubCategory::find($subcatId);
        $categories  = Category::all();

        $subCategory->update([
            'category_id'      => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'slug'             => $request->slug,
        ]);

        return redirect()->route('sub.category')->with('success','SubCategory updated successfully');

    }

    public function deleteSubCategory($subcatId){

        $subCategory = SubCategory::find($subcatId);
    
        if (!$subCategory) {
            return redirect()->back()->with('error', 'Category not found.');
        }
    
        $subCategory->delete(); // Soft delete the category
    
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
    public function restoreSubCategory($subcatId){

        $subCategory = SubCategory::withTrashed()->find($subcatId); // Get soft-deleted category
    
        if (!$subCategory) {
            return redirect()->back()->with('error', 'subcategory not found.');
        }
    
        $subCategory->restore(); // Restore category
    
        return redirect()->back()->with('success', 'subcategory restored successfully.');
    }

    public function adminList(){

        $users = User::all();

        return view('admin.admin-list',compact('users'));
    }

    public function addAdmin(Request $request){

        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8',
            'phone'      => 'nullable|string|max:255',
            'avatar'     => 'nullable|string|max:255',
        ]);

        $users = User::create([

            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'password'          => Hash::make($request->password),
            'phone'             => $request->phone,
            'avatar'            => $request->avatar,
            
        ]);

        return redirect()->back()->with('success', 'Admin Added Successfully');
    }
    
    public function updateAdmin(Request $request){

        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:255',
            'avatar' => 'nullable|url|max:255',
        ]);
    
        $user = User::find($request->id);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->avatar = $request->avatar;
    
        if ($user->isDirty()) {
            $user->save();
            return redirect()->back()->with('success', 'Admin details updated successfully.');
        } else {
            return redirect()->back()->with('info', 'No changes detected.');
        }
    }

    public function deleteAdmin($userId){

        $user= User::find($userId);

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');

    }

    public function customers(){

        $customers = Customer::all();

        return view('admin.customers-list',compact('customers'));
    }
    public function liveSearchCustomerAddress( Request $request){
        $query = $request->input('query');
    
        $customers = Customer::where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('phone', 'LIKE', "%{$query}%")
            ->orWhere('city', 'LIKE', "%{$query}%")
            ->orWhere('address', 'LIKE', "%{$query}%")
            ->get();
        return view('admin.partials.customer_table_rows', compact('customers'));
    }

    public function appUsers(){

        $users = AppUser::all();
        return view('admin.appusers-list',compact('users'));
    }
    public function liveSearchAppUsers(Request $request){

        $query = $request->input('query');
    
        $users = AppUser::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhere('phone', 'LIKE', "%{$query}%")
            ->get();
    
        return view('admin.partials.user_table_rows', compact('users'));
    }

        // ✅ 1. This method returns the report view
    public function salesReport(Request $request){

        $categories = Category::all();
        $products = Product::all();
        $orders = [];
    
        if ($request->has('generate')) {
            $orders = $this->getSalesReportData($request); // Use this for clean logic
        }
    
        return view('admin.sales-report', compact('categories', 'products', 'orders'));
    }
    
    // ✅ 2. This is a reusable data method
    public function getSalesReportData(Request $request){
        
        $query = Order::with(['items.product.category', 'billingAddress'])
                      ->where('payment_status', 'paid');
    
        if ($request->filled('category_id')) {
            $query->whereHas('items.product', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }
    
        if ($request->filled('product_id')) {
            $query->whereHas('items', function ($q) use ($request) {
                $q->where('product_id', $request->product_id);
            });
        }
    
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
    
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
    
        return $query->get();
    }
    
    // ✅ 3. This method downloads Excel file correctly
    public function downloadSalesReportExcel(Request $request){

        $orders = $this->getSalesReportData($request); // Use correct data method
    
        return Excel::download(new SalesReportExport($orders), 'sales-report.xlsx');
    }

   

    
}




