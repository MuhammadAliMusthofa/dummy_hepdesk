@extends('layouts.dashboard_layout')

@push('head')
<!-- Scripts -->
<script src="{{ asset('js/index.js')}}"></script>
@endpush

@section('content')

{{-- @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Success !</strong> {{ session('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Error !</strong> {{ session('error') }}
    </div>
@endif --}}

<div class="row justify-content-center text-center">
    <h4 class=" font-weight-bold mt-2 col-12">Halo Admin 1 ! Semangat Selalu ihiww!</h4>
    <div class="col-7">
      <form action="">
      <div class="dropdown input-group my-4">
        
          
        

        <input class="form-control p-4 dropdown-toggle" data-display="static" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
          <div class="input-group-append border-right-0">
              <span class="input-group-text bg-white border-left-0" id="basic-addon1"><i class="fas fa-search"></i></span>
          </div>

          <div class="dropdown-menu p-4 w-100">
            <div class="form-group">
              <label for="exampleDropdownFormEmail2" class="h5 font-weight-bold mb-3">Kategori</label>
              <div class="d-flex justify-content-between">
                <div class="btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-light border">
                    <input type="checkbox"> LLDIKTI
                  </label>
                </div>
                <div class="btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-light border">
                    <input type="checkbox"> Dosen
                  </label>
                </div>
                <div class="btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-light border">
                    <input type="checkbox"> Asesor
                  </label>
                </div>
                <div class="btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-light border">
                    <input type="checkbox"> Perguruan Tinggi
                  </label>
                </div>
                <div class="btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-light border">
                    <input type="checkbox"> Semua Kategori
                  </label>
                </div>

              </div>
            </div>
            <div class="form-group">
              <label for="exampleDropdownFormEmail2" class="h5 font-weight-bold mb-3">Kategori</label>
              <div class="d-flex ">
                <div class="btn-group-toggle mr-4" data-toggle="buttons">
                  <label class="btn btn-light border">
                    <input type="checkbox"> Aktif
                  </label>
                </div>
                <div class="btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-light border">
                    <input type="checkbox"> Non-aktif
                  </label>
                </div>

              </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Selesai</button>
          </div>
</div>
</form>
        
    </div>

    <div class="d-flex col-12 justify-content-between">
        <a href="/ssd/form"><button type="button" class="btn btn-success p-2"><i class="fas fa-plus-circle mr-1"></i>Tambah SSD</button></a>
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
                              <a href="{{ route('updateForm.ssd', $datas->id_ssd)}} "><button type="button" class="btn btn-warning mr-2"><i class="fas fa-edit"></i></button></a>
                              @if ($datas->status)
                              <a href data-href="{{ route('hide.ssd', $datas->id_ssd)}}" data-toggle="modal" data-target="#hideModal"><button type="button" class="btn btn-success "><i class="fas fa-eye"></i></button></a>
                              @else
                              <a href data-href="{{ route('visible.ssd', $datas->id_ssd)}}" data-toggle="modal" data-target="#visibleModal"><button type="button" class="btn btn-danger "><i class="fas fa-eye-slash"></i></button></a>
                              @endif
                              
                            
             
                          </div>
                          {{-- ="{{ route('user.riwayat') }}"> --}}
                      </td>
                      <td class="align-middle">{{$datas->created_by}}</td>
                    </tr>
                        
                    @endforeach
             
                  
                </tbody>
              </table>

              {{-- <div class="d-flex justify-content-center">
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
              </div> --}}

              

              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <ul class="pagination">
                    {{ $data->render('pagination::bootstrap-4') }}
                  </ul>
                </ul>
              </nav>
              
              
        </div>
       
    </div>

    <div class="modal" id="successAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog-centered" role="document">
        <div class="modal-content col-3 mx-auto">
         
          <div class="modal-body" style="padding: 4rem ">
            
            <i class="fas fa-check-circle" style="font-size: 7rem; color: #1AB394"></i>
            <p class="font-weight-bold h5 my-4">Data telah tersimpan</p>
            <button type="button" class="btn btn-primary" style="background-color: #1AB394" data-dismiss="modal">Selesai</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="successHideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog-centered" role="document">
        <div class="modal-content col-3 mx-auto">
         
          <div class="modal-body" style="padding: 3rem ">
            
            <i class="fas fa-check-circle" style="font-size: 7rem; color: #1AB394"></i>
            <p class="font-weight-bold h5 my-4">Data SSD dinonaktifkan</p>
            <button type="button" class="btn btn-primary" style="background-color: #1AB394" data-dismiss="modal">Selesai</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="successVisibleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog-centered" role="document">
        <div class="modal-content col-3 mx-auto">
         
          <div class="modal-body" style="padding: 3rem ">
            
            <i class="fas fa-check-circle" style="font-size: 7rem; color: #1AB394"></i>
            <p class="font-weight-bold h5 my-4">Data SSD diaktifkan</p>
            <button type="button" class="btn btn-primary" style="background-color: #1AB394" data-dismiss="modal">Selesai</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="hideModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog-centered" role="document">
        <div class="modal-content col-3 mx-auto">
         
          <div class="modal-body" style="padding: 2rem ">
            
            <i class="fas fa-exclamation-triangle" style="font-size: 7rem; color: #ED5565"></i>
            <p class="font-weight-bold h5 mt-4 mb-2">Apakah anda yakin?</p>
            <p class="mb-3">SSD akan disembunyikan dari user</p>
            <div class="d-flex w-100 justify-content-center">
              <a class="btn btn-danger col-4 mr-3 btn-confirm" >Ya</a>
              <button type="button" class="btn btn-warning col-4 ml-3" data-dismiss="modal">Kembali</button>
            </div>
           
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="visibleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog-centered" role="document">
        <div class="modal-content col-3 mx-auto">
         
          <div class="modal-body" style="padding: 2rem ">
            
            <i class="fas fa-exclamation-triangle" style="font-size: 7rem; color: #1AB394"></i>
            <p class="font-weight-bold h5 mt-4 mb-2">Apakah anda yakin?</p>
            <p class="mb-3">SSD akan ditampilkan kepada user</p>
            <div class="d-flex w-100 justify-content-center">
              <a class="btn btn-success col-4 mr-3 btn-confirm" >Ya</a>
              <button type="button" class="btn btn-warning col-4 ml-3" data-dismiss="modal">Kembali</button>
            </div>
           
          </div>
        </div>
      </div>
    </div>
    
</div>




@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
  
  if(alert = "{{Session::has('success')}}"){
    $('#successAddModal').modal('show');
  } else if(alert = "{{Session::has('success_hide')}}") {
    $('#successHideModal').modal('show');
  } else if(alert = "{{Session::has('success_visible')}}") {
    $('#successVisibleModal').modal('show');
  }
})

$('#hideModal').on('show.bs.modal', function(e) {
    $(this).find('.btn-confirm').attr('href', $(e.relatedTarget).data('href'));
});

$('#visibleModal').on('show.bs.modal', function(e) {
    $(this).find('.btn-confirm').attr('href', $(e.relatedTarget).data('href'));
});




</script>
    
@endsection