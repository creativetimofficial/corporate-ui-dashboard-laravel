@extends('stocks.main')
@section('content')
    <form action="{{ route('products.update-stock') }}" method="POST">
        @csrf
        <div class="card border shadow-xs mb-5">
            <div class="card-header px-0 py-0 pb-0">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Item Stocks</h6>
                            <p class="text-sm">See information about current inventory</p>
                        </div>
                        <div class="ms-auto d-flex">
                            <button type="submit" class="btn btn-dark btn-icon d-flex align-items-center">
                                Save Changes
                            </button>
                        </div>
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
                        <input type="text" id="search-input" class="form-control" placeholder="Search">
                    </div>
                </div>
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                    Name </th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                    Current Quantity</th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                    Low Limit</th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                    Status</th>
                                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                    Update Quantity</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr>
                                    <td>
                                        <a href="{{ route('products.show', $p->id) }}">
                                            <div class="d-flex flex-column justify-content-center ms-1">
                                                <span
                                                    class="mb-0 text-sm font-weight-semibold pe-3">{{ $p->name }}</span>
                                                <span class="text-sm text-secondary mb-0">Item
                                                    ID:{{ $p->id }}</span>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm font-weight-normal">{{ $p->quantity }}</span>
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
                                    <td class="align-middle text-center col-1">
                                        <input type="number" name="quantities[{{ $p->id }}]"
                                            value="{{ $p->quantity }}" class="form-control">

                                    </td>
                                    <td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </form>
@endsection
