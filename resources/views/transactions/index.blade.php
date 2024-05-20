<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />


        <div class="row container">
            <div class="justify-content-start mb-4  ">
                <a href="{{route('dashboard')}}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-6">
                <h4 class="text-xl font-weight-semibold">La liste de transactions CashXbet</h4>
            </div>

            <div class="col-md-6">
                <a href="{{route('transactions.create')}}" class="btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> Nouvelle transaction </a>
            </div>
        </div>

        <div class="mt-4 container ">
            @foreach($transactions as $date => $txs)
            <div class="card rounded-lg shadow-md shadow-blur mb-2 mt-2">
                <div class="card-header border-bottom pb-0">
                    {{$date}}
                </div>
                @foreach($txs as $tx) 
                    <div class="card-body p-2">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{$tx->type}}
                            </div>
                            <div>
                                {{$tx->amount}}
                            </div>
                            <div class="badge badge-info text-center px-4 text-xs ">
                                {{$tx->status}}
                            </div>
                            

                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </main>
</x-app-layout>