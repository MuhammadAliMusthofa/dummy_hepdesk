@extends('layouts.dashboard_layout')

@section('content')

<div class="row justify-content-center text-center">
    

    <div class="d-flex col-12 justify-content-between">
        <button type="button" class="btn btn-success p-2"><i class="fas fa-plus-circle mr-1"></i>Tambah SSD</button>
        <button type="button" class="btn btn-primary">Tampilkan list</button>
        
    </div>
    
    <div class="col-12 mt-3">

      <div class="card">
        <div class="d-flex justify-content-between align-items-center border-bottom px-3 py-2">
          <h6 class=" font-weight-bold text-dark">Form Tambah SSD</h6>
          <button type="button" class="btn btn-light font-weight-bold"><- Kembali</button>
        </div>
        
        <div class="card-body text-left">
          <form action="{{url('/ssd/admin/update',$data->id_ssd)}}" method="POST">
            {{-- {{ csrf_token() }} --}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table class="table table-striped text-left">
                <thead>
                  <tr class="d-flex">
                    <th class="col-2 text-dark">{{$data->kategori}}</th>
                    <th class="col-10"><div class="form-group">
                      <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="d-flex">
                    <td class="col-2 font-weight-bold text-dark">Pertanyaan</td>
                    <td class="col-10"><div class="form-group mb-0">
                      <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" >
                      {{-- <textarea name="pertanyaan" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Masukkan pertanyaan">{{$data->pertanyaan}}</textarea> --}}
                    </div></td>
                  </tr>
                  <tr class="d-flex">
                    <td class="col-2 font-weight-bold text-dark">Jawaban</td>
                    <td class="col-10"><div class="form-group mb-0">
                      {{-- <textarea name="jawaban" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Jawaban">{{$data->jawaban}}</textarea> --}}
                      <input type="text" class="form-control" name="jawaban" id="jawaban">
                    
                    </div></td>
                  </tr>
                </tbody>
              </table>
              
    
              <input type="Submit" class="btn btn-primary" value="Simpan">
          </form>
        </div>
      </div>

        

            

       

        

       
    </div>

     

    

    
    
</div>




@endsection