@extends('layouts.dashboard_layout')

@section('content')
<div class="card h-100" id="subcontent" style="min-height: 80vh; max-height: 100vh">
</div>
<script>
  var id_tiket = "{{ $tiket->id_tiket }}";
  var kadaluarsa = "{{ $tiket->kadaluarsa }}";
  var deadline = new Date(kadaluarsa).getTime();
  let x;

  function updateTimer(){
    var now = new Date().getTime();
    var countdown = $('#countdown');
    
    if(now < deadline){   
      var t = deadline - now; 
      var date = new Date(t);
      var minutes=date.getMinutes(); 
      var seconds=date.getSeconds();

      countdown.html(minutes + ':' + seconds); 
      if(minutes < 5){ 
        countdown.removeClass('bg-success');
        countdown.addClass('bg-warning'); 
      }else if(minutes < 2){
        countdown.removeClass('bg-warning');
        countdown.addClass('bg-danger');
      } 
    }else(
      clearInterval(x)
    )
  }
  
  x = setInterval(updateTimer, 1000);

</script>
@endsection