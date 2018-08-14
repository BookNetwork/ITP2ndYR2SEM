@extends('fazlan.staff')
@section('section')

<link rel="stylesheet" href="css/staff_CSS/staff_search.css">

<div class="col-md-3 view_det">
  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103);">
    <label for=""><h2 class="h2">SAMPLE</h2></label>
  </div>
</div>


<form action="/mail" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <input type="text" name="email" value="bookfun388@gmail.com">
    <input type="submit" id="submit" name="" value="mail">
</form>

@if ($mess = Session::get('f'))
    <span class="alert alert-danger col-md-12">
        <strong >{{ $mess }}</strong>
    </span>
@endif

<!--
<script type="text/javascript">
    $("#submit").click(function(){
        window.print();
    });
</script> -->
@endsection
