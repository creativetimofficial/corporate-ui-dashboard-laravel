<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />

        <div class="container ">
            <div class="justify-content-start mb-4  ">
                <a href="{{route('dashboard')}}"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>

            <div class="card rounded-lg">
                <div class="card-body p-4 ">
                    <div class=" d-flex align-items-center text-center justify-content-center  my-4">
                        <i class="fa fa-check text-info  text-9xl" aria-hidden="true"></i>
                    </div>

                    <div class="d-flex text-center justify-content-center p-2 mb-2 align-items-center">
                        <h3 class="text-info">
                            {{$transaction->token}} 
                        </h3>
                        <span class=" badge badge-xs ms-2 badge-info text-sm"> {{$transaction->status}} </span>
                    </div>

                    <div class="card-body px-0 py-0">
                       
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                           Paramètre
                                        </th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                            Données
                                        </th>
                                        </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0">Opération </p>
                                            
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                           {{ucfirst($transaction->type)}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0">Status </p>
                                            
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($transaction->status == App\Enums\Status::INIT->value)
                                            <span
                                                class="badge badge-sm border border-info text-info bg-info">{{$transaction->status}}</span>
                                            @endif
                                            @if($transaction->status == App\Enums\Status::PENDING->value)
                                            <span
                                                class="badge badge-sm border border-warning text-warning bg-warning">{{$transaction->status}}</span>
                                            @endif
                                            @if($transaction->status == App\Enums\Status::REJECTED->value)
                                            <span
                                                class="badge badge-sm border border-danger text-danger bg-danger">{{$transaction->status}}</span>
                                            @endif
                                            @if($transaction->status == App\Enums\Status::SUCESS->value)
                                            <span
                                                class="badge badge-sm border border-success text-success bg-success">{{$transaction->status}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0">Date</p>
                                            
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                           {{ $transaction->created_at->format('d/m/Y à H:i') }}
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                    

                    <div class="d-flex mt-4 justify-content-between">
                        <div>
                            <form action="{{route('transaction.update', ['transaction' => $transaction])}}" method="post">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="btn btn-success" > Confirmer </button>
                            </form>

                        </div>

                        <div>
                            
                            <form action="{{route('transaction.delete', ['transaction' => $transaction])}}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" > Rejeter  </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-app-layout>