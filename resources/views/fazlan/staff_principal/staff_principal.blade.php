@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="css/staff_CSS/staff_salary.css">

<div class="salary_staff">


        <div class="col-md-12 view_det">
          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
            <label for=""><h2 class="h2">Principal</h2></label>
          </div>

        </div>

        <!--Top bttns -->
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                  <a type="button" href="staff_principal_search" class="btn btn-success" name="button">Search Staff</a>

                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                  <a type="button" href="staff_presentDetails" class="btn btn-success" name="button">Present staff Details</a>

                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                  <a type="button" href="staff_principal_leave" class="btn btn-success" name="button">leave staff Details</a>
                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                  <a type="button" href="staff_principal_loan" class="btn btn-success" name="button">Loan Details</a>
                </div>
            </div>


            <hr>
</div>
@endsection
