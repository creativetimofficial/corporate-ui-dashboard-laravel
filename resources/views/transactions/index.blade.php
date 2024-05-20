<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />


        <div class="row container">
            <div class="justify-content-start mb-4  ">
                <a href="{{route('dashboard')}}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-6">
                <h4 class="text-xl font-weight-semibold mb-4">Historique CASH-XBET</h4>
            </div>

            <div class="col-md-6 d-flex">
                <a href="{{route('deposit')}}" class="btn btn-info mx-2 text-xs rounded-pill px-4"> <i class="fa fa-plus" aria-hidden="true"></i> Recharger mon compte </a>
                <a href="{{route('transactions.create')}}" class="btn btn-info mx-2 text-xs rounded-pill px-4"> <i class="fa fa-plus" aria-hidden="true"></i> Effectuer un retrait </a>
            </div>
        </div>

        <div class="mt-4 container">
            <div class="form-group">
             <form action="{{route('transactions.search')}}" method="post">
                @csrf 
                <input type="text" name="search" id="search" class="form-control rounded-pill " placeholder="Rechercher une transaction" aria-describedby="helpId">
             </form>
              
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
                                <a href="{{route('transaction.show',['token' => $tx->token])}}">{{ucfirst($tx->type)}}</a> 
                            </div>
                            <div class="font-weight-bold">
                                {{number_format($tx->amount, 0, ",", "  ")}} XOF
                            </div>
                            
                            @if($tx->status == App\Enums\Status::PENDING->value)
                                <div class="badge badge-warning badge-sm text-center px-4 text-xs ">
                                    {{$tx->status}}
                                </div>
                            @else 
                                @if($tx->status == App\Enums\Status::REJECTED->value)
                                    <div class="badge badge-danger badge-sm text-center px-4 text-xs ">
                                        {{$tx->status}}
                                    </div>
                                @endif

                                @if($tx->status == App\Enums\Status::SUCESS->value)
                                    <div class="badge badge-success  badge-sm text-center px-4 text-xs ">
                                        {{$tx->status}}
                                    </div>
                                @else 
                                    <div class="badge badge-info badge-sm text-center px-4 text-xs ">
                                        {{$tx->status}}
                                    </div>

                                @endif
                            @endif
                        
                        </div>
                    </div>

                @endforeach
            </div>
            @endforeach
        </div>
    </main>
</x-app-layout>