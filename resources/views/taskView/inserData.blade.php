@extends('taskView.master')
@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background: #2ed8b6   ">{{ __('Add New Product') }}</div>

                <div class="card-body">
                    <form method="POST"  action="add" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('productName') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('productName') ? ' is-invalid' : '' }}" name="product_name" value="{{ old('productName') }}" required autofocus>

                                @if ($errors->has('product_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="Product Price" class="col-md-4 col-form-label text-md-left">{{ __('productPrice') }}</label>

                            <div class="col-md-6">
                                <input id="Product Price" type="number" class="form-control{{ $errors->has('productPrice') ? ' is-invalid' : '' }}" name="product_price" value="{{ old('Product Price') }}" required>

                                @if ($errors->has('product_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productPrice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="type" class="col-md-4 col-form-label text-md-left"></label>
                            <div class="col-md-6 ">

                                <label for="sel1">Category Name:</label>
                                <span class="form-group" name="category_name">
                                    <select class="form-control" id="sel1" name="category_name">
                                        @foreach($categoryName as $catname)
                                            <option name="category_name" >{{$catname->category_name}}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productImage" class="col-md-4 col-form-label text-md-left">{{ __('Image for Product') }}</label>
                            <div class="col-md-6 ">
                                <input type="file"  name="image_name" value="Abload File" id="productImage" accept="image/*"  class="form-control {{ $errors->has('productImage') ? ' is-invalid' : '' }}" required>
                                @if ($errors->has('image_name'))
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $errors->first('image_name') }}</strong>
                                                                         </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn text-white" style="background-color: #ffb64d">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection