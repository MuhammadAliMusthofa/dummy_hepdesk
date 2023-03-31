@extends('layouts.dashboard_layout')

@section('content')

<div class="row align-items-center">
    <div class="col-3 my-5 px-4 d-flex justify-content-end">
        <button type="button" class="btn btn-secondary p-3"><- Kembali</button>
    </div>

    <form action="/ssd/search/{{$kategori}}" method="post">
    <div class="input-group my-5 col-6 px-0">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <input type="text" class="form-control p-4" name="keluhan" placeholder="Cari Keluhan" aria-label="Username" aria-describedby="basic-addon1">
            <div class="input-group-append border-right-0">
                <span class="input-group-text bg-white border-left-0" id="basic-addon1"><i class="fas fa-search">
                </i>
                
                </span>
            </div>
        </div>
    </div>
    </form>


<div class="row sdid-kategori">
    <div class="col-3 px-4">

        <div class="ssd-kategori p-3">
            <p class="font-weight-bold mb-2">Cari berdasarkan Kategori</p>
            <a href="{{ url('/ssd/search_kategori?kategori=lldikti') }}">
                <h5 class=
                    @if ($kategori == "lldikti")
                        "font-weight-bold mb-3  bg-primary text-light rounded px-2 pt-1 pb-1"     
                    @else
                        "font-weight-bold mb-3"     
                    @endif>LLDIKTI
                </h5>
            </a>
           
            <a href="{{ url('/ssd/search_kategori?kategori=dosen') }}">
               <h5 class=
                   @if ($kategori == "dosen")
                        "font-weight-bold mb-3  bg-primary text-light rounded px-2 pt-1 pb-1"     
                    @else
                        "font-weight-bold mb-3 "     
                    @endif>Dosen
                </h5>
            </a>
            
            <a href="{{ url('/ssd/search_kategori?kategori=asesor') }}">
                <h5 class=
                    @if ($kategori == "asesor")
                        "font-weight-bold mb-3  bg-primary text-light rounded px-2 pt-1 pb-1"     
                    @else
                        "font-weight-bold mb-3"     
                    @endif>
                    Asesor
                </h5>
            </a>
            
            <a href="{{ url('/ssd/search_kategori?kategori=pengelola-bkd') }}">
                <h5 class=
                @if ($kategori == "pengelola-bkd")
                        "font-weight-bold mb-3  bg-primary text-light rounded px-2 pt-1 pb-1"     
                    @else
                        "font-weight-bold mb-3"     
                    @endif>
                    Pengelola
                </h5>
            </a>
            
            <a href="{{ url('/ssd/search_kategori?kategori=all') }}">
                <h5 class=
                    @if ($kategori == "all")
                        "font-weight-bold mb-3  bg-primary text-light rounded px-2 pt-1 pb-1"     
                    @else
                        "font-weight-bold mb-3"     
                    @endif>
                    Semua
                </h5>
            </a>
        </div>
    </div>
    <div class="col-9">
        
        <div class="sdid-search">
            @foreach ($data as $ssd)
            <div class="border-bottom border-dark pb-3 mb-3">
                <h4 class="font-weight-bold mb-3">{{$ssd->pertanyaan}}</h4>
                <p class="h5 mb-2">{{$ssd->jawaban}}</p>
                <p>10/03/2023</p>
            </div>
            @endforeach
            
            
        </div>
       
    </div>

    

    
    
</div>



<div class="text-center mt-5">
    <p class="font-weight-bold">Punya pertanyaan spesifik ?</p>
    <button type="button" class="btn btn-success px-5 py-2 my-3">Chat dengan Helpdesk</button>
</div>


@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){
  console.log("hi")
})
</script>
    
@endsection