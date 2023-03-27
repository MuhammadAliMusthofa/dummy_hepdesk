@extends('layouts.dashboard_layout')

@section('content')

<div class="row justify-content-center text-center">
    <h4 class=" font-weight-bold mt-2">Halo Admin 1 ! Semangat Selalu ihiww!</h4>
    <div class="col-8">
        <div class="input-group my-4">
            <input type="text" class="form-control p-4" placeholder="Cari SSD" aria-label="Username" aria-describedby="basic-addon1">
            <div class="input-group-append border-right-0">
                <span class="input-group-text bg-white border-left-0" id="basic-addon1"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>

    <div class="d-flex col-12 justify-content-between">
        <button type="button" class="btn btn-success p-2"><i class="fas fa-plus-circle mr-1"></i>Tambah SSD</button>
        <button type="button" class="btn btn-primary">Tampilkan list</button>
        
    </div>
    
    <div class="col-12 mt-3">

        

        <div class="sdid">
            <table class="table text-left table-striped">
                <thead>
                  <tr>
                    <th scope="col" style="width: 10%">Nomor</th>
                    <th scope="col" style="width: 10%">Kategori</th>
                    <th scope="col" style="width: 10%">Pertanyaan</th>
                    <th scope="col" style="width: 10%">Jawaban</th>
                    <th scope="col" style="width: 10%">Tanggal</th>
                    <th scope="col" style="width: 10%" >Aksi</th>
                    <th scope="col" style="width: 10%">Editor</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $datas )
                    <tr>
                      <th scope="row" class="align-middle">{{$datas->id_ssd}}</th>
                      <td class="align-middle"> <p>{{$datas->kategori}}</p> </td>
                      <td class="align-middle"> <p>{{$datas->pertanyaan}}</p> </td>
                      <td class="align-middle"> <p>{{$datas->jawaban}}</p> </td>
                      <td class="align-middle">{{$datas->tanggal}}</td>
                      <td class="align-middle">
                          <div class="d-flex">
                            <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">
                              <i class="fas fa-search-plus"></i>
                            </button>
                              <button type="button" class="btn btn-warning mr-2"><i class="fas fa-edit"></i></button>
                              <button type="button" class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>
                          </div>
                      </td>
                      <td class="align-middle">{{$datas->created_by}}</td>
                    </tr>
                        
                    @endforeach
             
                  
                </tbody>
              </table>

              <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example ">
                    <ul class="pagination align-items-center">
                      <li class="page-item nav mr-2">
                        <a class="page-link border-0 bg-light" href="#" aria-label="Previous">
                          <span aria-hidden="true" class="font-weight-bold ">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item active "><a class=" page-link bg-light font-weight-bold border-0 " href="#">1</a></li>
                      <li class="page-item"><a class="page-link bg-light font-weight-bold border-0" href="#">2</a></li>
                      <li class="page-item"><a class="page-link bg-light font-weight-bold border-0" href="#">3</a></li>
                      <li class="page-item nav ml-2">
                        <a class="page-link border-0 bg-light" href="#" aria-label="Next">
                          <span aria-hidden="true" class="font-weight-bold ">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
              </div>
              
        </div>

            

       

        

       
    </div>

     

    

    
    
</div>




@endsection