@if ($tiket)
<div class="card h-100" style="min-height: 80vh; max-height: 80vh">
  <div id="formSearch" class="card-header  text-white d-flex justify-content-between secondary-bg-color">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text bg-light">
          <i class="fa fa-search" aria-hidden="true"></i>
        </span>
      </div>
      <input type="text" class="form-control querySearchIsiPesan" placeholder="Cari Pesan">
    </div>
    <div id="batalCari" class="primary-color p-2 pointer">Batal</div>
  </div>
  <div id="formDefault" class="card-header  text-white d-flex justify-content-between secondary-bg-color">
    <div class="d-flex flex-row align-items-center text-dark pointer" id="back-page">
      <div class="p-2">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </div>
      <div class="p-2 text-center">
        <h5 class="m-0">{{ $tiket->nama }}</h5>
      </div>
    </div>
    <div class="d-flex flex-row align-items-center">
      <div class="p-2">
        <div id="serachIsiPesan" class="h5 pointer"><i class="fa fa-search" aria-hidden="true"></i></div>
      </div>
      <div class="p-2 text-dark pointer" id="detail">
        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
      </div>
    </div>
  </div>
  <div class="card-body h-100 d-flex flex-column-reverse" style="max-height: 80vh; overflow-y: auto;" id="scrolling">
    <ul class="list-unstyled">
      @foreach ($tiket->pesanPerTiket as $pesanPerTiket)
      @if ($pesanPerTiket->id_pengguna == $tiket->id_pengguna_admin || $pesanPerTiket->id_pengguna == 0)
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
      @else
      <li class="media my-3" style="width:35%">
        <div id="chat-left" class="media-body">
          <p class="mt-0 mb-1 p-2">{{ $pesanPerTiket->pesan }}</p>

          <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2">
            @php
            $time=strtotime($pesanPerTiket->created_at);
            @endphp
            <p>{{ date("m:i", $time) }}</p>
          </div>
        </div>
      </li>
      @endif
      @endforeach
    </ul>
  </div>
  @if ($tiket->status == 3)
  <div class="d-flex justify-content-center">
    <p class="pb-4">Sesi telah berakhir</p>
  </div>
  @elseif ($tiket->status == 2)
  <div class="d-flex justify-content-center">
    <p class="pb-4">Anda telah mengubah status obrolan menjadi tertunda</p>
  </div>
  @elseif ($tiket->id_pengguna_admin)
  <div class="card-footer position-sticky secondary-bg-color">
    <div class="form-group d-flex justify-content-between align-items-center m-0">
      <input type="text" class="form-control mr-2 ml-2 query" placeholder="Type your message">
      <div class="btn" style="font-size:20px" id="kirim"><i class="fa fa-paper-plane"></i></div>
    </div>
  </div>
  @else
  <div class="card-footer position-sticky d-flex justify-content-center">
    <button id="terimaTiket" class="btn four-bg-color text-light">Terima</button>
  </div>
  @endif
</div>
@else
<script>
  id_tiket = 0
</script>
@endif