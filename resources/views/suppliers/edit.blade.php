<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="top-0 bg-cover z-index-n1 min-height-100 max-height-200 h-25 position-absolute w-100 start-0 end-0"
            style="background-image: url('../../../assets/img/header-blue-purple.jpg'); background-position: bottom;">
        </div>
        <x-app.navbar />
        <div class="px-5 py-4 container-fluid ">
            @php($s = $supplier)
            <form action="{{ route('suppliers.update', $s->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-5 mb-5 mt-lg-9 row justify-content-center">
                    <div class="col-lg-9 col-12">
                        <div class="card card-body" id="profile">
                            <img src="../../../assets/img/header-orange-purple.jpg" alt="pattern-lines"
                                class="top-0 rounded-2 position-absolute start-0 w-100 h-100">

                            <div class="row z-index-2 justify-content-center align-items-center">
                                <div class="col-sm-auto col-8 my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1 font-weight-bolder">
                                            {{ $s->name }}
                                        </h5>
                                        <p class="mb-0 font-weight-bold text-sm">
                                            Supplier ID: {{ $s->id }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-12">
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert" id="alert">
                                {{ session('error') }}
                            </div>
                        @elseif (session('success'))
                            <div class="alert alert-success" role="alert" id="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mb-5 row justify-content-center">
                    <div class="col-lg-9 col-12 ">
                        <div class="card " id="basic-info">
                            <div class="card-header">
                                <h5>Edit Product</h5>
                            </div>
                            <div class="pt-0 card-body ">
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $s->name) }}" class="form-control">
                                    @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row" style="margin-bottom: 10px;" >
                                    <div class="col-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="{{ old('email', $s->email) }}" class="form-control">
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6" style="margin-bottom: 10px;">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $s->phone_number) }}" class="form-control" placeholder="+1 (123) 456-7890">
                                        @error('phone_number')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12" style="margin-bottom: 10px;">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" value="{{ old('address', $s->address) }}" class="form-control">
                                        @error('address')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                               
                                <button type="submit" class="mt-6 mb-0 btn btn-white btn-sm float-end">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <x-app.footer />
    </main>
</x-app-layout>
