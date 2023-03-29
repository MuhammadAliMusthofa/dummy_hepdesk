@extends('layouts.dashboard_layout')

@section('content')

<div class="row justify-content-center text-center">
    
    
    <div class="col-12 mt-3">

      @if ($data)
      <div class="card">
        <div class="d-flex justify-content-between align-items-center border-bottom px-3 py-2">
          <h6 class=" font-weight-bold text-dark">Form Tambah SSD</h6>
          <button type="button" class="btn btn-light font-weight-bold"><- Kembali</button>
        </div>
        
        <div class="card-body text-left">
          <form action="/ssd/update/{{$data->id_ssd}}" method="POST">
            {{ csrf_field() }}
              <table class="table table-striped text-left">
                <thead>
                  <tr class="d-flex">
                    <th class="col-2 text-dark">Kategori</th>
                    <th class="col-10"><div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1" name="kategori">
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
                    <td class="col-2 font-weight-bold text-dark">Pertanyaan</td>
                    <td class="col-10"><div class="form-group mb-0">
<<<<<<< HEAD
                      <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" >
                      {{-- <textarea name="pertanyaan" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Masukkan pertanyaan">{{$data->pertanyaan}}</textarea> --}}
=======
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Masukkan pertanyaan" name="pertanyaan">{{$data->pertanyaan}}</textarea>
>>>>>>> 9e054c754aafee43413eef4d24d82a391988fc1c
                    </div></td>
                  </tr>
                  <tr class="d-flex">
                    <td class="col-2 font-weight-bold text-dark">Jawaban</td>
                    <td class="col-10"><div class="form-group mb-0">
<<<<<<< HEAD
                      {{-- <textarea name="jawaban" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Jawaban">{{$data->jawaban}}</textarea> --}}
                      <input type="text" class="form-control" name="jawaban" id="jawaban">
                    
=======
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Jawaban" name="jawaban">{{$data->jawaban}}</textarea>
>>>>>>> 9e054c754aafee43413eef4d24d82a391988fc1c
                    </div></td>
                  </tr>
                </tbody>
              </table>
              
    
              <input type="Submit" class="btn btn-primary" value="Simpan">
          </form>
        </div>
      </div>
          

      @else

      <div class="card">
        <div class="d-flex justify-content-between align-items-center border-bottom px-3 py-2">
          <h6 class=" font-weight-bold text-dark">Form Tambah SSD</h6>
          <button type="button" class="btn btn-light font-weight-bold"><- Kembali</button>
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