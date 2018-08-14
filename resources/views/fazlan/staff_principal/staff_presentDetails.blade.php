@extends('fazlan.staff')
@section('section')
<link rel="stylesheet" type="text/css" href="./staffDetails.css">

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

<div class="col-md-5 view_det">
  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
    <label for=""><h2 class="h2">Staff Attendence Details</h2></label>
  </div>
</div>

<div class="form-group col-md-6">
    <div style="margin:20px 0px 0px -20px" >
      <input type="text" class="form-control" placeholder="Search By Name..." name="" value="">
   </div>
</div>


        <div class=" container col-md-12">
            <div class="form-group ">
                <table style="margin:10px 0px 0px 10px" >
                    <tr>
                        <td>
                            <label><h4>Filter By :</label></h4>
                        </td>
                        <td style="padding-left:10px">
                            <select class="form-control " id="">
                                <option>Type</option>
                                <option>Academic</option>
                                <option>Non-Academic</option>
                            </select>
                        </td>
                        <td style="padding-left:10px">
                            <select class="form-control " style="width:150%" id="">
                                <option>Position</option>
                                <option>intern</option>
                                <option>junior</option>
                                <option>senior</option>
                            </select>
                        </td>

                    </tr>
                </table>
            </div>
        </div>

</div>

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

               <tr>
                <td>01</td>
                <td>038</td>
                <td>staffNAME</td>
                <td>Acadmc/Non-acadmc</td>
                <td>se/Ju/intrn</td>
               </tr>
               <tr>
                <td>01</td>
                <td>038</td>
                <td>staffNAME</td>
                <td>Acadmc/Non-acadmc</td>
                <td>se/Ju/intrn</td>
               </tr>
               <tr>
                <td>01</td>
                <td>038</td>
                <td>staffNAME</td>
                <td>Acadmc/Non-acadmc</td>
                <td>se/Ju/intrn</td>
               </tr>
          </table>

  </div>
</div>


@endsection
