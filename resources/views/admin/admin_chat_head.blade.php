<div class="container p-2 secondary-bg-color">
  <div id="backSearch" class="d-none text-dark pointer">
    <div class="p-2">
      <i class="fa fa-arrow-left" aria-hidden="true"></i>
    </div>
    <div class="p-2 text-center">
      <h5 class="m-0">Hasil Pencarian</h5>
    </div>
  </div>
  <div id="btnStatus" class="d-flex justify-content-around">
    @php
    $data = ['Antrian', 'Berjalan', 'Tertunda', 'Ditutup'];
    @endphp
    @for ($i = 0; $i < count($data); $i++) <div class="p-2">
      <button type="button" class="btn btn-sm bg-transparent status text-dark" id="{{ $i }}">
        {{ $data[$i] }}
      </button>
  </div>
  @endfor
</div>
</div>
<div class="row m-0 third-bg-color">
  <div id="inputSearch" class="input-group m-3" data-toggle="collapse" data-target="#collapseFillter"
    aria-expanded="false" aria-controls="collapseExample">
    <div class="input-group-prepend">
      <span class="input-group-text bg-light" id="cari-pesan">
        <i class="fa fa-search" aria-hidden="true"></i>
      </span>
    </div>
    <input type="text" class="form-control querySearch" placeholder="Cari Pesan">
  </div>
</div>
<div id="collapseFillter" class="collapse" aria-expanded="false" aria-controls="collapseExample"
  style="position: relative; z-index: 9999;">
  <div class="card">
    <div class="card-body text-dark">
      <div class="px-2">
        <h6 class="font-weight-bold" style="font-size: 14px">Nama</h6>
      </div>
      <div id="buttonFillterNama" class="d-flex justify-content-start py-2 mb-2" style="overflow-y: auto">
        <div class="p-1">
          <button type="button" class="btn btn-fillter">
            <p style="font-size: 13px">Nama Dosen</p>
          </button>
        </div>
        <div class="p-1">
          <button type="button" class="btn btn-fillter">
            <p style="font-size: 13px">Nama Admin</p>
          </button>
        </div>
      </div>
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
      <div id="buttonFillterDepart" class="d-flex justify-content-start py-2" style="overflow-x: auto">
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
</ul>