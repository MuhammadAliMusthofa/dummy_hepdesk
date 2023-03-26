<div class="container p-0 secondary-bg-color">
  <div class="d-flex justify-content-around">
    @php
    $data = ['Antrian', 'Berjalan', 'Tertunda', 'Ditutup'];
    @endphp
    @for ($i = 0; $i < count($data); $i++) <div class="p-2">
      <button type="button" class="btn btn-sm bg-transparent status" id="{{ $i }}">
        {{ $data[$i] }}
      </button>
  </div>
  @endfor
</div>
<div class="row m-0 third-bg-color">
  <div class="input-group m-3" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
    aria-controls="collapseExample">
    <div class="input-group-prepend">
      <span class="input-group-text bg-light" id="cari-pesan">
        <i class="fa fa-search" aria-hidden="true"></i>
      </span>
    </div>
    <input type="text" class="form-control" placeholder="Cari Pesan">
  </div>
</div>
<div id="collapseOne" class="collapse" aria-expanded="false" aria-controls="collapseExample">
  <div class="card">
    <div class="card-body text-dark">
      <div class="px-2">
        <h6 class="font-weight-bold" style="font-size: 14px">Waktu</h6>
      </div>
      <div id="buttonFillterWaktu" class="d-flex justify-content-start py-2 mb-2" style="overflow-y: auto">
        <div class="p-1">
          <button type="button" class="btn btn-fillter">
            <p style="font-size: 13px">1 Minggu Terakhir</p>
          </button>
        </div>
        <div class="p-1">
          <button type="button" class="btn btn-fillter">
            <p style="font-size: 13px">1 Bulan Terakhir</p>
          </button>
        </div>
        <div class="p-1">
          <button type="button" class="btn btn-fillter">
            <p style="font-size: 13px">1 Tahun Terakhir</p>
          </button>
        </div>
      </div>
      <div class="px-2">
        <h6 class="font-weight-bold" style="font-size: 14px">Departemen</h6>
      </div>
      <div id="buttonFillterDepart" class="d-flex justify-content-start py-2" style="overflow-y: auto">
        <div class="p-1">
          <button type="button" class="btn btn-fillter">
            <p style="font-size: 13px">Departemen 1</p>
          </button>
        </div>
        <div class="p-1">
          <button type="button" class="btn btn-fillter">
            <p style="font-size: 13px">Departemen 2</p>
          </button>
        </div>
        <div class="p-1">
          <button type="button" class="btn btn-fillter">
            <p style="font-size: 13px">Departemen 3</p>
          </button>
        </div>
      </div>
    </div>
    <div class="p-4">
      <button id="btnApplyFillter" type="button" class="btn btn-fillter-active w-100">
        <p style="font-size: 13px">Selesai</p>
      </button>
    </div>
  </div>
</div>
<ul class="p-0" style="list-style: none" id="list-pesan">
  @if ($tikets)
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
  @endif
</ul>