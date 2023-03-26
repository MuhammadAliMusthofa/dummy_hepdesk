let id_tiket = localStorage['id_tiket'];
let isiPesan = '';

$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Enable pusher logging - don't include this in production
  // Pusher.logToConsole = true;

  var pusher = new Pusher('3ac5c5980227abf2bc42', {
    cluster: 'mt1',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function (data) {
    if (data.id_tiket == id_tiket) {
      {
        if (data.aksi == 'diterima') {
          $(document).find("#pesan").html(`<strong>${data.message}</strong>`);
          $(document).find("#notifikasiPopup").click();

        } else if (data.aksi == 'berjalan') {
          $(document).find("#pesan").html(`<strong>${data.message}</strong>`);
          $(document).find("#notifikasiPopup").click();

        } else if (data.aksi == 'ditunda') {
          $(document).find("#pesan").html(`<strong>${data.message}</strong>`);
          $(document).find("#notifikasiPopup").click();
          window.location = '/user/riwayat';

        } else if (data.aksi == 'kirim' && data.nama != id_pengguna) {
          let pesan;
          if (window.location.pathname == '/user/pesan') {
            pesan = `<strong>Pesan baru dari Admin: ${data.message}</strong>`
          } else {
            pesan = `<a href='/user/pesan'>
                      <strong>Pesan baru dari Admin: ${data.message}</strong>
                    </a>`
          }

          $(document).find("#pesan").html(pesan);
          $(document).find("#notifikasiPopup").click();

        } else if (data.aksi == 'waktu-10mnt') {
          $(document).find('#pesanPengingat').html(data.message);
          $(document).find('#notifikasi').click();

        } else if (data.aksi == 'waktu habis') {
          $(document).find('#pesanPengingat').html(data.message);
          $(document).find('#notifikasi').click();
          localStorage['sessionDetail'] = 0;
          sessionDetail = 0;
        }

        pesan();
      }
    }
  });

  // menampilkan pesan
  if (window.location.pathname == '/user/pesan') {
    pesan();
  }

  // notifikasi
  $(document).find("#pesan").hide();
  $(document).find("#notifikasiPopup").click(function showAlert() {
    $("#pesan").fadeTo(7000, 5000).slideUp(1000, function () {
      $("#pesan").slideUp(1000);
    });
  });

  $(document).on('click', '#akhiri', function () {
    akhiri();
  });

  $(document).on('click', '#kirim', function () {
    kirim();
  });

  $(document).on('keyup', '.query', function (e) {
    isiPesan = $(this).val();

    if (e.which === 13 && isiPesan != '') {
      $(this).val(''); // mengkosongkan formuilr pesan
      kirim(e);
    }
  })

});

function pesan() {
  return $.ajax({
    type: 'get',
    url: '/user/pesan/' + id_tiket,
    data: '',
    cache: false,
    success: function (data) {
      $('#subcontent').html(data);
      $(document).find('.query').val(isiPesan);
    },
    error: function () {
      window.location = '/user/riwayat';
    }
  });
}


function updateTimer() {
  if (window.location.pathname == '/user/pesan') {
    let x;
    let kadaluarsa = $('#kadaluarsa')[0].innerHTML;
    let deadline = new Date(kadaluarsa).getTime();
    let now = new Date().getTime();
    let countdown = $('#countdown');

    if (now < deadline) {
      let t = deadline - now;
      let date = new Date(t);
      let minutes = date.getMinutes();
      let seconds = date.getSeconds();

      countdown.html(minutes + ':' + seconds);
      if (minutes < 5) {
        countdown.removeClass('bg-warning');
        countdown.addClass('bg-danger');
      } else if (minutes < 10) {
        countdown.removeClass('bg-success');
        countdown.addClass('bg-warning');
      }
    } else { clearInterval(x) }
  }
}

x = setInterval(updateTimer, 1000);

function akhiri() {
  return $.ajax({
    type: 'get',
    url: '/user/pesan/akhiri/' + id_tiket,
    data: '',
    cache: false,
  });
}

function kirim(e) {
  var datastr = `id_tiket=${id_tiket}&id_pengguna=${id_pengguna}&pesan=${isiPesan}`;

  $.ajax({
    type: "post",
    url: "/kirimPesan", // need to create this post route
    data: datastr,
    cache: false,
    success: function (data) {
      pesan();
      isiPesan = ''; // mengkosongkan formuilr pesan
    },
    error: function (jqXHR, status, err) {
    },
  });

}