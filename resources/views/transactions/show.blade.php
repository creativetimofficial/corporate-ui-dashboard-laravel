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
                        @if($transaction->status == App\Enums\Status::SUCESS->value)
                        <i class="fa fa-check   text-9xl text-success" aria-hidden="true"></i>
                        @else 

                            @if($transaction->status == App\Enums\Status::REJECTED->value)
                                <i class="fa fa-times text-9xl text-danger " aria-hidden="true"></i>
                            @else 
                                <i class="fa fa-spinner text-warning text-9xl" aria-hidden="true"></i>
                            @endif

                        @endif
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

                                    <tr>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0">Nom du compte</p>
                                            
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                           {{ $transaction->account_name }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0">ID 1XBET</p>
                                            
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                           {{ $transaction->bet_account }}
                                           <input type="hidden" name="bet_account" id="bet_account" value="{{$transaction->bet_account}}">
                                            <button onclick="myFunction('bet_account')" class="btn px-1 py-1"> <i class="fa fa-clipboard text-sm" aria-hidden="true"></i> </button>
                                       
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0">N° de Téléphone</p>
                                            
                                        </td>
                                        <td class=" d-flex  align-middle text-center text-sm pt-2">
                                           {{ $transaction->country->indicator . " ". $transaction->number }}
                                            <input type="hidden" name="number" id="number" value="{{$transaction->number}}">
                                            <button onclick="myFunction('number')" class="btn px-1 py-1"> <i class="fa fa-clipboard text-sm" aria-hidden="true"></i> </button>
                                       
                                        </td>
                                    </tr>

                                    @if($transaction->type == App\Enums\Types::DEPOT->value)
                                    <tr>
                                        <td>
                                            <p class="text-sm text-dark font-weight-semibold mb-0">ID de paiement</p>
                                            
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                           {{ $transaction->tx_id }}
                                           <input type="hidden" name="tx_id" id="tx_id" value="{{$transaction->tx_id}}">
                                            <button onclick="myFunction('tx_id')" class="btn px-1 py-1"> <i class="fa fa-clipboard text-sm" aria-hidden="true"></i> </button>
                                       
                                        </td>
                                    </tr>
                                    @else 
                                        <tr>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0">Code de retrait </p>
                                                
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                            {{ $transaction->withdraw_code }}
                                            </td>
                                        </tr>
                                    @endif 
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

    <script>
        function myFunction(id) {
          // Get the text field
          var copyText = document.getElementById(id);
          console.log(copyText); 
          // Select the text field
          copyText.select();
         // copyText.setSelectionRange(0, 99999); // For mobile devices
        
          // Copy the text inside the text field
          navigator.clipboard.writeText(copyText.value);
          
          // Alert the copied text
          //alert("Copied the text: " + copyText.value);
        }
        </script>
</x-app-layout>