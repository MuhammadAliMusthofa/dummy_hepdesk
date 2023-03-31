@extends('layouts.dashboard_layout')

@section('content')

<div class="row justify-content-center text-center">
    <div class="col-8">
        <h4 class=" font-weight-bold mt-2">Halo {{ Auth::user()->user_name }} ! Butuh bantuan ?</h4>

        <form action="ssd/search" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="input-group my-4">
                <input type="text" class="form-control p-4" placeholder="Cari Keluhan" aria-label="Username" value="{{ session('querys') }}"
                    aria-describedby="basic-addon1" name="keluhan">
                <div class="input-group-append border-right-0">
                    <button type="submit" style="background:#eaecf4; border:0.2px solid #d1d3e2" class="btn "><i
                        class="fas fa-search"></i></button>
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

    <div class="row d-flex justify-content-between">

        <div class="px-2 basis-5">

            <div class=""><a href="{{ url('/ssd/search_kategori?kategori=lldikti') }}"><button type="button" class="btn  btn-primary   px-5 py-4 w-100 ">
                    <p class="h4 font-weight-bold text-light">LLDIKTI</p>
                </button></a></div>
        </div>

        <div class="px-2 basis-5">

            <div class=""><a href="{{ url('/ssd/search_kategori?kategori=dosen') }}"><button type="button" class="btn  btn-primary   px-5 py-4 w-100 ">
                    <p class="h4 font-weight-bold text-light">Dosen</p>
                </button></a></div>
        </div>
        <div class="px-2 basis-5">

            <div class=""><a href="{{ url('/ssd/search_kategori?kategori=asesor') }}"><button type="button" class="btn  btn-primary   px-5 py-4 w-100 ">
                    <p class="h4 font-weight-bold text-light">Asesor</p>
                </button></a></div>
        </div>
        <div class="px-2 basis-5">

            <div class=""><a href="{{ url('/ssd/search_kategori?kategori=admin-pt') }}"><button type="button" class="btn  btn-primary   px-3 py-4 w-100 ">
                    <p class="h4 font-weight-bold text-light">Admin PT</p>
                </button></a></div>
        </div>
        <div class="px-2 basis-5">

            <div class=""><a href="{{ url('/ssd/search_kategori?kategori=all') }}"><button type="button" class="btn  btn-primary   px-5 py-4 w-100 ">
                    <p class="h4 font-weight-bold text-light">Semua</p>
                </button></a></div>
        </div>
    </div>
</div>

<div class="text-center mt-5">
    <p class="font-weight-bold">Punya pertanyaan spesifik ?</p>
    <a href="{{ route('user.pesan') }}" class="btn btn-success px-5 py-2 my-3">Chat dengan Helpdesk</a>
</div>

@endsection