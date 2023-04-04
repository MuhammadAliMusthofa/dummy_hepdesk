@extends('layouts.dashboard_layout')

@section('content')

<div class="card mt-5 mr-3 ml-3 shadow  rounded">
  <div class="card-header">
    <h5 class="card-title">Riwayat Keluhan</h5>
    <div class="d-flex justify-content-between">
      <form action="{{ route('search.riwayat') }}" class="input-group mb-3 col-md-4 p-0" method="GET">


        <input id="keluhan" type="text" name="query" class="form-control bg-light" placeholder="Cari keluhan ...."
          aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append ">

          <button type="submit" style="background:#eaecf4; border:0.2px solid #d1d3e2" class="btn "><i
              class="fas fa-search"></i></button>


        </div>
      </form>


      <a href="{{ URL::previous() }}" class="btn btn-outline-secondary text-dark mb-3 " id="btn-back"><i
          class="fa fa-arrow-left text-dark pr-1"></i>Kembali</a>

    </div>

    <table id="tabelrekap" class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Id Ticket</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Peran</th>
          <th scope="col">Detail</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($tikets as $tiket )
        <tr>
          <th scope="row">{{ $tiket->id_tiket }}</th>
          <?php
          $date=strtotime($tiket->tanggal);
          ?>
          <td>{{ date("d M Y", $date) }}</td>
          {{-- <td>{{ $tiket->departemen }}</td> --}}
          <td>Dosen</td>

          @if ($tiket->status == 3)
          <td><a href="{{ route('user.riwayat.detail', $tiket->id_tiket) }}" class="btn btn-primary text-light"><i
                class="fa fa-search-plus"></i></a>
          </td>
          <td> <button id="button-his" class="btn btn-success text-light">Selesai</button></td>


          @elseif ($tiket->status == 2)
          <td>
            <a href="{{ route('user.pesan') }}" class="btn btn-primary text-light"><i class="fa fa-search-plus"></i></a>
          </td>
          <td> <button id="button-his" class="btn btn-warning text-light">Tertunda</button></td>

          @elseif ($tiket->status == 1)
          <td> <button id="button-his" class="btn btn-primary text-light">
              Berjalan</button></td>
          @endif
        </tr>

        @endforeach

      </tbody>
    </table>
  </div>
</div>

<div class="row mt-5">
  <div class="col-md-12">
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        {!! $tikets->appends(request()->query())->links('pagination::bootstrap-4') !!}
      </ul>
    </nav>
  </div>
</div>

@endsection