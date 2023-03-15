@extends('layouts.dashboard_layout')

@section('content')
<div class="d-flex justify-content-between">
  <div class="col p-0">
    <div class="container" style="background-color: #D6E2E9">
      <div class="d-flex justify-content-around">
        <div class="p-2">
          <button type="button" class="btn btn-sm bg-transparent" style="border-bottom: 3px solid #76A0B4">
            Antrian
          </button>
        </div>
        <div class="p-2">
          <button type="button" class="btn btn-sm bg-transparent">
            Berjalan
          </button>
        </div>
        <div class="p-2">
          <button type="button" class="btn btn-sm bg-transparent">
            Penting
          </button>
        </div>
        <div class="p-2">
          <button type="button" class="btn btn-sm bg-transparent">
            Ditutup
          </button>
        </div>
      </div>
      <div class="row" style="background-color: #76A0B4">
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
      <div id="obrolan" style="max-height: 100vh; overflow: auto; scrollbar-width: none">
        @for ($i=0; $i < 20; $i++) <a href="/pesan/{{ $i }}">
          <div class="d-flex justify-content-between align-items-center">
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
            <div class="ml-auto p-2">
              <div class="d-flex align-items-top">
                <p class="text-sm-left ml-auto m-0">09.00</p>
              </div>
            </div>
          </div>
          </a>
          <hr class="m-0">
          @endfor
      </div>
    </div>
  </div>
  <div class="col p-0">
    @yield('subcontent')
  </div>
</div>
@endsection