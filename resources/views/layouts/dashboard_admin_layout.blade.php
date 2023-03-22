<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Sister</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          {{-- <img src="./img/logo.png" alt="" /> --}}
        </div>
        <div class="sidebar-brand-text text-dark mx-3">Sister</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item sidebar-info justify-content-center py-4">
        <div class="px-3 d-flex mb-3">
          <p class="nav-link my-0 text-center h6 bg-white text-dark py-2 font-weight-bold">9/3/2023 - 07.35.11</p>
        </div>

        <p class="nav-link my-0 py-0 h6">Selamat datang, Dummy Dosen 1 Dosen - Program Studi S1 Teknik Informatika</p>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Profil</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Kualifikasi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Kompetensi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Pelaks. Pendidikan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-flask"></i>
          <span>Pelaks. Penelitian</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-link"></i>
          <span>Pelaks. Pengabdian</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-life-ring"></i>
          <span>Penunjang</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-trophy"></i>
          <span>Reward</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#layananPAK" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-graduation-cap"></i>
          <span>Layanan PAK</span>
        </a>
        <div id="layananPAK" class="collapse" aria-labelledby="headingLPAK" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#layananHD" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="fas fa-fw fa-comments"></i>
          <span>Layanan Helpdesk</span>
        </a>
        <div id="layananHD" class="collapse" aria-labelledby="headingLHD" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.chat') }}">Chat</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand topbar mb-4 static-top">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fas fa-fw fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <div class="navbar-nav flex-column mt-4">
            <p class="m-0 h4 font-weight-bold mb-2 text-dark">Layanan Informasi</p>
            <p class="m-0 h6 text-dark font-weight-bold">Beranda / Layanan Helpdesk</p>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <!-- Nav Item - User Information -->
            <li class="nav-item no-arrow d-flex align-items-center">
              <i class="fas fa-cog mr-2"></i>
              <p class="m-0 font-weight-bold text-dark">Pengaturan</p>
            </li>

            <a href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <li class="nav-item no-arrow d-flex align-items-center ml-4">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <p class="m-0 font-weight-bold text-dark">Keluar</p>
              </li>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Pusher CDN -->
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  {{-- <script src="js/sb-admin-2.min.js"></script> --}}

  <!-- Page level plugins -->
  {{-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}vendor/chart.js/Chart.min.js"></script> --}}

  <!-- Page level custom scripts -->
  {{-- <script src="js/demo/chart-area-demo.js"></script> --}}
  {{-- <script src="js/demo/chart-pie-demo.js"></script> --}}
  <script>
    const id_pengguna = "{{ Auth::id() }}";
    // mendeklarasikan jika localStorage kosong
    if(!localStorage['id_tiket']){
      localStorage['id_tiket'] = 0;
    }
    if(!localStorage['status']) {
      localStorage['status'] = 0;
    }
    if(!localStorage['sessionDetail']){
      localStorage['sessionDetail'] = 0;
    }

    let id_tiket = localStorage['id_tiket'];
    let status = localStorage['status'];
    let sessionDetail = localStorage['sessionDetail'];
    let isiPesan;

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
        admin_chat_main();
        if(data.id_tiket == id_tiket){
          pesan();
        }
      });

      admin_chat_head();
      if(parseInt(sessionDetail)){
        detail();
      }else if(parseInt(id_tiket)){
        pesan();
      }else{
        antrian();
      }

        $(document).on('click', '.status', function(){
          $('.status').removeClass('selectedStatus');
          $('.status').prop('disabled', false);
          $(this).addClass('selectedStatus');
          $(this).prop('disabled', true);
          localStorage['status'] = $(this).attr('id');
          status = $(this).attr('id');
          admin_chat_main();
          if(parseInt(sessionDetail)){
            detail();
          }else if(parseInt(id_tiket)){
            pesan();
          }else{
            antrian();
          }
        });


        $(document).on('click', '.user', function(){
          $('.user').removeClass('liActive');
          $(this).addClass('liActive');
          
          if(id_tiket != $(this).attr('id')){
            localStorage['id_tiket'] = $(this).attr('id');
            id_tiket = $(this).attr('id');
            localStorage['sessionDetail'] = 0;
            pesan();
          }
        });

        $(document).on('click', '#terimaTiket', function(){
          terimaPesan(id_tiket);
        });

        $(document).on('click', '#back-page', function(){
          $('.user').removeClass('liActive');
          localStorage['id_tiket'] = 0;
          id_tiket = 0;
          antrian();
        });

        $(document).on('click', '#detail', function(){
          localStorage['sessionDetail'] = 1;
          sessionDetail = 1;
          detail();
        });

        $(document).on('click', '#back-pesan', function(){
          localStorage['sessionDetail'] = 0;
          sessionDetail = 0;
          pesan();
        });

        $(document).on('click', '#akhiri', function(){
          akhiriPesan();
        });

        $(document).on('click', '#kirim', function(){
        isiPesan = $('.query').val();
        $('.query').val(''); // mengkosongkan formuilr pesan
        kirim();
        });

        $(document).on('keyup', '.query', function(e){
          isiPesan = $(this).val();
          
          if(e.which === 13 && isiPesan != ''){
            $(this).val(''); // mengkosongkan formuilr pesan
            kirim(e);
          } 
        })
    });

    function pesan(){
      return $.ajax({
      type: 'get',
      url: '/admin/pesan/' + id_tiket,
      data: '',
      cache: false,
      success: function(data) {
        $('#subcontent').html(data);
      }
      });
    }

    function admin_chat_head(){
    return $.ajax({
    type: 'get',
    url: '/admin/admin_chat_head',
    data: '',
    cache: false,
    success: function(data) {
    $('#contentPesan').html(data);
    $('.status').each(function(){
      if(status == $(this).attr('id')){
        $(this).addClass('selectedStatus')
        $(this).prop('disabled', true);
      };
    });
    admin_chat_main();
    }});
    }

    function admin_chat_main(){
      return $.ajax({
      type: 'get',
      url: '/admin/admin_chat_main/' + status + '/' + id_pengguna,
      data: '',
      cache: false,
      success: function(data) {
        $('#list-pesan').html(data);
        // removeClass liActive
        $('.user').removeClass('liActive');

        // select tiket
        // addClass('liActive');
        $('.user').each(function(){
          if($(this).attr('id') == id_tiket){
              $(this).addClass('liActive');
            }
        });
      },
      complete: function() {
        timer();
      }
    });
    };

    function timer(){
      $('.user').each(function(i){
        var obj = $(this);
        if(obj.find('#kadaluarsa').length != 0){
          var kadaluarsa = obj.find('#kadaluarsa')[0].innerHTML;
          var deadline = new Date(kadaluarsa).getTime();
          var x = setInterval(function () {
            let now = new Date().getTime();
            if(now < deadline){
              let t = deadline - now; 
              date = new Date(t);
              minutes = String(date.getMinutes()).padStart(2, "0"); 
              seconds = String(date.getSeconds()).padStart(2, "0");
              let countDown = minutes + ':' + seconds;
              
              let timerPesan = $('#timerPesan', obj);
              timerPesan.html(countDown);
              $('#sisa_waktu-'+ obj.attr('id')).html(countDown); 
              
              let timerBox = $('#timerBox', obj);
              
              if(minutes < 2){ 
                timerBox.removeClass('bg-success');
                timerBox.removeClass('bg-danger');
                timerBox.removeClass('bg-warning');
                timerBox.addClass('bg-danger'); 
              }else if(minutes < 5){
                timerBox.removeClass('bg-success');
                timerBox.removeClass('bg-danger');
                timerBox.removeClass('bg-warning');
                timerBox.addClass('bg-warning');
              }
            }else {
              akhiriPesan(obj.attr('id'));
              clearInterval(x);
            }
          }, 1000);
        }
      });
    }

    function antrian(){
      return $.ajax({
        type: 'get',
        url: '/admin/pesan/antrian',
      data: '',
      cache: false,
      success: function(data) {
      $('#subcontent').html(data);
      if(status != 0){
        $('#antrian').html('Layanan Informasi Helpdesk')
      }
      }
      });
    }

    function detail(){
      return $.ajax({
      type: 'get',
      url: '/admin/pesan/detail/' + id_tiket,
      data: '',
      cache: false,
      success: function(data) {
      $('#subcontent').html(data);
      }
      });
    }

    function terimaPesan(id_tiket_akhiri){
      return $.ajax({
          type: 'get',
          url: '/admin/pesan/terima/' + id_tiket_akhiri + '/' + id_pengguna,
          data: '',
          cache: false,
          success: function() {
            admin_chat_main();
            pesan();
          },
          error: function(err){
            alert(err.responseText);
            localStorage['id_tiket'] = 0;
            id_tiket = 0;
            admin_chat_main();
            antrian();
          }
          });
    }

    function akhiriPesan(){
      return $.ajax({
      type: 'get',
      url: '/admin/pesan/akhiri/' + id_tiket,
      data: '',
      cache: false,
      success: function(data) {
        admin_chat_main();
        if(parseInt(sessionDetail)){
          detail();
        }else{
          pesan();
        }
      }
      });
    }

    function kirim(e){
        var datastr = `id_tiket=${id_tiket}&id_pengguna=${id_pengguna}&pesan=${isiPesan}`;
      
        $.ajax({
        type: "post",
        url: "/kirimPesan", // need to create this post route
        data: datastr,
        cache: false,
        success: function (data) {
          admin_chat_main();
          pesan();
        },
        error: function (jqXHR, status, err) {
        },
        });
      }
  </script>
</body>

</html>