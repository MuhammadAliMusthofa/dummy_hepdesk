@foreach ($tikets as $tiket)
<li class="user pointer" id="{{ $tiket->id_tiket }}">
  <div class="d-flex justify-content-between align-items-center">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">{{ $tiket->nama }}</h5>
      <p class="m-0">
        @if ($tiket->pesan)
        {{ $tiket->pesan->pesan }}
        @endif
      </p>
    </div>
    <div class="ml-auto p-2">
      <div class="d-flex align-items-top">
        <p class="text-sm-left ml-auto m-0">09.00</p>
      </div>
    </div>
  </div>
</li>
@endforeach