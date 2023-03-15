@extends('layouts.dashboard_layout')

@section('content')
<div class="row">
  <div class="col-md-5">

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
      <hr class="m-0">
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
    </div>
  </div>
  <div class="col-md-7">
    @include('admin.antrianPage')
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
@endsection

  