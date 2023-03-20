<div class="card h-100" style="max-height: 100vh">
  <div class="card-header  text-white d-flex justify-content-between" style="background-color: #D6E2E9">
    <div class="d-flex flex-row align-items-center text-dark pointer" id="back-page">
      <div class="p-2">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </div>
      <div class="p-2 text-center">
        <h5 class="m-0">{{ $tikets[0]->nama }}</h5>
      </div>
    </div>
    <div class="d-flex flex-row align-items-center">
      <div class="p-2">
        <a href="#search" class="h5"><i class="fa fa-search" aria-hidden="true"></i></a>
      </div>
      <div class="p-2 text-dark pointer" id="detail">
        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
      </div>
    </div>
  </div>
  <div class="card-body h-100 d-flex flex-column-reverse" style="max-height: 80vh; overflow-y: auto;" id="scrolling">
    <ul class="list-unstyled">
      @foreach ($tikets as $tiket)
      @foreach ($tiket->pesanPerTiket as $pesanPerTiket)
      @if ($pesanPerTiket->id_pengguna != $tiket->id_pengguna_admin)
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
      @endforeach
    </ul>
  </div>
  <div class="card-footer position-sticky" style="background-color: #BACFDA;">
    <div class="form-group d-flex justify-content-between align-items-center">
      <div class="btn" style="font-size:20px"><i class="fa fa-paperclip "></i></div>
      <input type="text" class="form-control mr-2 ml-2 query" placeholder="Type your message">
      <div class="btn" style="font-size:20px" id="kirim"><i class="fa fa-paper-plane"></i></div>
    </div>
  </div>
</div>