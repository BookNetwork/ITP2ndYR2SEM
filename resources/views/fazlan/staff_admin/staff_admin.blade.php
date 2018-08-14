@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="css/staff_CSS/staff_salary.css">

<div class="salary_staff">


        <div class="col-md-12 view_det">
          <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
            <label for=""><h2 class="h2">Admin</h2></label>
          </div>

        </div>

        <!--Top bttns -->
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                    <a type="button" href="staff_admin_salary" class="btn btn-success" name="button">Salary add/remove</a>
                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                    <a type="button" href="staff_principal_reg" class="btn btn-success" name="button">Principal Registration</a>
                </div>
            </div>
            <div class="btn-group">
                <div class="col-md-12 nav_btn" style="padding: 0px">
                    <a type="button" href="staff_admin_reSetPassword" class="btn btn-success" name="button">Staff Password</a>
                </div>
            </div>
            <hr>
</div>




@endsection
