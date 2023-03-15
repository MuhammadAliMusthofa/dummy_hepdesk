<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <style>
        #card-header-chat{
            background-color: #295D77;
        }

        #chat-admin{

            background-color:#D6E2E9; 
            border-radius: 0px 15px 15px 15px / 25px 15px 15px 15px;
            box-shadow: 2px 2px rgb(161, 159, 159);
        }

        #footer{
            background-color: #295D77;
        }

        #chat-user p {
            background-color: #214B5F;
             color:white; 
             width: 45%; 
             border-radius:10px;
             box-shadow: 2px 2px rgb(161, 159, 159);
        }
    </style>
</head>
<body >

   {{-- navbar --}}
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

      <li class="nav-item no-arrow d-flex align-items-center ml-4">
        <i class="fas fa-sign-out-alt mr-2"></i>
        <p class="m-0 font-weight-bold text-dark">Keluar</p>
      </li>
    </ul>
  </nav>


    {{-- chat --}}
    <div class="container mt-5 col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header  text-dark d-flex justify-content-between align-items-center" style="background-color: 
                    #BACFDA">
                        <div class=""><h3>ADMIN 1</h3></div>
                        <div class="py-auto text-center">
                            <h4>Sisa Waktu</h4>
                            <h4>23:00</h4></div>
                        <div class="" ><a class="btn btn-danger" href=""> Akhiri sesi</a></div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">

                            <li class="media mr-3" style="width:35%">
                               
                                <div id="chat-admin" class="media-body">
                                    <p class="mt-0 mb-1 p-2">Halo, ada yang bisa kami bantu?</p>
                                    
                                    <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2"><p>9.00 A.M</p></div>

                                </div>
                            </li>

                            <li class="media my-4 ">
                                
                                <div id="chat-user" class="media-body d-flex flex-row-reverse">
                                    <p class="mt-0 mb-1 p-2">Halo saya mau nanya cara edit profile gimana ya min? </p>
                                    {{-- <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2"><p>9.00 A.M</p></div> --}}
                                </div>
                            </li>

                            <li class="media mr-3" style="width:35%">
                               
                                <div id="chat-admin" class="media-body">
                                    <p class="mt-0 mb-1 p-2">Boleh buka menu profile lalu klik icon keranjang kuning</p>
                                    
                                    <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2"><p>9.00 A.M</p></div>
                                </div>
                                 
                            </li>

                            

                            <li class="media my-4 ">
                                
                                <div id="chat-user" class="media-body d-flex flex-row-reverse">
                                    <p class="mt-0 mb-1 p-2">Terimakasih banyak
                                    </p>
                        
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="card-footer mt-5 " style="background-color: #BACFDA">
                        <form class="">
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="btn" style="font-size:20px"><i class="fas fa-paperclip "></i></div>  
                                <input type="text" class="form-control mr-2 ml-2" placeholder="Type your message">
                                <div class="btn" style="font-size:20px"><i class="fas fa-paper-plane"></i></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
