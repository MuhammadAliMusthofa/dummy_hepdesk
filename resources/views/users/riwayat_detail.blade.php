@extends('layouts.dashboard_layout')

@section('content')
{{-- chat --}}
<div id="formSearch" class="card-header text-white d-none justify-content-between primary-bg-color">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text bg-light">
                <i class="fa fa-search" aria-hidden="true"></i>
            </span>
        </div>
        <input type="text" class="form-control querySearchIsiPesan" placeholder="Cari Pesan">
    </div>
    <div id="batalCari" class="text-light p-2 pointer">Batal</div>
</div>
<div id="formDefault" class="card-header d-flex justify-content-between primary-bg-color">
    <div class="d-flex flex-row align-items-center">
        <a href="{{ route('user.riwayat') }}">
            <div class="p-2 text-center">
                <i class="fa fa-arrow-left text-light" aria-hidden="true"></i>
            </div>
        </a>
    </div>
    <div class="d-flex flex-row align-items-center text-dark">
        <div class="p-2 text-center">
            <h3 class="text-light">{{ $tiket->pengguna_admin->user_name }}</h3>
        </div>
    </div>
    <div class="d-flex flex-row align-items-center">
        <div class="p-2">
            <div id="serachIsiPesan" class="h5 pointer text-light"><i class="fa fa-search" aria-hidden="true"></i></div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="p-2">
        @php
        $time=strtotime($tiket->created_at);
        @endphp
        <h5 class="text-dark">{{ date("d M Y", $time) }}</h5>
    </div>
</div>
<div class="card-body d-flex flex-column-reverse" style="max-height: 70vh; overflow-y: auto;" id="scrolling">
    <ul class=" list-unstyled">
        @foreach ($tiket->pesanPerTiket as $pesanPerTiket)
        @if ($tiket->id_pengguna_user == $pesanPerTiket->id_pengguna)
        <li class="media my-3 d-flex flex-row-reverse">
            <div id="chat-right" class="media-body">
                <p class="mt-0 mb-1 p-2">
                    {!! nl2br($pesanPerTiket->pesan) !!}
                </p>
                <div class="mr-2 d-flex justify-content-end mt-auto">
                    @php
                    $time=strtotime($pesanPerTiket->created_at);
                    @endphp
                    <p>{{ date("H:i", $time) }}</p>
                </div>
            </div>
        </li>
        @else
        <li class="media my-3">
            <div id="chat-left" class="media-body">
                <p class="mt-0 mb-1 p-2">{!! nl2br($pesanPerTiket->pesan) !!}</p>

                <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2">
                    @php
                    $time=strtotime($pesanPerTiket->created_at);
                    @endphp
                    <p>{{ date("H:i", $time) }}</p>
                </div>
            </div>
        </li>
        @endif
        @endforeach
    </ul>
</div>
<div id="upDown" class="card-footer position-sticky primary-bg-color" hidden>
    <div class="d-flex justify-content-between">
        <div class="d-flex px-2">
            <i class="fa fa-angle-up fa-2x mx-2 pointer" aria-hidden="true"></i>
            <i class="fa fa-angle-down fa-2x mx-2 mr-5 pointer" aria-hidden="true"></i>
        </div>
        <div id="countResult" class="d-flex justify-content-center">
            <h5 id="selectCount" class="px-1 text-light">0</h5>
            <h5 class="px-1 text-light">dari</h5>
            <h5 id="count" class="px-1 text-light">0</h5>
            <h5 class="px-1 text-light">sesuai</h5>
        </div>
    </div>
</div>
@endsection