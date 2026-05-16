@extends('admin.maindesign')

@section('view_category')
@if(session('deletecategory_message'))
    <div style="margin-bottom: 10px; color: black; background-color: orangered; ">
        {{ session('deletecategory_message') }}
    </div>
@endif

@if(session('deleteproduct_message'))
    <div style="margin-bottom: 10px; color: black; background-color: orangered; ">
        {{ session('deleteproduct_message') }}
    </div>
@endif
<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
  <thead>
    <tr style="background-color: #f2f2f2;">
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Title</th>
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Description</th>
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Quantity</th>
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Price</th>
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Image</th>
      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Product Category</th>

      <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>



    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
    <tr style="border-bottom: 1px solid #ddd;">
      <td style="padding: 12px;">{{ $product->product_title }}</td>

      <td style="padding: 12px;">{{ Str::limit( $product->product_description,50,'....')}} </td>

      <td style="padding: 12px;">{{ $product->product_quantity }}</td>

      <td style="padding: 12px;">{{ $product->product_price }}</td>

      <td style="padding: 12px;"><img style="height: 120px" src="{{ asset('products/'.$product->product_image) }}" alt=""></td>

      <td style="padding: 12px;">{{ $product->product_category }}</td>

      <td style="padding: 12px;">
    <a href="{{ route('admin.updateproduct', $product->id) }}" style="color: green; margin-right: 10px;">
        Update
    </a>
    
    <a href="{{ route('admin.deleteproduct', $product->id) }}" style="color: red;" onclick="return confirm('Are you sure you want to delete this product?')">
        Delete
    </a>
</td>

    </tr>
    @endforeach

    {{ $products->links() }}
    
    
  </tbody>
</table>

@endsection