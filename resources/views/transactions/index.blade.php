<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />

        <div class="row container">
            <div class="col-md-6">
                <h4 class="text-xl font-weight-semibold">La liste de transactions CashXbet</h4>
            </div>

            <div class="col-md-6">
                <a href="{{route('transactions.create')}}" class="btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> Nouvelle transaction </a>
            </div>
        </div>
    </main>
</x-app-layout>