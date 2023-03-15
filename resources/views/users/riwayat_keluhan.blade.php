@extends('layouts.dashboard_layout')

@section('content')
<div class="card mt-5 mr-3 ml-3">
  <div class="card-header">
      <h5 class="card-title">Riwayat Keluhan</h5>
      <form action="">

          <div  class="input-group mb-3 col-md-4 p-0">
              <input id="keluhan" type="text" class="form-control bg-light" placeholder="Cari keluhan" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
        <tr>
          <th scope="row">00121</th>
          <td>07/12/2022</td>
          <td>Erly Krisnanik</td>
          <td>erlykrisnanik@upnvj.ac.id</td>
          <td>Dosen</td>
          <td ><a href="{{route('riwayat_detail')}}"><i class="fas fa-file btn btn-secondary"></i></a></td>
          
          <td> <button id="button-his" class="btn btn-success">Selesai</button>  </td>
        </tr>
        <tr>
          <th scope="row">00121</th>
          <td>07/12/2022</td>
          <td>Erly Krisnanik</td>
          <td>erlykrisnanik@upnvj.ac.id</td>
          <td>Dosen</td>
          <td ><i class="fas fa-file  btn btn-secondary"><a href=""></a></i></td>

          <td > <button id="button-his" class="btn btn-danger">  Dibatalkan</button></td>
        </tr>
        <tr>
          <th scope="row">00121</th>
          <td>07/12/2022</td>
          <td>Erly Krisnanik</td>
          <td>erlykrisnanik@upnvj.ac.id</td>
          <td>Dosen</td>
          <td ><i class="fas fa-file  btn btn-secondary"><a href=""></a></i></td>
          
          <td > <button id="button-his" class="btn btn-warning">Berlangsung</button></td>

        </tr>
        <tr>
          <th scope="row">00121</th>
          <td>07/12/2022</td>
          <td> Erly Krisnanik</td>
          <td>erlykrisnanik@upnvj.ac.id</td>
          <td>Dosen</td>
          <td ><i class="fas fa-file  btn btn-secondary"><a href=""></a></i></td>
          <td ><button id="button-his" class="btn btn-primary">Menunggu</button></td>

        </tr>
      
      </tbody>
  </table>
</div>
@endsection


   