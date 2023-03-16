@extends('layouts.dashboard_layout')

@section('content')
<div class="card mt-5 mr-3 ml-3">
  <div class="card-header">
    <h5 class="card-title">Riwayat Keluhan</h5>
    <form action="">

      <div class="input-group mb-3 col-md-4 p-0">
        <input id="keluhan" type="text" class="form-control bg-light" placeholder="Cari keluhan"
          aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append ">
          <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
        </div>
      </div>
    </form>

  </div>
  <table class="table table-striped text-center">
    <thead>
      <tr>
        <th scope="col">Id Ticket</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Departemen</th>
        <th scope="col">Detail</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tikets as $tiket)
      <tr>
        <th scope="row">{{ $tiket->id_tiket }}</th>
        <td>{{ $tiket->tanggal }}</td>
        <td>{{ $tiket->nama }}</td>
        <td>{{ $tiket->email }}</td>
        <td>{{ $tiket->departemen }}</td>
        <td><a href="/user/riwayat/detail/ {{ $tiket->id_tiket }}"><i
              class="fas fa-search-plus btn btn-secondary"></i></a>
        </td>
        <td>
          @if ($tiket->status == 0)
          <button id="button-his" class="btn btn-warning">Menunggu</button>
          @elseif ($tiket->status == 1)
          <button id="button-his" class="btn btn-primary">Berjalan</button>
          @elseif ($tiket->status == 2)
          <button id="button-his" class="btn btn-secondary">Ditunda</button>
          @elseif ($tiket->status == 3)
          <button id="button-his" class="btn btn-danger">Dibatalkan</button>
          @else
          <button id="button-his" class="btn btn-success">Selesai</button>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection