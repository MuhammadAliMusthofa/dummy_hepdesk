<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">

</head>
<body >

   


    {{-- chat --}}
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header  text-white d-flex justify-content-between" style="background-color: 
                    #BACFDA">
                        <div class="text-white"><h3>ADMIN 1</h3></div>
                        <div ><a class="btn btn-danger" href=""> Akhiri sesi</a></div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="media mr-3" style="width:35%">
                               
                                <div class="media-body" style="background-color: 
                                #D6E2E9; border-radius:10px;">
                                    <p class="mt-0 mb-1 p-2">Halo kak ada yang bisa dibantu?</p>
                                    

                                </div>
                                 <div class="ml-2 d-flex mt-auto"><p>9.00</p></div>
                            </li>
                            <li class="media my-4 ">
                                
                                <div class="media-body d-flex flex-row-reverse">
                                    <p class="mt-0 mb-1 p-2" style="background-color: #606060; color:white; width: 45%; border-radius:10px;">Halo saya mau nanya cara edit profile gimana ya min? </p>
                                   
                                </div>
                            </li>
                            <li class="media my-4 ">
                                
                                <div class="media-body d-flex flex-row-reverse">
                                    <p class="mt-0 mb-1 p-2" style="background-color: #606060; color:white; width: 45%; border-radius:10px;">Terima Kasih </p>
                                   
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
