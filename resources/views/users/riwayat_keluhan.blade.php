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
            background-color: #98B7C7;

        }
        button{
            width:100%;
        }
    </style>
</head>
<body bg-secondary>
    <div class="header d-flex justify-content-between">
        <div class="ml-3">
            <h1>Layanan helpdesk</h1>
            

        </div>

        <div id="action_page" class=" d-flex align-items-end mr-3 " >
            <a class="pr-2" href="">
                <i class="fas fa-cog mr-3">Pengaturan</i>
            </a>
            <a  href="">
                <i class="fas fa-sign-out-alt mr-2">Keluar</i>
            </a>
        </div>
    </div>
    <h6 class="ml-3 mb-5">Beranda / Layanan Helpdesk / Riwayat </h6>

    <div class="card mt-5 mr-3 ml-3">
        <div class="card-header">
            <h5 class="card-title">Riwayat Keluhan</h5>
            <form action="">

                <div  class="input-group mb-3 col-md-4 p-0">
                    <input id="keluhan" type="text" class="form-control" placeholder="Cari keluhan" aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                <td ><i class="fas fa-file btn btn-secondary"></i></td>
                
                <td> <button class="btn btn-success">Selesai</button>  </td>
              </tr>
              <tr>
                <th scope="row">00121</th>
                <td>07/12/2022</td>
                <td>Erly Krisnanik</td>
                <td>erlykrisnanik@upnvj.ac.id</td>
                <td>Dosen</td>
                <td ><i class="fas fa-file   btn btn-secondary"></i></td>

                <td > <button class="btn btn-danger">  Dibatalkan</button></td>
              </tr>
              <tr>
                <th scope="row">00121</th>
                <td>07/12/2022</td>
                <td>Erly Krisnanik</td>
                <td>erlykrisnanik@upnvj.ac.id</td>
                <td>Dosen</td>
                <td ><i class="fas fa-file btn btn-secondary"></i></td>
                
                <td > <button class="btn btn-warning">Berlangsung</button></td>

              </tr>
              <tr>
                <th scope="row">00121</th>
                <td>07/12/2022</td>
                <td> Erly Krisnanik</td>
                <td>erlykrisnanik@upnvj.ac.id</td>
                <td>Dosen</td>
                <td ><i class="fas fa-file btn btn-secondary"></i></td>
                <td ><button class="btn btn-primary">Menunggu</button></td>

              </tr>
            
            </tbody>
        </table>
    </div>
</body>
</html>