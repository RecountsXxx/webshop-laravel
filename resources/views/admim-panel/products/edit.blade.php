@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
                </div>
            @endif
            <div class="card card-primary">
                <form action="{{route('product.update',$product['id'])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT' )
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{$product->title}}" required class="form-control" id="title" placeholder="Enter product title">
                            <label for="price">Price</label>
                            <input type="text" name="price" required value="{{$product->price}}" class="form-control" id="price" placeholder="Enter product price">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{$product->description}}" required class="form-control" id="description" placeholder="Enter product description">
                            <label for="in_stock">In Stock</label>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stock" id="stock_yes" value="Yes" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stock" id="stock_no" value="No">
                                    <label class="form-check-label" for="exampleRadios2">
                                        No
                                    </label>
                                </div>
                            </div>
                            <label for="title">New price</label>
                            <input type="text" name="new_price" value="{{$product->new_price}}" class="form-control" id="new_price" placeholder="Enter new price(discount)">
                            <label for="title">Category</label>
                            <select required name="category_id" class="custom-select">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file"  multiple name="image[]">
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

