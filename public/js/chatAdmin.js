// mendeklarasikan jika localStorage kosong
if (!localStorage['id_tiket']) {
  localStorage['id_tiket'] = 0;
}
if (!localStorage['statusChat']) {
  localStorage['statusChat'] = 0;
}
if (!localStorage['sessionDetail']) {
  localStorage['sessionDetail'] = 0;
}
if (!localStorage['active']) {
  localStorage['active'] = 0;
}

let id_tiket = localStorage['id_tiket'];
let statusChat = localStorage['statusChat'];
let sessionDetail = localStorage['sessionDetail'];
let querySearch = '';
let listPesan;
let isiPesan;

// variable fillter 
let fillterNama = 0;
let fillterWaktu = 0;
let fillterDepart = 0;

// admin active melayani
let active = localStorage['active'];

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

  let pusher = new Pusher('3ac5c5980227abf2bc42', {
    cluster: 'mt1',
    forceTLS: true
  });

  let channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function (data) {
    if (data.aksi == 'membuat tiket') {
      $(document).find("#pesan").html(`<strong>${data.message}</strong>`);
      $(document).find("#notifikasiPopup").click();
    } else if (data.aksi == 'waktu habis') {
      $(document).find("#pesan").html(`<strong>${data.message} dengan ${data.nama}</strong>`);
      $(document).find("#notifikasiPopup").click();
      localStorage['sessionDetail'] = 0;
      sessionDetail = 0;
    } else if (data.aksi == 'diakhiri') {
      $(document).find("#pesan").html(`<strong>${data.message} dengan ${data.nama}</strong>`);
      $(document).find("#notifikasiPopup").click();
      localStorage['sessionDetail'] = 0;
      sessionDetail = 0;
    } else if (data.aksi == 'kirim' && data.nama != id_pengguna) {
      $(document).find("#pesan").html(`<strong>Pesan Baru dari Id Tiket ${data.nama} : </strong>${data.message}`);
      $(document).find("#notifikasiPopup").click();
    }

    admin_chat_main();
    if (data.id_tiket == id_tiket) {
      if (parseInt(sessionDetail)) {
        detail();
      } else if (parseInt(id_tiket)) {
        pesan();
      } else {
        home();
      }
    }
  });

  admin_chat_head();
  if (parseInt(sessionDetail)) {
    detail();
  } else if (parseInt(id_tiket)) {
    pesan();
  } else {
    home();
  }

  // notifikasi
  $(document).find("#pesan").hide();
  $(document).find("#notifikasiPopup").click(function showAlert() {
    $("#pesan").fadeTo(4000, 3000).slideUp(1000, function () {
      $("#pesan").slideUp(1000);
    });
  });

  $(document).on('click', '.status', function () {
    $('.status').removeClass('selectedStatus');
    $('.status').prop('disabled', false);
    $(this).addClass('selectedStatus');
    $(this).prop('disabled', true);
    localStorage['statusChat'] = $(this).attr('id');
    statusChat = $(this).attr('id');
    admin_chat_main();
    if (parseInt(sessionDetail)) {
      detail();
    } else if (parseInt(id_tiket)) {
      pesan();
    } else {
      home();
    }
  });

  // select tiket
  $(document).on('click', '.user', function () {
    $('.user').removeClass('liActive');
    $(this).addClass('liActive');

    if (id_tiket != $(this).attr('id')) {
      localStorage['id_tiket'] = $(this).attr('id');
      id_tiket = $(this).attr('id');
      localStorage['sessionDetail'] = 0;
      pesan();
    }
  });

  // searching list pesan jika admin sedang melayani saja
  $(document).on('keyup', '.querySearch', function (e) {
    querySearch = $(this).val();

    if (e.which === 13 && querySearch != '') {
      $('#collapseFillter').collapse('hide');
      search();
    }
  });

  $(document).on('click', '#btnApplyFillter', function () {
    $('#collapseFillter').collapse('hide');
    if (querySearch || fillterNama || fillterWaktu || fillterDepart) {
      search();
    }
  });

  $(document).on('click', '#backSearch', function () {
    $('#btnStatus').removeClass('d-none');
    $('#btnStatus').addClass('d-flex');
    $('#backSearch').removeClass('d-flex');
    $('#backSearch').addClass('d-none');
    $('.querySearch').val('');

    $('#collapseFillter').collapse('hide');
    $('#collapseFillter').find('.card-body').find('button').removeClass('btn-fillter-active');
    admin_chat_main();
  });

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

  // melayani
  $(document).on('click', '#mulaiMelayani', function () {
    localStorage['active'] = 1;
    active = 1;
    melayani();
    $('#collapseFillter').attr('hidden', false);
  });

  $(document).on('click', '#akhiriMelayani', function () {
    localStorage['active'] = 0;
    active = 0;
    melayani();
    $('#collapseFillter').attr('hidden', true);
    $('#collapseFillter').collapse('hide');
  });

  // menerima pesan
  $(document).on('click', '#terimaTiket', function () {
    terimaPesan(id_tiket);
  });

  // kembali dari obrolan
  $(document).on('click', '#back-page', function () {
    $('.user').removeClass('liActive');
    localStorage['id_tiket'] = 0;
    id_tiket = 0;
    home();
  });

  // pergi ke detail
  $(document).on('click', '#detail', function () {
    localStorage['sessionDetail'] = 1;
    sessionDetail = 1;
    detail();
  });

  // update status tiket
  $(document).on('click', '#tunda', function () {
    updateStatus(2);
  });

  // kembali dari detail ke isi pesan
  $(document).on('click', '#back-pesan', function () {
    localStorage['sessionDetail'] = 0;
    sessionDetail = 0;
    pesan();
  });

  // mengakhiri obrolan atau tiket
  $(document).on('click', '#akhiri', function () {
    akhiriPesan(id_tiket);
  });

  // mengirim pesan dalam tiket jika tombol kirim di tekan
  $(document).on('click', '#kirim', function () {
    kirim();
  });

  // mengirim pesan dalam tiket jika input di enter
  $(document).on('keyup', '#query', function (e) {
    listPesan = $(this).val();
    $(this).attr('style', 'height: auto'); // default height
    const heightQuery = parseInt($(this)[0].scrollHeight);
    $(this).attr('style', ('height: ' + heightQuery + "px"));

    if (listPesan == '') {
      $(this).attr('style', 'height: auto'); // default height
    }

    if (e.ctrlKey && e.which === 13 && listPesan != '') {
      $(this).val(''); // mengkosongkan formuilr pesan
      kirim(e);
    }
  });
});

