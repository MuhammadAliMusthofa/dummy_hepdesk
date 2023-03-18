<div class="container p-0" style="background-color: #D6E2E9">
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
<div class="row m-0" style="background-color: #76A0B4">
  <div class="input-group m-3">
    <div class="input-group-prepend">
      <span class="input-group-text bg-light" id="cari-pesan">
        <i class="fa fa-search" aria-hidden="true"></i>
      </span>
    </div>
    <input type="text" class="form-control" placeholder="Cari Pesan" aria-label="Cari Pesan"
      aria-describedby="cari-pesan">
  </div>
</div>
<ul class="p-0" style="list-style: none" id="list-pesan">
</ul>