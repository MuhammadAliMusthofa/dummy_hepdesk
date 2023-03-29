@extends('layouts.dashboard_layout')

@section('content')
{{-- chat --}}
<div class="card-header d-flex justify-content-between primary-bg-color">
    <div class="d-flex flex-row align-items-center">
        <a href="{{ route('user.riwayat') }}">
            <div class="p-2 text-center">
                <i class="fa fa-arrow-left text-light" aria-hidden="true"></i>
            </div>
        </a>
    </div>
    <div class="d-flex flex-row align-items-center text-dark">
        <div class="p-2 text-center">
            <h3 class="text-light">{{ $tiket->nama }}</h3>
        </div>
    </div>
    <div class="d-flex flex-row align-items-center">
        @php
        $time=strtotime($tiket->created_at);
        @endphp
        <h3 class="text-light">{{ date("d M Y", $time) }}</h3>
    </div>
</div>
<div class="card-body h-100 d-flex flex-column-reverse" style="max-height: 80vh; overflow-y: auto;" id="scrolling">
    <ul class=" list-unstyled">
        @foreach ($tiket->pesanPerTiket as $pesanPerTiket)
        @if ($pesanPerTiket->id_pengguna == $tiket->id_pengguna_admin || $pesanPerTiket->id_pengguna == null)
        <li class="media my-3" style="width:35%">
            <div id="chat-left" class="media-body">
                <p class="mt-0 mb-1 p-2">{{ $pesanPerTiket->pesan }}</p>

                <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2">
                    @php
                    $time=strtotime($pesanPerTiket->created_at);
                    @endphp
                    <p>{{ date("H:i", $time) }}</p>
                </div>
            </div>
        </li>
        @else
        <li class="media my-3 d-flex flex-row-reverse">
            <div id="chat-right" class="media-body">
                <p class="mt-0 mb-1 p-2">
                    {{ $pesanPerTiket->pesan }}
                </p>
                <div class="mr-2 d-flex justify-content-end mt-auto">
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
@endsection