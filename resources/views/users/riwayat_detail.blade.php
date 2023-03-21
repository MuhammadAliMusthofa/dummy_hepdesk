@extends('layouts.dashboard_layout')

@section('content')
{{-- chat --}}

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div id="card-header-chat" class="card-header  text-white d-flex justify-content-between" style=" 
                    ">
                <div class="d-flex align-items-center">

                    <a href="{{ route('user.riwayat') }}"><i class="fas fa-arrow-left text-white"></i></a>

                </div>
                <h3 class="text-white">ADMIN 1</h3>
                <h5 class="my-auto text-white">09/03/2023</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">

                    <li class="media mr-3" style="width:35%">

                        <div id="chat-admin" class="media-body">
                            <p class="mt-0 mb-1 p-2">Halo, ada yang bisa kami bantu?</p>

                            <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2">
                                <p>9.00 A.M</p>
                            </div>

                        </div>
                    </li>

                    <li class="media my-4 ">

                        <div id="chat-user" class="media-body d-flex flex-row-reverse">
                            <p class="mt-0 mb-1 p-2">Halo saya mau nanya cara edit profile gimana ya min? </p>
                            {{-- <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2">
                                <p>9.00 A.M</p>
                            </div> --}}
                        </div>
                    </li>

                    <li class="media mr-3" style="width:35%">

                        <div id="chat-admin" class="media-body">
                            <p class="mt-0 mb-1 p-2">Boleh buka menu profile lalu klik icon keranjang kuning</p>

                            <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2">
                                <p>9.00 A.M</p>
                            </div>
                        </div>

                    </li>

                    <li class="media my-4 ">

                        <div id="chat-user" class="media-body d-flex flex-row-reverse">
                            <p class="mt-0 mb-1 p-2">Baik min, akan saya coba dan praktikkan sesuai petunjuk </p>
                            {{-- <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2">
                                <p>9.00 A.M</p>
                            </div> --}}
                        </div>
                    </li>

                    <li class="media my-4 ">

                        <div id="chat-user" class="media-body d-flex flex-row-reverse">
                            <p class="mt-0 mb-1 p-2">Terimakasih banyak </p>

                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</div>

@endsection










<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>