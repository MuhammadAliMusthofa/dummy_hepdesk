<div class="product-options">
  <a id="notifikasiPopup" href="javascript:;" class="btn btn-mini" hidden>Add to Wishlist </a>
</div>
<div class="alert alert-success" id="pesan" style="position: fixed; z-index: 999; top: 3vh; right: 50vh">
</div>


<!-- Button trigger modal -->
<button id="notifikasi" type="button" class="btn btn-primary" data-toggle="modal" data-target="#popupNotifikasi">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="popupNotifikasi" tabindex="-1" role="dialog" aria-labelledby="popupNotifikasiTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-4">
      <div class="modal-body d-flex justify-content-center my-4">
        <div class="p-2 d-flex align-items-center flex-column">
          <i class="fa fa-exclamation-triangle fa-7x m-2" aria-hidden="true" style="color: red"></i>
          <div class="m-2 text-center">
            <h3 id="pesanPengingat" class="font-weight-bold">Waktu obrolan sudah habis.</h3>
            <p>jika masih ada pertanyaan yang belum terjawab silahkan kembali mengantri.</p>
          </div>
          <a id="btn-alert" type="button" class="m-2 h4" data-dismiss="modal" style="color: blue"></a>
        </div>
      </div>
    </div>
  </div>
</div>