let id_tiket = localStorage['id_tiket'];
let isiPesan = '';

// select isi pesan yang dicari
let selectPesan = [];
let isSelected = '';
let selectCount = 0;
const dataPesan = [];

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
          $(document).find('#btn-alert').html('Kembali');
          $(document).find('#notifikasi').click();

        } else if (data.aksi == 'waktu habis') {
          $(document).find('#pesanPengingat').html(data.message);
          $(document).find('#btn-alert').attr('href', '/user/riwayat');
          $(document).find('#btn-alert').html('Lihat Riwayat');
          $(document).find('#notifikasi').click();
          localStorage['sessionDetail'] = 0;
          sessionDetail = 0;
          // delay
          window.location = '/user/riwayat';
        } else if (data.aksi == 'diakhiri') {
          $(document).find('#pesanPengingat').html(data.message);
          $(document).find('#btn-alert').attr('href', '/user/riwayat');
          $(document).find('#btn-alert').html('Lihat Riwayat');
          $(document).find('#notifikasi').click();
          // delay
          window.location = '/user/riwayat';
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

  $(document).on('keyup', '#query', function (e) {
    isiPesan = $(this).val();
    $(this).attr('style', 'height: auto'); // default height
    const heightQuery = parseInt($(this)[0].scrollHeight);
    $(this).attr('style', ('height: ' + heightQuery + "px"));

    if (isiPesan == '') {
      $(this).attr('style', ('height: auto')); // heigh default
    }

    if (e.ctrlKey && e.which === 13 && isiPesan != '') {
      $(this).val(''); // mengkosongkan formuilr pesan
      kirim(e);
    }
  })

  // searching isi pesan 
  $(document).on('click', '#serachIsiPesan', function () {
    $('#formDefault').removeClass('d-flex');
    $('#formDefault').addClass('d-none');
    $('#formSearch').removeClass('d-none');
    $('#formSearch').addClass('d-flex');
    $('#upDown').attr('hidden', false);
    $('#kirimPesan').attr('hidden', true);
    $('.querySearchIsiPesan').focus();
  });

  // query search isi pesan
  $(document).on('keyup', '.querySearchIsiPesan', function () {
    isiPesan = $(this).val();
    searchIsiPesan();
  });

  // select result search to up
  $(document).on('click', '.fa-angle-up', function () {
    const scrolling = $(document).find('#scrolling');
    if (selectPesan.length != 0) {
      scrolling.find('li').removeClass('third-bg-color');
      if (selectCount < selectPesan.length) {
        isSelected -= 1;
        selectCount += 1;
      }
      $('#selectCount').html(selectCount);
      scrolling.find('li:eq(' + selectPesan[isSelected] + ')').addClass('third-bg-color');
    }
    const selectElement = scrolling.find('.third-bg-color')[0].offsetTop;
    scrolling[0].scrollTop = selectElement - 100;
  });

  // select result search to down
  $(document).on('click', '.fa-angle-down', function () {
    const scrolling = $(document).find('#scrolling');
    if (selectPesan.length != 0) {
      scrolling.find('li').removeClass('third-bg-color');
      if (isSelected < (selectPesan.length - 1)) {
        isSelected += 1;
        selectCount -= 1;
      }
      $('#selectCount').html(selectCount);
      scrolling.find('li:eq(' + selectPesan[isSelected] + ')').addClass('third-bg-color');
    }
    const selectElement = scrolling.find('.third-bg-color')[0].offsetTop;
    scrolling[0].scrollTop = selectElement - 100;
  });

  // riwayat chat
  // batal search isi pesan
  $(document).on('click', '#batalCari', function () {
    $('#formDefault').removeClass('d-none');
    $('#formDefault').addClass('d-flex');
    $('#formSearch').removeClass('d-flex');
    $('#formSearch').addClass('d-none');
    $('.querySearchIsiPesan').val('');
    $('#upDown').attr('hidden', true);
    $('#kirimPesan').attr('hidden', false);
    isiPesan = '';
    searchIsiPesan();
  });
});

function pesan() {
  return $.ajax({
    type: 'get',
    url: '/user/pesan/' + id_tiket,
    data: '',
    cache: false,
    success: function (data) {
      $('#subcontent').html(data);
      $('#query').val(isiPesan);
      $('#query').focus();
    }
  });
}

function searchIsiPesan() {
  const scrolling = $(document).find('#scrolling');
  const pesan = scrolling.find('p.mt-0');
  const mark = pesan.find('mark');

  mark.each(function () {
    $(this).replaceWith($(this).text());
  });

  // Membuat regex untuk mencari teks yang cocok
  var regex = new RegExp(isiPesan, 'gi');

  pesan.each(function (i) {
    // menambahkan isi pesan kedalam dataPesan jika panjangnya kurang dari panjang pesan
    if (dataPesan.length < pesan.length) {
      dataPesan[i] = $(this).html();
    }
    // Mendapatkan teks dari li pesan
    var liText = $(this).html();

    // Mengubah teks yang cocok dengan regex menjadi highlight
    $(this).html(liText.replace(regex, function (match) {
      return '<mark>' + match + '</mark>';
    }));
  });

  scrolling.find('li').removeClass('third-bg-color');

  // jika isi pesan yang dicari kosong
  if (isiPesan == '') {
    $('#count').html('0');
    mark.remove();
    pesan.each(function (i) {
      $(this).html(dataPesan[i]);
    });
    isSelected = '';
    selectCount = 0;
  }

  // menentukan jumlah pesan yang dicari
  let selectLi = [];
  scrolling.find('li').each(function (index) {
    const spanHighlight = $(this).find('mark');
    if (spanHighlight.length != 0) {
      selectLi.push(index);
    }
  });
  selectPesan = selectLi;

  // mengisi jumlah hasil yang dicari dan pesan keberapa yang di pilih
  if (selectPesan.length != 0) {
    scrolling.find('li:eq(' + selectPesan.slice(-1) + ')').addClass('third-bg-color');
    isSelected = selectPesan.length - 1;
    selectCount = (selectPesan.length + 1) - selectPesan.length;
  }

  if (selectPesan.length == 0) {
    selectCount = 0;
  }
  $('#selectCount').html(selectCount);
  $('#count').html(selectPesan.length);

  // otomatis scroll jika pesan terpilih
  if (isiPesan != '' && selectCount != 0) {
    const selectElement = scrolling.find('.third-bg-color')[0].offsetTop;
    scrolling[0].scrollTop = selectElement - 100;
  }
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
    success: function () {
      window.location = '/user/riwayat';
    }
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