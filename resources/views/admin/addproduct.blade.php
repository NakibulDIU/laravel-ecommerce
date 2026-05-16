@extends('admin.maindesign')

@section('add_product')

    @if(session('product_message'))
    <div style="border: 1px solid blue; color: white; border-radius: 4px; padding: 10px; background-color: rgb(16, 199, 25); margin-bottom: 10px;">
        {{ session('product_message') }}
    </div>
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.postaddproduct') }}" enctype="multipart/form-data" method="POST">
            @csrf
            
            <input type="text" name="product_title" placeholder="Write Product Title">
            
            <textarea name="product_description" placeholder="Product Descriptions!...."></textarea>
            
            <input type="number" name="product_quantity" placeholder="Enter Product quantity here!">
            
            <input type="number" name="product_price" placeholder="Enter Product Price here!">

            <input type="file" name="product_image" >


            <select name="product_category">
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->category }}">{{ $category->category }}</option>                
                @endforeach
            </select>

            <input type="submit" name="submit" value="Add Product">

        </form>
    </div>
@endsection