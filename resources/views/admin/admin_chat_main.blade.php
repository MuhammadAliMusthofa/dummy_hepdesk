@if ($tiketsAntrian && $tiketsBerjalan && $tiketsTertunda && $tiketsSelesai)
@php
$show = 0;
foreach ($tiketsAntrian as $tiketAntrian){
foreach ($tiketAntrian->pesanPerTiket as $pesanPerTiket){
if($pesanPerTiket->id_pengguna == $tiketAntrian->id_pengguna_user){
$show = 1;
}
}
}
@endphp
@if ($show)
@foreach ($tiketsAntrian as $tiketAntrian)
<li class="user pointer px-3 status-0" id="{{ $tiketAntrian->id_tiket }}" hidden>
  <div class="d-flex justify-content-between align-items-center">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">{{ $tiketAntrian->nama }}</h5>
      <div class="m-0 text-dark" style="white-space: nowrap; width: 250px; overflow: hidden; text-overflow: ellipsis;">
        @if ($tiketAntrian->pesan)
        {{ $tiketAntrian->pesan->pesan }}
        @endif
      </div>
    </div>
    <div class="ml-auto my-1">
    </div>
  </div>
  <hr class="m-0">
</li>
@endforeach
@endif
@foreach ($tiketsBerjalan as $tiket)
<li class="user pointer px-3 status-{{ $tiket->status }}" id="{{ $tiket->id_tiket }}" hidden>
  <div class="d-flex justify-content-between align-items-center">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">{{ $tiket->nama }}</h5>
      <div class="m-0 text-dark" style="white-space: nowrap; width: 250px; overflow: hidden; text-overflow: ellipsis;">
        @if ($tiket->pesan)
        {{ $tiket->pesan->pesan }}
        @endif
      </div>
    </div>
    <div class="ml-auto my-1">
      @if ($tiket->status == 1)
      <div class="p-2 timerContainer" id="{{ $tiket->id_tiket }}">
        <div id="timerBox" class="rounded p-1 bg-success text-center">
          <p class="text-light">Sisa Waktu</>
          <p id="timerPesan" class="text-light font-weight-bold">00:00</p>
          <p id="kadaluarsa" hidden>{{ $tiket->kadaluarsa }}</p>
        </div>
      </div>
      @endif
    </div>
  </div>
  <hr class="m-0">
</li>
@endforeach
@foreach ($tiketsTertunda as $tiketTertunda)
<li class="user pointer px-3 status-{{ $tiketTertunda->status }}" id="{{ $tiketTertunda->id_tiket }}" hidden>
  <div class="d-flex justify-content-between align-items-center">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">{{ $tiketTertunda->nama }}</h5>
      <div class="m-0 text-dark" style="white-space: nowrap; width: 250px; overflow: hidden; text-overflow: ellipsis;">
        @if ($tiketTertunda->pesan)
        {{ $tiketTertunda->pesan->pesan }}
        @endif
      </div>
    </div>
    <div class="ml-auto my-1">
    </div>
  </div>
  <hr class="m-0">
</li>
@endforeach
@foreach ($tiketsSelesai as $tiketSelesai)
<li class="user pointer px-3 status-{{ $tiketSelesai->status }}" id="{{ $tiketSelesai->id_tiket }}" hidden>
  <div class="d-flex justify-content-between align-items-center">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">{{ $tiketSelesai->nama }}</h5>
      <div class="m-0 text-dark" style="white-space: nowrap; width: 250px; overflow: hidden; text-overflow: ellipsis;">
        @if ($tiketSelesai->pesan)
        {{ $tiketSelesai->pesan->pesan }}
        @endif
      </div>
    </div>
    <div class="ml-auto my-1">
    </div>
  </div>
  <hr class="m-0">
</li>
@endforeach
@endif