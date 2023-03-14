@extends('admin.dashboard')

@section('subcontent')
<div class="p-4" style="background-color: #D6E2E9">
</div>
<div class="d-flex justify-content-between align-items-center" style="background-color: #BACFDA">
  <div class="p-2">
    <div class="text-center bg-light rounded-circle d-flex align-items-center justify-content-center"
      style="width: 50px; height: 50px">
      <i class="fa fa-user"></i>
    </div>
  </div>
  <div class="p-2">
    <h5 class="font-weight-bold m-0">Dosen 1</h5>
    <p class="m-0">Dosen Universitas X</p>
  </div>
  <div class="ml-auto p-2">
    <div class="d-flex align-items-top">
      <p class="text-sm-left ml-auto m-0">09.00</p>
    </div>
  </div>
</div>
<div class="d-flex align-items-center flex-column h-50">
  <div class="mt-auto p-2">
    <button class="btn text-light font-weight-bold" style="background-color: #76A0B4">Terima</button>
  </div>
</div>
@endsection