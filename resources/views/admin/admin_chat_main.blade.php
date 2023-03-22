@foreach ($tikets as $tiket)
<li class="user pointer px-3" id="{{ $tiket->id_tiket }}">
  <div class="d-flex justify-content-between align-items-center">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">{{ $tiket->nama }}</h5>
      <p class="m-0">
        @if ($tiket->pesan)
        {{ $tiket->pesan->pesan }}
        @endif
      </p>
    </div>
    <div class="ml-auto my-1">
      @if ($tiket->status == 1)
      <div class="d-flex align-items-top p-2">
        <div id="timerBox" class="rounded p-1 bg-success text-center">
          <p class="text-light">Sisa Waktu</>
          <p id="timerPesan" class="text-light font-weight-bold">00:00</p>
          <p id="kadaluarsa" hidden>{{ $tiket->kadaluarsa }}</p>
        </div>
      </div>
    </div>
    @endif
  </div>
</li>
@endforeach