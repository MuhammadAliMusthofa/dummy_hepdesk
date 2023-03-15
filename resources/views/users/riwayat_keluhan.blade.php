<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     
    
    <title>Riwayat keluhan</title>
    <style>
        /* body{
            background-color: 
        } */

        #action_page a{
            color:black;
        }

        #keluhan {
            /* background-color: #98B7C7; */

        }
        button{
            width:100%;
        }
    </style>
</head>
<body bg-secondary>
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
    <div class="card mt-5 mr-3 ml-3">
        <div class="card-header">
            <h5 class="card-title">Riwayat Keluhan</h5>
            <form action="">

                <div  class="input-group mb-3 col-md-4 p-0">
                    <input id="keluhan" type="text" class="form-control bg-light" placeholder="Cari keluhan" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append ">
                      <span class="input-group-text" id="basic-addon2" style="background-color:#98B7C7;"><i class="fas fa-search"></i></span>
                    </div>
                  </div>
            </form>
            
        </div>
        <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Id Ticket</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Departemen</th>
                <th scope="col">Detail</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">00121</th>
                <td>07/12/2022</td>
                <td>Erly Krisnanik</td>
                <td>erlykrisnanik@upnvj.ac.id</td>
                <td>Dosen</td>
                <td ><a href="{{route('riwayat_detail')}}"><i class="fas fa-file btn btn-primary"></i></a></td>
                
                <td> <button class="btn btn-success">Selesai</button>  </td>
              </tr>
              <tr>
                <th scope="row">00121</th>
                <td>07/12/2022</td>
                <td>Erly Krisnanik</td>
                <td>erlykrisnanik@upnvj.ac.id</td>
                <td>Dosen</td>
                <td ><i class="fas fa-file   btn btn-primary"><a href=""></a></i></td>

                <td > <button class="btn btn-danger">  Dibatalkan</button></td>
              </tr>
              <tr>
                <th scope="row">00121</th>
                <td>07/12/2022</td>
                <td>Erly Krisnanik</td>
                <td>erlykrisnanik@upnvj.ac.id</td>
                <td>Dosen</td>
                <td ><i class="fas fa-file btn btn-primary"><a href=""></a></i></td>
                
                <td > <button class="btn btn-warning">Berlangsung</button></td>

              </tr>
              <tr>
                <th scope="row">00121</th>
                <td>07/12/2022</td>
                <td> Erly Krisnanik</td>
                <td>erlykrisnanik@upnvj.ac.id</td>
                <td>Dosen</td>
                <td ><i class="fas fa-file btn btn-primary"><a href=""></a></i></td>
                <td ><button class="btn btn-primary">Menunggu</button></td>

              </tr>
            
            </tbody>
        </table>
    </div>
</body>
</html>