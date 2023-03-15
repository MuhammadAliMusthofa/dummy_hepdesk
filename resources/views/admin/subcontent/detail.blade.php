@extends('admin.admin_chat')

@section('subcontent')
<div class="p-4" style="background-color: #D6E2E9">
  <div class="d-flex flex-row justify-content-start">
    <div class="p-2">
      <a href="/pesan/user/{{ $id_tiket }}">
        <i class="fa fa-arrow-left pr-2" aria-hidden="true"></i> kembali
      </a>
    </div>
  </div>
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
  <table>
    <tbody>
      <tr>
        <th class="pr-5">
          <h5>Departement</h5>
        </th>
        <td>Dosen</td>
      </tr>
      <tr>
        <th>
          <h5>Email</h5>
        </th>
        <td>dosen123@univ123.ac.id</td>
      </tr>
      <tr>
        <th>
          <h5>Direspon oleh</h5>
        </th>
        <td>Helpdesk 1</td>
      </tr>
    </tbody>
  </table>
  <hr>
  <table>
    <tbody>
      <tr>
        <th>
          <h5>Tentang Obrolan</h5>
        </th>
      </tr>
      <tr>
        <th>
          <h5>Dibuat</h5>
        </th>
        <td>09 maret 2023 - 09.46</td>
      </tr>
      <tr>
        <th>
          <h5>Sisa waktu</h5>
        </th>
        <td>29 Menit</td>
      </tr>
      <tr>
        <th>
          <h5>Status</h5>
        </th>
        <td>
          <select name="status" id="status" style="background-color: transparent" class="custom-select border-0">
            <option value="0" selected>Antrian</option>
            <option value="1">Berjalan</option>
            <option value="2">Tertunda</option>
            <option value="3">Ditutup</option>
          </select>
        </td>
      </tr>
    </tbody>
  </table>
  <hr>
  <table>
    <tbody>
      <tr>
        <th>
          <h5>Catatan</h5>
        </th>
      </tr>
      <tr>
        <th>
          <a href="#" style="color: blue !important">Tambahkan catatan</a>
        </th>
      </tr>
    </tbody>
  </table>
  <div class="d-flex justify-content-md-center pt-4">
    <div class="p-2">
      <button class="btn btn-danger font-weight-bold">Akhiri sesi</button>
    </div>
  </div>
</div>
@endsection