@extends('layouts.dashboard_layout')

@section('content')
<h1>Hasil pencarian untuk "{{ $query }}"</h1>
@if ($tikets->isEmpty())
<p>Tidak ditemukan hasil pencarian untuk "{{ $query }}".</p>
<a href="{{ route('user.riwayat') }}"> <i class="fas fa-sign-out-alt ml-auto"></i>kembali</a>


<div class="card-header">

  <h5 class="card-title">Riwayat Keluhan</h5>
  <form action="{{ route('search.riwayat') }}" method="GET">

    <div class="input-group mb-3 col-md-4 p-0">
      <input id="keluhan" type="text" name="query" class="form-control bg-light" placeholder="Cari keluhan ...."
        aria-label="Recipient's username" aria-describedby="basic-addon2">
      <div class="input-group-append ">
        <span class="input-group-text" id="basic-addon2"><a href="#"><i class="fas fa-search"></i></a></span>

      </div>
    </div>
  </form>

</div>
@else

<div class="card-header">
  <a href="{{ route('user.riwayat') }}"> <i class="fas fa-sign-out-alt ml-auto"></i>kembali</a>

  <h5 class="card-title">Riwayat Keluhan</h5>
  <form action="{{ route('search.riwayat') }}" method="GET">

    <div class="input-group mb-3 col-md-4 p-0">
      <input id="keluhan" type="text" name="query" class="form-control bg-light" placeholder="Cari keluhan ...."
        aria-label="Recipient's username" aria-describedby="basic-addon2">
      <div class="input-group-append ">


        <button type="submit" style="background:#eaecf4; border:0.2px solid #d1d3e2" class="btn "><i
            class="fas fa-search"></i></button>



        </span>
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

    @foreach ($tikets as $tiket )
    <tr>
      <th scope="row">{{$tiket->id_tiket}}</th>
      <td>{{$tiket->tanggal}}</td>
      <td>{{ $tiket->nama }}</td>
      <td>{{ $tiket->email }}</td>
      <td>{{ $tiket->departemen }}</td>
      <td><a href="{{ route('user.riwayat.detail', $tiket->id_tiket) }}"><i
            class="fas fa-file  btn btn-secondary"></i></a></td>

      @if ($tiket->status == 3)
      <td> <button id="button-his" class="btn btn-success"> Selesai</button></td>


      @elseif ($tiket->status == 2)

      <td> <button id="button-his" class="btn btn-warning"> Tertunda</button></td>

      @elseif ($tiket->status == 1)
      <td> <button id="button-his" class="btn btn-primary" style="color:white !important"> Berjalan</button></td>

      @endif
    </tr>

    @endforeach

  </tbody>
</table>


@endif


@endsection