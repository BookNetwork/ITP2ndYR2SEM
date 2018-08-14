<?php namespace App\Custom;?>
@extends('home')
@section('student')

<div class="panel panel-default">
    <div class="panel-heading">
      <nav class="nav option">
        <div class="col-md-12">
          @include('fazlan.top_btn')
        </div>

<!--
       <div class="col-md-12">
          <div class="col-md-6 pull-right ">
            <input type="text" class="form-control" name="" value="" placeholder="Search for Books / Members..">
          </div>
        </div>
-->
      </nav>
    </div>

    <div class="panel-body">
      <div class="col-md-12">
        <div class="panel-body" style="padding: 0px; ">

          @yield('section')

        </div>
      </div>
    </div>
</div>
@endsection
