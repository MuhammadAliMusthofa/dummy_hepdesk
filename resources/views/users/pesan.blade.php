@extends('layouts.dashboard_layout')

@section('content')
@if ($tiket)
<div class="card h-100" id="subcontent" style="min-height: 80vh; max-height: 80vh">
</div>
<script>
  localStorage['id_tiket'] = "{{ $tiket->id_tiket }}";
</script>
@else
<script>
  window.location = '/user/riwayat';
</script>
@endif
@endsection