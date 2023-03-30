@extends('layouts.dashboard_layout')

@section('content')

<div class="row justify-content-center text-center">
    <div class="col-8">
        <h4 class=" font-weight-bold mt-2">Halo {{ Auth::user()->user_name }} ! Butuh bantuan ?</h4>

        <form action="ssd/search" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-group my-4">
                <input type="text" class="form-control p-4" placeholder="Cari Keluhan" aria-label="Username"
                    aria-describedby="basic-addon1" name="keluhan">
                <div class="input-group-append border-right-0">
                    <span class="input-group-text bg-white border-left-0" id="basic-addon1"><i
                            class="fas fa-search"></i></span>
                </div>
            </div>
        </form>


        <div class="sdid">
            <p class="font-weight-bold h5  mt-5 mb-3">Pertanyaan yang sering muncul</p>

            <div id="accordion">
                @foreach ($data as $ssd)

                <div class="card mb-3 border-0">
                    <div class="card-header rounded d-flex justify-content-between align-items-center px-4 py-3"
                        id="headingOne">
                        <p class="text-left font-weight-bold ">{{$ssd->pertanyaan}}</p>

                        <a class="btn btn-link" data-toggle="collapse" data-target={{"#collapse_".$ssd->id_ssd}}
                            aria-expanded="true"
                            aria-controls="collapseFour">
                            <i class="fas fa-chevron-down"></i>
                        </a>

                    </div>

                    <div id="collapse_{{$ssd->id_ssd}}" class="collapse " aria-labelledby="headingOne"
                        data-parent="#accordion">
                        <div class="card-body mt-3 rounded text-left px-4 py-3">
                            <p class="font-weight-bold">
                                {{$ssd->jawaban}}
                            </p>

                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="text-center kategori">
    <h4 class="font-weight-bold mt-4 mb-4">Kategori</h4>

    <div class="row">
        <div class="col-3"><button type="button" class="btn  btn-primary   px-5 py-4 w-100 ">
                <p class="h4 font-weight-bold text-light">LLDIKTI</p>
            </button></div>
        <div class="col-3"><button type="button" class="btn  btn-primary   px-5 py-4 w-100 ">
                <p class="h4 font-weight-bold text-light">Dosen</p>
            </button></div>
        <div class="col-3"><button type="button" class="btn  btn-primary   px-5 py-4 w-100 ">
                <p class="h4 font-weight-bold text-light">Asesor</p>
            </button></div>
        <div class="col-3"><button type="button" class="btn  btn-primary   px-5 py-4 w-100 ">
                <p class="h4 font-weight-bold text-light">Pengelola BKD</p>
            </button></div>
    </div>
</div>

<div class="text-center mt-5">
    <p class="font-weight-bold">Punya pertanyaan spesifik ?</p>
    <a href="{{ route('user.pesan') }}" class="btn btn-success px-5 py-2 my-3">Chat dengan Helpdesk</a>
</div>

@endsection