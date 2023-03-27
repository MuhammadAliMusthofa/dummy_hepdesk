@extends('layouts.dashboard_layout')

@section('content')

    {{-- @include('partials.jquery_datatables_new') --}}
   
  
  

  
    {{-- @push('script')
      
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

            <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            
             
             <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
            
             <script>
            
               $(document).ready(function() {
                $('#example').DataTable();
              } );
             </script>
    @endpush --}}



    <div class="card mt-5 mr-3 ml-3 shadow  rounded">
      <div class="card-header">
          <h5 class="card-title">Riwayat Keluhan</h5>
          <form action="{{ route('search') }}" method="GET">
  
              <div  class="input-group mb-3 col-md-4 p-0">
                  <input id="keluhan" type="text" name="query" class="form-control bg-light" placeholder="Cari keluhan ...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append ">
               
                     <button  type="submit" style="background:#eaecf4; border:0.2px solid #d1d3e2" class="btn "><i class="fas fa-search"></i></button>
                    
                  </div>
              </div>
          </form>
          <table id="tabelrekap" class="table table-striped text-center">
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

                  @foreach ($tikets as $userData )
                  <tr>
                    <th scope="row">{{$userData->id_tiket}}</th>
                    <td>{{$userData->tanggal}}</td>
                    <td>{{ $userData->nama }}</td>
                    <td>{{ $userData->email }}</td>
                    <td>{{ $userData->departemen }}</td>
                    <td ><i class="fas fa-file  btn btn-secondary"><a href=""></a></i></td>

                    @if ($userData->status == 'Selesai')
                    <td > <button id="button-his" class="btn btn-success"> Selesai</button></td>

                      
                    @elseif ($userData->status == 'Tertunda')
                    
                    <td > <button id="button-his" class="btn btn-warning"> Tertunda</button></td>

                    @elseif ($userData->status == 'Berjalan')
                    <td > <button id="button-his" class="btn btn-primary" style="color:white !important"> Berjalan</button></td>

                    @endif
                  </tr>
                    
                  @endforeach
              
              
              </tbody>
          </table>
      </div>
    </div>
     
   
   



    {{-- {!!$tikets->withQueryString()->links('pagination::bootstrap-4')!!} --}}
   
      {{-- {!!$tikets->appends(Request::all())->links()!!} --}}
       {{-- {!!$tikets->appends(Request::except('page'))->links() !!} --}}

      

   
      <div class="row mt-5">
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
               {!! $tikets->appends(request()->query())->links('pagination::bootstrap-4') !!}
                  
                </ul>
            </nav>
        </div>
      </div>
    

  
 @endsection
{{-- @push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush --}}
