@extends('products.main')
@section('content')
    <!-- resources/views/products/show.blade.php -->
    <div class="row">

        <div class="col-12">
            <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                <div class="full-background" style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
                <div class="card-body text-start p-4 w-100">
                    <h3 class="text-white mb-2">{{ $product->name }}</h3>
                    <p class="mb-4 font-weight-semibold">
                        {{ $product->description }}.
                    </p>
                    <button type="button" class="btn btn-outline-white btn-blur btn-icon d-flex align-items-center mb-0">
                        <span class="btn-inner--icon">
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" class="d-block me-2">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM6.61036 4.52196C6.34186 4.34296 5.99664 4.32627 5.71212 4.47854C5.42761 4.63081 5.25 4.92731 5.25 5.25V8.75C5.25 9.0727 5.42761 9.36924 5.71212 9.52149C5.99664 9.67374 6.34186 9.65703 6.61036 9.47809L9.23536 7.72809C9.47879 7.56577 9.625 7.2926 9.625 7C9.625 6.70744 9.47879 6.43424 9.23536 6.27196L6.61036 4.52196Z" />
                            </svg>
                        </span>
                        <span class="btn-inner--text">Watch more</span>
                    </button>
                    <img src="../assets/img/3d-cube.png" alt="3d-cube"
                        class="position-absolute top-0 end-1 w-25 max-width-200 mt-n6 d-sm-block d-none" />
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="card shadow-xs border ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h4 class="font-weight-semibold ">Item Details</h6>
                                    <p class=" font-weight-semibold ">Supplier ID :{{ $product->supplier->id }}</p>
                            </div>
                            <div class="ms-auto d-flex ">
                                <a href="{{ route('suppliers.edit', $product->id) }}"
                                    class="btn btn-sm btn-primary mr-2 me-2">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post"
                                    class="d-inline delete-form">@csrf @method('DELETE') <button type="submit"
                                        class="btn btn-sm btn-danger delete-button me-2"
                                        data-product-name="{{ $product->name }}">Delete</button> </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-0">
                                <table class="table align-items-center mb-4">
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold col-4 ">Name
                                        </th>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold ">Price</th>
                                        <td>{{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold">Quantity</th>
                                        <td>{{ $product->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold">Low Limit
                                        </th>
                                        <td>{{ $product->low_limit }}</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold">Status
                                        </th>
                                        <td>
                                            @if ($product->quantity < $product->low_limit)
                                                <span
                                                    class="badge badge-sm border border-danger text-danger bg-danger">Low</span>
                                            @else
                                                <span
                                                    class="badge badge-sm border border-success text-success bg-success">Suffient</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold">Description
                                        </th>
                                        <td type="textarea">{{ $product->description }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer" style="height: 20px;"></div> <!-- add 20px spacer element -->

        <div class="card shadow-xs border ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center">
                            <div>
                                <h4 class="font-weight-semibold ">Item Supplier Details</h6>
                                    <p class=" font-weight-semibold ">Supplier ID :{{ $product->supplier->id }}</p>
                            </div>
                            <div class="ms-auto d-flex ">
                                <a href="{{ route('suppliers.edit', $product->supplier->id) }}"
                                    class="btn btn-sm btn-primary mr-2 me-2">Edit</a>
                                <form action="{{ route('suppliers.destroy', $product->supplier->id) }}" method="post"
                                    class="d-inline delete-form">@csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger me-2">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-4">

                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold col-4 ">Name
                                        </th>
                                        <td>{{ $product->supplier->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold ">Email</th>
                                        <td>{{ $product->supplier->email }}</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold">Address</th>
                                        <td>{{ $product->supplier->address }}</td>
                                    </tr>
                                    <tr class=" mb-6 ">
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold">Phone Number
                                        </th>
                                        <td>{{ $product->supplier->phone_number }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            {{-- <canvas id="usageChart"></canvas> --}}
        </div>
    </div>
    <div class="spacer" style="height: 20px;"></div> <!-- add 20px spacer element -->
@endsection
