@foreach ($tikets as $tiket)
<li class="user pointer px-3 status-0" id="{{ $tiket->id_tiket }}">
  <div class="d-flex justify-content-between align-items-center">
    <div class="p-2">
      <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
        style="width: 50px; height: 50px">
        <i class="fa fa-user"></i>
      </div>
    </div>
    <div class="p-2">
      <h5 class="font-weight-bold m-0">{{ $tiket->nama }}</h5>
      <div class="m-0 text-dark" style="white-space: nowrap; width: 250px; overflow: hidden; text-overflow: ellipsis;">
        @if ($tiket->pesan)
        {{ $tiket->pesan->pesan }}
        @endif
      </div>
    </div>
    <div class="ml-auto my-1">
    </div>
  </div>
</li>
@endforeach