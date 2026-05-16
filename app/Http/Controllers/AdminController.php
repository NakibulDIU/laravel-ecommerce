<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{
    public function addCategory()
    {
        return view('admin.addcategory');
    }

    public function postAddCategory(Request $request){
        $category=new Category();
        $category->category=$request->category;
        $category->save();

        return redirect()->back()->with('category_message','Category added successfully!');

    }

     public function viewCategory(){
        
        
        $category=Category::all();

        return view('admin.viewcategory',compact('category'));

    }

     public function deleteCategory($id){
        
        $category=Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('deletecategory_message','Deleted successfully');
    }

     public function updateCategory($id){
        
        $category=Category::findOrFail($id);
       

        return view('admin.updatecategory',compact('category'));
    }

     public function postUpdateCategory(Request $request,$id){
        
        $category=Category::findOrFail($id);
        $category->category=$request->category;  
        $category->save();

        return redirect()->back()->with('category_updated_message','Category update added successfully!');

    }

    public function addProduct(){
        $categories = Category::all();
        return view('admin.addproduct',compact('categories'));
    }

   public function postAddProduct(Request $request) {
    $product = new Product();
    $product->product_title = $request->product_title;
    $product->product_description = $request->product_description;
    $product->product_quantity = $request->product_quantity;  
    $product->product_price = $request->product_price;
    $product->product_category = $request->product_category;

    // Handle Image Upload First
    $image = $request->product_image;
    if($image){
        // Generate a unique filename
        $imagename = time().'.'.$image->getClientOriginalExtension();
        
        // Move the file physically to the 'public/products' directory
        $image->move('products', $imagename);
        
        // Save the filename string to the model property
        $product->product_image = $imagename;
    }
    
    // Save everything to the database ONCE
    $product->save();

    return redirect()->back()->with('product_message', 'Product added successfully!');
}

    public function viewProduct(){
        $products = Product::paginate(1);
        return view('admin.viewproduct',compact('products'));
    }

    public function deleteProduct($id){
        $product =Product::findOrFail($id);
        $image_path=public_path('products/'.$product->product_image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $product->delete();
        return redirect()->back()->with('deleteproduct_message', 'Product deleted successfully!');
        
    }

    public function updateproduct($id){
        $product=Product::findOrFail($id);
        $categories=Category::all();
        return view('admin.updateproduct',compact('product','categories'));
    }

    public function postUpdateProduct(Request $request,$id){
        $product=Product::findOrFail($id);

          $product = new Product();
    $product->product_title = $request->product_title;
    $product->product_description = $request->product_description;
    $product->product_quantity = $request->product_quantity;  
    $product->product_price = $request->product_price;
    $product->product_category = $request->product_category;

    // Handle Image Upload First
    $image = $request->product_image;
    if($image){
        // Generate a unique filename
        $imagename = time().'.'.$image->getClientOriginalExtension();
        
        // Move the file physically to the 'public/products' directory
        $image->move('products', $imagename);
        
        // Save the filename string to the model property
        $product->product_image = $imagename;
    }
    
    // Save everything to the database ONCE
    $product->save();

    return redirect()->back()->with('product_message', 'Product added successfully!');
    }

        
}
