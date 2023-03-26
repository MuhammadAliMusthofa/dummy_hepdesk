<div class="p-2 d-flex justify-content-center secondary-bg-color">
  <div class="p-2">
    @if ($adminHelpdesk->active)
    <button id="akhiriMelayani" class="btn btn-danger">Akhiri Melayani</button>
    @else
    <button id="mulaiMelayani" class="btn btn-success">Mulai Melayani</button>
    @endif
  </div>
</div>
<div class="d-flex align-items-center flex-5olumn justify-content-center h-50"
  style="max-height: 50vh; min-height: 50vh">
  <div class="text-center">
    <h1 id="antrian">
      @if ($count && $adminHelpdesk->active)
      {{ $count }}
      @else
      0
      @endif
      Antrian Menunggu</h1>
    <h3>Mari melayani sepenuh hati</h3>
  </div>
</div>