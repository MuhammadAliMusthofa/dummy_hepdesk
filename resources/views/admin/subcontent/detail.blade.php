<div class="p-4" style="background-color: #D6E2E9">
  <div class="d-flex flex-row justify-content-start">
    <div class="p-2 text-dark d-flex flex-row align-content-center pointer" id="back-pesan">
      <div class="p-2">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </div>
      <div class="p-2 text-center">
        <h5 class="m-0">Kembali</h5>
      </div>
    </div>
  </div>
</div>
<div class="container pt-4">
  <div class="d-flex justify-content-start align-items-center pb-4">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">{{ $tiket->nama }}</h5>
      <p class="m-0">ID Tiket: {{ $tiket->id_tiket }}</p>
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
        @php
        $time=strtotime($tiket->tanggal);
        @endphp
        <td>{{ date("d M Y", $time) }}</td>
      </tr>
      <tr>
        <th>
          <h5>Sisa waktu</h5>
        </th>
        @if ($tiket->kadaluarsa == null)
        <td>-</td>
        @else
        <td id="sisa_waktu-{{ $tiket->id_tiket }}">00:00</td>
        @endif
      </tr>
      <tr>
        <th>
          <h5>Status</h5>
        </th>
        <td>
          @if ($tiket->status == 3)
          <p>Sesi Berakhir</p>
          @elseif ($tiket->status == 1 || $tiket->status == 2)
          @php
          $data = ['Berjalan', 'Tertunda'];
          @endphp
          @for ($j = 1; $j < 3; $j++) @if ($tiket->status == $j)
            <p>{{ $data[$j-1] }}</p>
            @endif
            @endfor
            @else
            <p>Dalam Antrian</p>
            @endif
        </td>
      </tr>
    </tbody>
  </table>
  <div class="d-flex justify-content-md-center pt-4">
    @if ($tiket->status == 0)
    <div class="card-footer position-sticky d-flex justify-content-center">
      <button id="terimaTiket" class="btn four-bg-color text-light">Terima</button>
    </div>
    @else
    <div class="p-2">
      @if ($tiket->status != 3)
      <button id="tunda" class="btn btn-outline-warning font-weight-bold" @if ($tiket->status == 2)
        disabled style="background-color: grey; color: white; border: 0px grey"
        @endif
        >Tunda sesi</button>
      @endif
    </div>
    <div class="p-2">
      @if ($tiket->status != 3)
      <button id="akhiri" class="btn btn-danger font-weight-bold">Akhiri sesi</button>
      @endif
    </div>
    @endif
  </div>
</div>