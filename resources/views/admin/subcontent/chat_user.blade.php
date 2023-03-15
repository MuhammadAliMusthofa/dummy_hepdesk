@extends('admin.admin_chat')

@section('subcontent')
<div class="card h-100" style="max-height: 100vh">
  <div class="card-header  text-white d-flex justify-content-between" style="background-color: #D6E2E9">
    <a href="/pesan/{{ $id_tiket }}">
      <div class="d-flex flex-row align-items-center">
        <div class="p-2">
          <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </div>
        <div class="p-2 text-center">
          <h5 class="m-0">Dosen 1</h5>
        </div>
      </div>
    </a>
    <div>
      <div class="d-flex flex-row align-items-center">
        <div class="p-2">
          <a href="#search" class="h5"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
        <div class="p-2">
          <a href="/pesan/detail/{{ $id_tiket }}" class="h4">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body h-100" style="max-height: 80vh; overflow: auto;>
    <ul class=" list-unstyled">
    <li class="media mr-3" style="width:35%">

      <div class="media-body" style="background-color:#D6E2E9; border-radius:10px;">
        <p class="mt-0 mb-1 p-2">Halo kak ada yang bisa dibantu?</p>
      </div>
      <div class="ml-2 d-flex mt-auto">
        <p>9.00</p>
      </div>
    </li>
    <li class="media my-4 ">

      <div class="media-body d-flex flex-row-reverse">
        <p class="mt-0 mb-1 p-2" style="background-color: #606060; color:white; width: 45%; border-radius:10px;">
          Halo saya mau nanya
          cara edit profile gimana ya min? </p>

      </div>
    </li>
    <li class="media my-4 ">

      <div class="media-body d-flex flex-row-reverse">
        <p class="mt-0 mb-1 p-2" style="background-color: #606060; color:white; width: 45%; border-radius:10px;">
          Terima Kasih </p>
      </div>
    </li>

    </ul>
  </div>
  <div class="card-footer mt-5 " style="background-color: #BACFDA">
    <form class="">
      <div class="form-group d-flex justify-content-between align-items-center">
        <div class="btn" style="font-size:20px"><i class="fa fa-paperclip "></i></div>
        <input type="text" class="form-control mr-2 ml-2" placeholder="Type your message">
        <div class="btn" style="font-size:20px"><i class="fa fa-paper-plane"></i></div>
      </div>
    </form>
  </div>
</div>
@endsection