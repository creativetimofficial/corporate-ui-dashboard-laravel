@extends('products.main')
@section('content')
    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
                <div>
                    <h6 class="font-weight-semibold text-lg mb-0">Edit Product</h6>
                    <p class="text-sm">Edit information about the product</p>
                </div>
            </div>
        </div>
        <div class="card-body px-0 py-0">
            <form action="{{ route('products.update', $product->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="low_limit">Low Limit</label>
                            <input type="number" class="form-control" id="low_limit" name="low_limit" value="{{ $product->low_limit }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection