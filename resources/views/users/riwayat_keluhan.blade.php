@extends('layouts.dashboard_layout')

@section('content')

    @include('partials.jquery_datatables_new')
   





<div class="card mt-5 mr-3 ml-3">
    <div class="card-header">
        <h5 class="card-title">Riwayat Keluhan</h5>
        <form action="{{ route('search') }}" method="GET">

            <div  class="input-group mb-3 col-md-4 p-0">
                <input id="keluhan" type="text" name="query" class="form-control bg-light" placeholder="Cari keluhan ...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append ">
                  <span class="input-group-text" id="basic-addon2"><a href="{{ route('search') }}"><i class="fas fa-search"></i></a></span>
                </div>
              </div>
        </form>
        
    </div> 
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
            <td>Dosen</td>
            <td ><i class="fas fa-file  btn btn-secondary"><a href=""></a></i></td>

            <td > <button id="button-his" class="btn btn-success"> Selesai</button></td>
          </tr>
            
          @endforeach
        
        
        </tbody>
    </table>

    
      {{-- <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $tikets->links() }}
                </ul>
            </nav>
        </div>
      </div> --}}
    
{{-- </div> --}} 



{{-- <script>
  $(document).ready(function() {
    $('#myTable').DataTable(
      "searching": true,
        "paging": true
    );
});
</script> --}}

     

      

    
 @endsection
{{-- @push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush --}}
