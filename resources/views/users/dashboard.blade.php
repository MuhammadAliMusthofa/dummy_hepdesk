@extends('layouts.dashboard_layout')

@section('content')

  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header  text-dark d-flex justify-content-between align-items-center" style="background-color: 
              #BACFDA">
                  <div class=""><h3>ADMIN 1</h3></div>
                  <div class="py-auto text-center">
                      <h4>Sisa Waktu</h4>
                      <h4>23:00</h4></div>
                  <div class="" ><a class="btn btn-danger text-light" href="{{route('ssd')}}"> Akhiri sesi</a></div>
              </div>
              <div class="card-body">
                  <ul class="list-unstyled">

                      <li class="media mr-3" style="width:35%">
                         
                          <div id="chat-admin" class="media-body">
                              <p class="mt-0 mb-1 p-2">Halo, ada yang bisa kami bantu?</p>
                              
                              <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2"><p>9.00 A.M</p></div>

                          </div>
                      </li>

                      <li class="media my-4 ml-auto" style="width:35%">
                          
                        <div id="chat-user" class="media-body ">
                            <p class="mt-0 mb-1 p-2 text-white">Saya ada kendala</p>
                            
                            <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2 text-white"><p class="text-white">9.00 A.M</p></div>
                        </div>
                      </li>

                      <li class="media mr-3" style="width:35%">
                         
                          <div id="chat-admin" class="media-body">
                              <p class="mt-0 mb-1 p-2 ">Boleh buka menu profile lalu klik icon keranjang kuning</p>
                              
                              <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2 "><p>9.00 A.M</p></div>
                          </div>
                           
                      </li>

                      

                      <li class="media my-4 ml-auto" style="width:35%">
                          
                        <div id="chat-user" class="media-body ">
                            <p class="mt-0 mb-1 p-2 text-white">Terima Kasih</p>
                            
                            <div class="ml-2 d-flex justify-content-end align-items-end mr-2 mt-2"><p class="text-white">9.00 A.M</p></div>
                        </div>
                      </li>
                     
                  </ul>
              </div>
              <div class="card-footer mt-5 " style="background-color: #BACFDA">
                  <form class="">
                      <div class="form-group d-flex justify-content-between align-items-center">
                          <div class="btn" style="font-size:25px"><i class="fas fa-paperclip text-dark "></i></div>  
                          <input type="text" class="form-control mr-2 ml-2" placeholder="Type your message">
                          <div class="btn" style="font-size:25px"><i class="fas fa-paper-plane"></i></div>
                      </div>
                  </form>   
              </div>
          </div>
      </div>
  </div>

@endsection