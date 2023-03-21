<div class="p-2 d-flex justify-content-center secondary-bg-color">
  <div class="p-2">
    <button class="btn btn-success">Mulai Melayani</button>
  </div>
</div>
<div class="d-flex align-items-center flex-column justify-content-center h-100" style="height: 200px;">
  <div class="text-center">
    <h1 id="antrian">
      @if ($count)
      {{ $count }}
      @else
      0
      @endif
      Antrian Menunggu</h1>
    <h3>Mari melayani sepenuh hati</h3>
  </div>
</div>