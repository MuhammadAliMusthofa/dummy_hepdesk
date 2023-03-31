@extends('layouts.dashboard_layout')


@php
    // dd($data->users()->user_name)
@endphp
@section('content')

<div class="row justify-content-center text-center">
    
    
    <div class="col-12 mt-3">

      @if ($data)
      <div class="card">
        <div class="d-flex justify-content-between align-items-center border-bottom px-3 py-2">
          @if ($page == "detail")
          <h6 class=" font-weight-bold text-dark">Detail SSD</h6>
          @elseif($page == "edit")
          <h6 class=" font-weight-bold text-dark">Edit SSD</h6>
          @elseif($page == "tambah")
          <h6 class=" font-weight-bold text-dark">Form Tambah SSD</h6>
          @endif
          
          <a href="{{ URL::previous() }}"><button type="button" class="btn btn-light font-weight-bold"><i class="fas fa-arrow-left"></i> Kembali</button></a>
        </div>
        
        <div class="card-body text-left">
          <form action="/ssd/update/{{$data->id_ssd}}" method="POST">
            {{ csrf_field() }}
              <table class="table table-striped text-left">
                <thead>
                  <tr class="d-flex">
                    <th class="col-2 text-dark">Kategori</th>
                    <th class="col-10"><div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1" name="kategori" @php
                          echo $page == "detail" ? "disabled" : "";
                      @endphp >
                        <option @php
                            echo $data->kategori == "LLDIKTI" ? "selected" : ""
                        @endphp>LLDIKTI</option>
                        <option @php
                        echo $data->kategori == "DOSEN" ? "selected" : ""
                    @endphp>DOSEN</option>
                        <option @php
                        echo $data->kategori == "ASESOR" ? "selected" : ""
                    @endphp>ASESOR</option>
                        <option @php
                        echo $data->kategori == "PERGURUAN TINGGI" ? "selected" : ""
                    @endphp>PERGURUAN TINGGI</option>
                      </select>
                    </div></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="d-flex">
                    <td class="col-2 font-weight-bold text-dark" >Pertanyaan</td>
                    <td class="col-10"><div class="form-group mb-0">


                      {{-- <textarea name="pertanyaan" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Masukkan pertanyaan">{{$data->pertanyaan}}</textarea> --}}

                      <textarea id="messageArea" name="pertanyaan" rows="7" class="form-control ckeditor" placeholder="Masukkan Pertanyaan.." @php
                      echo $page == "detail" ? "readonly" : "";
                  @endphp>{{$data->pertanyaan}}</textarea>

{{-- <script>
  ClassicEditor
          .create( document.querySelector( '#editor' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script> --}}
                    </div></td>
                  </tr>
                  <tr class="d-flex">
                    <td class="col-2 font-weight-bold text-dark">Jawaban</td>
                    <td class="col-10"><div class="form-group mb-0">

                      {{-- <textarea name="jawaban" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Jawaban">{{$data->jawaban}}</textarea> --}}

                    
                      

<textarea id="messageArea" name="jawaban" rows="7" class="form-control ckeditor" placeholder="Masukkan Pertanyaan.." @php
echo $page == "detail" ? "readonly" : "";
@endphp>{{$data->jawaban}}</textarea>

                      

                    </div></td>
                  </tr>
                  <tr class="d-flex">
                    <td class="col-2 font-weight-bold text-dark">Dibuat oleh</td>
                    <td class="col-10"><div class="form-group mb-0">

                      <textarea name="updated_by" class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{$data->users->user_name}}</textarea>

                    

                       
                    </div></td>
                  </tr>
                </tbody>
              </table>
              
              @if ($page == "detail")
              <a href="{{ route('updateForm.ssd', $data->id_ssd)}} "><button type="button" class="btn btn-warning mr-2"><i class="fas fa-edit"></i> Edit</button></a>
              @else
              <input type="Submit" class="btn btn-primary" value="Simpan">
              @endif
    
             
             
          </form>
        </div>
      </div>
          

      @else

      <div class="card">
        <div class="d-flex justify-content-between align-items-center border-bottom px-3 py-2">
          <h6 class=" font-weight-bold text-dark">Form Tambah SSD</h6>
          <a href="{{ URL::previous() }}"><button type="button" class="btn btn-light font-weight-bold"><i class="fas fa-arrow-left"></i> Kembali</button></a>
        </div>
        
        <div class="card-body text-left">
          <form action="/ssd/save" method="POST">
            {{ csrf_field() }}
              <table class="table table-striped text-left">
                <thead>
                  <tr class="d-flex">
                    <th class="col-2 text-dark">Kategori</th>
                    <th class="col-10"><div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                        <option>LLDIKTI</option>
                        <option>DOSEN</option>
                        <option>ASESOR</option>
                        <option>PERGURUAN TINGGI</option>
                      </select>
                    </div></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="d-flex">
                    <td class="col-2 font-weight-bold text-dark">Pertanyaan</td>
                    <td class="col-10"><div class="form-group mb-0">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Masukkan pertanyaan" name="pertanyaan"></textarea>
                    </div></td>
                  </tr>
                  <tr class="d-flex">
                    <td class="col-2 font-weight-bold text-dark">Jawaban</td>
                    <td class="col-10"><div class="form-group mb-0">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Jawaban" name="jawaban"></textarea>
                    </div></td>
                  </tr>
                </tbody>
              </table>
              
    
              <button type="submit" class="btn btn-primary"> Simpan</button>
          </form>
        </div>
      </div>
          
      @endif
      

      
    </div>

    

     

    

    
    
</div>




@endsection

@section('script')<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
  CKEDITOR.replace( 'messageArea',
  {
   customConfig : 'config.js',
   toolbar : 'simple'
   })
</script> 
    
@endsection