function pesan() {
  return $.ajax({
    type: 'get',
    url: '/admin/pesan/' + id_tiket,
    data: '',
    cache: false,
    success: function (data) {
      $('#subcontent').html(data);
      $(document).find('.query').val(listPesan);
      $('#formSearch').removeClass('d-flex');
      $('#formSearch').addClass('d-none');
    },
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

function pesanMain() {
  return $.ajax({
    type: 'get',
    url: '/admin/pesan/main/' + id_tiket,
    data: '',
    cache: false,
    success: function (data) {
      $('#user_chat_main').html(data);
    },
  });
}

function admin_chat_head() {
  return $.ajax({
    type: 'get',
    url: '/admin/admin_chat_head',
    data: '',
    cache: false,
    success: function (data) {
      $('#contentPesan').html(data);
      $('.status').each(function () {
        if (statusChat == $(this).attr('id')) {
          $(this).addClass('selectedStatus')
          $(this).prop('disabled', true);
        };
      });
      admin_chat_main();
    },
    complete: function () {
      btnFillter();
      if (!active) {
        $('#collapseFillter').attr('hidden', true);
      }
    }
  });
}

function admin_chat_main() {
  return $.ajax({
    type: 'get',
    url: '/admin/admin_chat_main/' + id_pengguna,
    data: '',
    cache: false,
    success: function (data) {
      $('#list-pesan').html(data);
      // removeClass liActive
      $('.user').removeClass('liActive');

      // select tiket
      // addClass('liActive');
      $('.user').each(function () {
        if ($(this).attr('id') == id_tiket) {
          $(this).addClass('liActive');
        }
      });

      // list tiket sesuai tiket
      for (let i = 0; i < 4; i++) {
        if (statusChat == i) {
          $('.status-' + i).attr('hidden', false);
        } else {
          $('.status-' + i).attr('hidden', true);
        }
      }
    },
    complete: function () {
      timer();
    }
  });
};

// toogle button fillter
function btnFillter() {
  const btnFillterNama = $(document).find('#buttonFillterNama');
  const btnFillterWaktu = $(document).find('#buttonFillterWaktu');
  const btnFillterDepart = $(document).find('#buttonFillterDepart');

  btnFillterNama.find('button').each(function (i) {
    $(this).on('click', function () {
      if ($(this).is('.btn-fillter-active')) {
        $(this).removeClass('btn-fillter-active');
        fillterNama = 0;
      } else {
        btnFillterNama.find('button').removeClass('btn-fillter-active');
        $(this).addClass('btn-fillter-active');
        fillterNama = i + 1;
      }
    });
  });

  btnFillterWaktu.find('button').each(function (i) {
    $(this).on('click', function () {
      if ($(this).is('.btn-fillter-active')) {
        $(this).removeClass('btn-fillter-active');
        fillterWaktu = 0;
      } else {
        btnFillterWaktu.find('button').removeClass('btn-fillter-active');
        $(this).addClass('btn-fillter-active');
        fillterWaktu = i + 1;
      }
    });
  });

  btnFillterDepart.find('button').each(function (i) {
    $(this).on('click', function () {
      if ($(this).is('.btn-fillter-active')) {
        $(this).removeClass('btn-fillter-active');
        fillterDepart = 0;
      } else {
        btnFillterDepart.find('button').removeClass('btn-fillter-active');
        $(this).toggleClass('btn-fillter-active');
        fillterDepart = i + 1;
      }
    });
  });
}

function timer() {
  $('.timerContainer').each(function (i) {
    let obj = $(this);
    if (obj.find('#kadaluarsa').length != 0) {
      let kadaluarsa = obj.find('#kadaluarsa')[0].innerHTML;
      let deadline = new Date(kadaluarsa).getTime();
      let x = setInterval(function () {
        let now = new Date().getTime();
        if (now < deadline) {
          let t = deadline - now;
          let date = new Date(t);
          let minutes = String(date.getMinutes()).padStart(2, "0");
          let seconds = String(date.getSeconds()).padStart(2, "0");
          let countDown = minutes + ':' + seconds;

          let timerPesan = $('#timerPesan', obj);
          timerPesan.html(countDown);

          if (parseInt(sessionDetail)) {
            $('#sisa_waktu-' + obj.attr('id')).html(countDown);
          }

          let timerBox = $('#timerBox', obj);

          if (minutes < 5) {
            timerBox.removeClass('bg-success');
            timerBox.removeClass('bg-danger');
            timerBox.removeClass('bg-warning');
            timerBox.addClass('bg-danger');
          } else if (minutes < 10) {
            timerBox.removeClass('bg-success');
            timerBox.removeClass('bg-danger');
            timerBox.removeClass('bg-warning');
            timerBox.addClass('bg-warning');
          } else {
            timerBox.removeClass('bg-success');
            timerBox.removeClass('bg-danger');
            timerBox.removeClass('bg-warning');
            timerBox.addClass('bg-success');
          }
        } else {
          clearInterval(x);
        }
      }, 1000);
    } else {
      let timerBox = $('#timerBox', obj);
      timerBox.removeClass('bg-success');
      timerBox.removeClass('bg-danger');
      timerBox.removeClass('bg-warning');
      timerBox.addClass('bg-danger');
    }
  });
}

function home() {
  return $.ajax({
    type: 'get',
    url: '/admin/pesan/home',
    data: '',
    cache: false,
    success: function (data) {
      $('#subcontent').html(data);

      if (statusChat != 0) {
        $('#home').html('Layanan Informasi Helpdesk')
      }
    }
  });
}

function melayani() {
  return $.ajax({
    type: 'get',
    url: '/admin/pesan/melayani/' + active,
    data: '',
    cache: false,
    success: function (data) {
      admin_chat_main();
      home();
    }
  });
}

function detail() {
  return $.ajax({
    type: 'get',
    url: '/admin/pesan/detail/' + id_tiket,
    data: '',
    cache: false,
    success: function (data) {
      $('#subcontent').html(data);
    }
  });
}

function updateStatus(valueStatus) {
  return $.ajax({
    type: 'get',
    url: '/admin/pesan/update/' + id_tiket + '/' + valueStatus,
    data: '',
    cache: false,
  });
}
function terimaPesan(id_tiket_akhiri) {
  return $.ajax({
    type: 'get',
    url: '/admin/pesan/terima/' + id_tiket_akhiri + '/' + id_pengguna,
    data: '',
    cache: false,
  });
}

function akhiriPesan(id_tiket_diakhiri) {
  return $.ajax({
    type: 'get',
    url: '/admin/pesan/akhiri/' + id_tiket_diakhiri,
    data: '',
    cache: false,
  });
}

function search() {
  let datastr = `querySearch=${querySearch}&fillterNama=${fillterNama}&fillterWaktu=${fillterWaktu}&fillterDepart=${fillterDepart}&status=${statusChat}`;

  $.ajax({
    type: "post",
    url: "/admin/pesan/search",
    data: datastr,
    cache: false,
    success: function (data) {
      $('#list-pesan').html(data);
      $('#btnStatus').removeClass('d-flex')
      $('#btnStatus').addClass('d-none')
      $('#backSearch').removeClass('d-none')
      $('#backSearch').addClass('d-flex')
    },
  });
}

function kirim() {
  let datastr = `id_tiket=${id_tiket}&id_pengguna=${id_pengguna}&pesan=${listPesan}`;

  $.ajax({
    type: "post",
    url: "/kirimPesan", // need to create this post route
    data: datastr,
    cache: false,
    success: function (data) {
      listPesan = ''; // mengkosongkan formuilr pesan
    },
  });
}