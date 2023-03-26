<div class="card-header text-white d-flex justify-content-between" style="background-color: #D6E2E9">
  <div class="d-flex flex-row align-items-center text-dark">
    <div class="p-2 text-center">
      <h5 class="m-0 font-weight-bold">{{ $tiket->nama }}</h5>
    </div>
  </div>
  <div class="d-flex flex-row align-items-center text-dark">
    <div class="text-center">
      @if ($tiket->status == 1 || $tiket->status == 0)
      <h6>Sisa Waktu</h6>
      <div id="countdown" class="btn disabled p-1 bg-success">00:00</div>
      @else
      <h6>Obrolan Tertunda</h6>
      @endif
      <p id="kadaluarsa" hidden>{{ $tiket->kadaluarsa }}</p>
    </div>
  </div>
  <div class="d-flex flex-row align-items-center">
    <button id="akhiri" class="btn btn-danger text-light">Akhiri Sesi</button>
  </div>
</div>
<div class="card-body h-100 d-flex flex-column-reverse" style="max-height: 100vh; overflow-y: auto;" id="scrolling">
  <ul class=" list-unstyled">
    @foreach ($tiket->pesanPerTiket as $pesanPerTiket)
    @if ($pesanPerTiket->id_pengguna == $tiket->id_pengguna_admin || $pesanPerTiket->id_pengguna == null)
    <li class="media my-3" style="width:35%">
      <div id="chat-left" class="media-body">
        <p class="mt-0 mb-1 p-2">{{ $pesanPerTiket->pesan }}</p>

        <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2">
          @php
          $time=strtotime($pesanPerTiket->created_at);
          @endphp
          <p>{{ date("H:i", $time) }}</p>
        </div>
      </div>
    </li>
    @else
    <li class="media my-3 d-flex flex-row-reverse">
      <div id="chat-right" class="media-body">
        <p class="mt-0 mb-1 p-2">
          {{ $pesanPerTiket->pesan }}
        </p>
        <div class="mr-2 d-flex justify-content-end mt-auto">
          @php
          $time=strtotime($pesanPerTiket->created_at);
          @endphp
          <p>{{ date("H:i", $time) }}</p>
        </div>
      </div>
    </li>
    @endif
    @endforeach
    @if (count($tiket->pesanPerTiket) == 2)
    <li class="media my-3 d-flex justify-content-center">
      <p class="mt-0 mb-1 p-2">
        Mohon Menunggu. Admin akan segera merespon anda.
      </p>
    </li>
    @endif
  </ul>
</div>
@if (count($tiket->pesanPerTiket) != 2 && $tiket->status == 1 || $tiket->status == 0)
<div class="card-footer position-sticky p-2" style="background-color: #BACFDA;">
  <div class="form-group d-flex justify-content-between align-items-center m-0">
    <input type="text" class="form-control mr-2 ml-2 query" placeholder="Type your message">
    <div class="btn" style="font-size:20px" id="kirim"><i class="fa fa-paper-plane"></i></div>
  </div>
</div>
@endif