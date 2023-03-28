<div class="p-2 d-flex justify-content-center secondary-bg-color">
  <div class="p-2">
    @if ($adminHelpdesk && $adminHelpdesk->active)
    <button id="akhiriMelayani" class="btn btn-danger">Akhiri Melayani</button>
    @else
    <button id="mulaiMelayani" class="btn btn-success">Mulai Melayani</button>
    @endif
  </div>
</div>
<div class="d-flex align-items-center flex-5olumn justify-content-center h-50"
  style="max-height: 50vh; min-height: 50vh">
  <div class="text-center">
    <h1 id="home">
      @if ($count || $adminHelpdesk->active)
      {{ $count }} Antrian Menunggu
      @else
      Layanan Informasi Helpdesk
      @endif</h1>
    <h3>Mari melayani sepenuh hati</h3>
  </div>
</div>