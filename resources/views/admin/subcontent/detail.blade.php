<div class="p-4" style="background-color: #D6E2E9">
  <div class="d-flex flex-row justify-content-start">
    <div class="p-2 text-dark pointer" id="back-pesan">
      <i class="fa fa-arrow-left pr-2" aria-hidden="true"></i> kembali
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
      <h5 class="font-weight-bold m-0">{{ $tiket->name }}</h5>
      <p class="m-0">{{ $tiket->asal_pt }}</p>
    </div>
  </div>
  <table>
    <tbody>
      <tr>
        <th class="pr-5">
          <h5>Departement</h5>
        </th>
        <td>{{ $tiket->departemen }}</td>
      </tr>
      <tr>
        <th>
          <h5>Email</h5>
        </th>
        <td>{{ $tiket->email }}</td>
      </tr>
      <tr>
        <th>
          <h5>Direspon oleh</h5>
        </th>
        <td>{{ $tiket->id_pengguna_admin }}</td>
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
        <td>{{ $tiket->tanggal }}</td>
      </tr>
      <tr>
        <th>
          <h5>Sisa waktu</h5>
        </th>
        <td>{{ $tiket->sisa_waktu }}</td>
      </tr>
      <tr>
        <th>
          <h5>Status</h5>
        </th>
        <td>
          <select name="status" id="status" style="background-color: transparent" class="custom-select border-0">
            @php
            $data = ['Antrian', 'Berjalan', 'Tertunda', 'Ditutup'];
            @endphp
            @for ($j = 0; $j < count($data); $j++) @if ($tiket->status == $j)
              <option value="{{ $j }}" selected>{{ $data[$j] }}</option>
              @elseif($j == 3)
              <option value="{{ $j }}" disabled>{{ $data[$j] }}</option>
              @else
              <option value="{{ $j }}">{{ $data[$j] }}</option>
              @endif
              @endfor
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