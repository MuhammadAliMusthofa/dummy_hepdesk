@extends('admin.dashboard')

@section('subcontent')
<div class="p-4" style="background-color: #D6E2E9">
  <a href="/pesan/{{ $id_tiket }}">
    <div class="d-flex flex-row">
      <div class="p-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>
      <div class="p-2">kembali</div>
    </div>
  </a>
</div>
<div class="container p-5">
  <div class="d-flex justify-content-start align-items-center pb-4">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">Dosen 1</h5>
      <p class="m-0">Dosen Universitas X</p>
    </div>
  </div>
  <div class="row pt-3">
    <div class="col-md-3">
      <h4 class="font-weight-bold">Departement</h4>
    </div>
    <div class="col-md-7">
      <h4>Dosen</h4>
    </div>
  </div>
  <div class="row pt-3">
    <div class="col-md-3">
      <h4 class="font-weight-bold">Email</h4>
    </div>
    <div class="col-md-7">
      <h4>dosen123@univ123.ac.id</h4>
    </div>
  </div>
  <div class="row pt-3">
    <div class="col-md-3">
      <h4 class="font-weight-bold">Direspon oleh</h4>
    </div>
    <div class="col-md-7">
      <h4>Helpdesk 1</h4>
    </div>
  </div>
  <hr>
  <div class="row pt-3">
    <div class="col">
      <h4 class="font-weight-bold">Tentang Obrolan</h4>
    </div>
  </div>
  <div class="row pt-3">
    <div class="col-md-3">
      <h4 class="font-weight-bold">Dibuat</h4>
    </div>
    <div class="col-md-7">
      <h4>09 maret 2023 - 09.46</h4>
    </div>
  </div>
  <div class="row pt-3">
    <div class="col-md-3">
      <h4 class="font-weight-bold">Sisa Waktu</h4>
    </div>
    <div class="col-md-7">
      <h4>29 Menit</h4>
    </div>
  </div>
  <div class="row pt-3">
    <div class="col-md-3">
      <h4 class="font-weight-bold">Status</h4>
    </div>
    <div class="col-md-3">
      <select name="status" id="status" style="background-color: transparent" class="custom-select border-0">
        <option value="0" selected>Antrian</option>
        <option value="1">Berjalan</option>
        <option value="2">Tertunda</option>
        <option value="3">Ditutup</option>
      </select>
    </div>
  </div>
  <hr>
  <div class="row pt-3">
    <div class="col-md-3">
      <h4 class="font-weight-bold">Catatan</h4>
    </div>
  </div>
  <div class="row pt-3">
    <div class="col-md-3">
      <a href="#" style="color: blue !important">Tambahkan catatan</a>
    </div>
  </div>
  <div class="d-flex justify-content-md-center pt-4">
    <div class="p-2">
      <button class="btn btn-danger font-weight-bold">Akhiri sesi</button>
    </div>
  </div>
</div>
@endsection