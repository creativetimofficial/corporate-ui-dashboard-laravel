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

                    <div class="text-justify text-center">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem atque dolore rerum qui ex sint veniam? Ipsam quos fugit accusantium delectus, perferendis debitis dolor hic praesentium, magni tempora at quisquam!
                    </div>

                    <div class="d-flex mt-4 justify-content-between">
                        <div>
                            <form action="" method="post">
                                @csrf
                                @method('PUT')

                                <button type="submit" class="btn btn-success" > Confirmer </button>
                            </form>

                        </div>

                        <div>
                            
                            <form action="" method="post">
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