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



            <div class="details col-md-12">
                <legend style="width:100%;background-color:#addead;border:1px solid #32AD32">Staff Leave Details</legend>


                <div style="height:360px;width:auto;overflow:scroll;">
                  <div style="padding-top:10px">

                          <table class="table table-striped col-md-12">
                              <tr>
                                <th>No</th>
                                <th>Reg No</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Position</th>
                              </tr>
                          </table>

                  </div>
               </div>

                <div class="clearfix"></div>

        </div>
</div>
@endsection
