@extends('fazlan.staff')
@section('section')
@include('fazlan.functions')

<link rel="stylesheet" href="/css/staff_CSS/staff_search.css">
<script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
</script>

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

            <div class="col-md-3 view_det">
              <div class="heading" style=" color: rgb(103, 103, 103); font-family: f23;">
                <label for=""><h2 class="h2">Search Staff</h2></label>
              </div>
            </div>

            <div class="form-group col-md-8">
                <div style="margin:20px 0px 50px -20px" >
                  <input type="text" class="form-control" placeholder="Search By Name..." id="myInput" onkeyup="myFunction()">
               </div>
            </div>

            <?php $staffDetails = \DB::table('staff')->get();
                    $count = 1;

            ?>

                    <!-- <div class=" container col-md-12">
                        <div class="form-group ">

                            <table style="" >
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
                    </div> -->

            <div style="padding-top:10px" style="height:500;width:auto;overflow:scroll;">

                <table class="table table-striped" id="myTable">
                  <tr>
                    <th>No</th>
                    <th>Reg No</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Position</th>
                    <th>Veiw Details</th>
                  </tr>
        @foreach($staffDetails as $details)
                   <tr>
                    <td>{{$count++}}</td>
                    <td>{{$details->regNo}}</td>
                    <td>{{$details->name}}</td>
                    <td>{{$details->staffType}}</td>
                    <td>{{$details->pos}}</td>
                    <td>
                      <a href="/staff_staffDetails?{{$details->regNo}}"><button type="button" class="btn btn-success" name="button">View Details</button></a>
                    </td>
                   </tr>
        @endforeach

                </table>

            </div>


</div>
@endsection
