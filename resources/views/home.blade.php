@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('raw.sidebar')

        <div class="col-md-10 content">
          @yield('student')
        </div>
    </div>
</div>
@endsection
