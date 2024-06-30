@extends('products.main')
@section('content')
    <!-- resources/views/products/show.blade.php -->
    <div class="row">

        <div class="col-12">
            <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                <div class="full-background" style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
                <div class="card-body text-start p-4 w-100">
                    <h3 class="text-white mb-2">{{ $supplier->name }}</h3>
                    <p class="mb-4 font-weight-semibold">
                        {{ $supplier->description }}.
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
                                <h4 class="font-weight-semibold ">Item Supplier Details</h6>
                                    <p class=" font-weight-semibold ">Supplier ID :{{ $supplier->id }}</p>
                            </div>
                            <div class="ms-auto d-flex ">
                                <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                    class="btn btn-sm btn-primary mr-2 me-2">Edit</a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="post"
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
                                <table class="table align-items-center mb-0"> 
                                    
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold col-4 ">Name</th>
                                        <td>{{ $supplier->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold ">Email</th>
                                        <td>{{ $supplier->email }}</td>
                                    </tr>
                                    <tr>
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold">Address</th>
                                        <td>{{ $supplier->address }}</td>
                                    </tr>
                                    <tr class=" mb-6 ">
                                        <th style="padding-left: 20px;" class="text-dark font-weight-semibold">Phone Number</th>
                                        <td>{{ $supplier->phone_number }}</td>
                                    </tr>
                                    
                                </table>
                            </div>
                            {{-- custom --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacer" style="height: 20px;"></div> <!-- add 20px spacer element -->

        <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
                <div class="d-sm-flex align-items-center">
                    <div>
                        <h6 class="font-weight-semibold text-lg mb-3">Supplier Item</h6>
                    </div>

                </div>
            </div>
            <div class="card-body px-0 py-0">
                <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off"
                            checked>
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable1">All</label>
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Monitored</label>
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Unmonitored</label>
                    </div>
                    <div class="input-group w-sm-25 ms-auto">
                        <span class="input-group-text text-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                </path>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7">Name
                                </th>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                    Quantity</th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                    Low Limit</th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                    Status</th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                    Updated on</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr>
                                    <td>
                                        <a href="{{ route('products.show', $p->id) }}">
                                            <div class="d-flex flex-column justify-content-center ms-1">
                                                <h6 class="mb-0 text-sm font-weight-semibold">{{ $p->name }}</h6>
                                                <p class="text-sm text-secondary mb-0">{{ $p->id }}</p>
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <p class="text-sm text-dark font-weight-semibold mb-0">{{ $p->quantity }}</p>
                                        <p class="text-sm text-secondary mb-0">{{ $p->quantity }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-normal">{{ $p->low_limit }}</span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($p->quantity < $p->low_limit)
                                            <span
                                                class="badge badge-sm border border-danger text-danger bg-danger">Low</span>
                                        @else
                                            <span
                                                class="badge badge-sm border border-success text-success bg-success">Suffient</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span
                                            class="text-secondary text-sm font-weight-normal">{{ $p->updated_at }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-middle">
                                            <a href="{{ route('products.edit', $p->id) }}"
                                                class="btn btn-sm btn-primary mr-2 me-2">Edit</a>
                                            <form action="{{ route('products.destroy', $p->id) }}" method="post"
                                                class="d-inline delete-form">@csrf @method('DELETE') <button
                                                    type="submit" class="btn btn-sm btn-danger delete-button me-2"
                                                    data-product-name="{{ $p->name }}">Delete</button> </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
@endsection
