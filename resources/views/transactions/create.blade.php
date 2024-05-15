<x-app-layout>
    <main class="main-content  position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />

            <div class="container">
                <h3 class="font-weight-black text-dark text-center display-6">Retrait</h3>
                <p class="mb-0 text-center">Effectuez vos gains en toute simplicité  et en toute rapidité </p>

                <form role="form" method="POST" action="{{route('transactions.store')}}">
                    @csrf
                    <label>Code de retrait 1XBET</label>
                    <div class="mb-3">
                        <input type="text" id="withdraw_code" name="w_code" class="form-control"
                            placeholder="Code de retrait " value="{{old("withdraw_code")}}" aria-label="withdraw_code"
                            aria-describedby="w_code-addon">
                        @error('withdraw_code')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <label>ID du compte 1XBET</label>
                    <div class="mb-3">
                        <input type="text" id="bet_account" name="bet_account" class="form-control"
                            placeholder="ID Compte  1XBET " value="{{old("bet_account")}}" aria-label="w_code"
                            aria-describedby="w_code-addon">
                        @error('bet_account')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-4">
                              <label for="">Pays</label>
                              <select class="form-control border-end-0" name="country_id" id="">
                                @foreach ($countries as $country)
                                     <option value="{{$country->id}}">({{$country->indicator}})</option>
                                @endforeach
                               
                              </select>
                           
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                              <label for="">Téléphone</label>
                              <input type="tel"
                                class="form-control" name="number" id="" aria-describedby="helpId" value="{{old('phone')}}" placeholder="N° Téléphone">
                                @error('number')
                                    <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <label>Nom & Prénoms du Momo </label>
                    <div class="mb-3">
                        <input type="text" id="account_name" name="account_name" class="form-control"
                            placeholder="ID Compte  1XBET " value="{{old("bet_account")}}" aria-label="account_name"
                            aria-describedby="addon">
                        @error('account_name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-info rounded-pill w-100 mt-4 mb-3">Envoyer <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>

            
           

           
        </div>
    </main>
</x-app-layout>