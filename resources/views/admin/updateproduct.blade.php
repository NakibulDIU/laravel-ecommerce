@extends('admin.maindesign')
<base href="/public">

@section('add_product')

    @if(session('product_message'))
    <div style="border: 1px solid blue; color: white; border-radius: 4px; padding: 10px; background-color: rgb(16, 199, 25); margin-bottom: 10px;">
        {{ session('product_message') }}
    </div>
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.postupdateproduct',$product->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            
            <input type="text" name="product_title" value="{{ $product->product_title}}" >
            
            <textarea name="product_description" >
                value="{{ $product->product_description}}"
            </textarea>
            
            <input type="number" name="product_quantity" value="{{ $product->product_quantity}}">

            <input type="number" name="product_price" value="{{ $product->product_price}}">
            
            <img style="width: 100px;" src="{{asset('products/'.$product->product_image)}}" alt="">
            <label for="">Old Image</label>
            

            <input type="file" name="product_image" ><label for="">Add new Image here!</label>

           
            <select name="product_category">
                    <option value="{{ $product->product_category }}">{{ $product->product_category }}</option>
                
                @foreach ($categories as $category)
                    <option value="{{ $category->category }}">{{ $category->category }}</option>                
                @endforeach
            </select>

            <input type="submit" name="submit" value="Update Product">

        </form>
    </div>
@endsection