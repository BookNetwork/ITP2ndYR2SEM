@extends('fazlan.staff')
@section('section')

<link rel="stylesheet" href="/css/staff_CSS/staff_search.css">

<div class="col-md-3 view_det">
  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
    <label for=""><h2 class="h2">Search staff</h2></label>
  </div>
</div>

<div class="form-group col-md-8">
    <div style="margin:20px 0px 50px -20px" >
      <input  type="text" id="myInput" onkeyup="myFunction()"  class="form-control" placeholder="Search By Name...">
   </div>
</div>
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

        <!-- <div class=" container col-md-12">
            <div class="form-group ">
                <table style="margin:10px 0px 0px 10px" >
                    <tr>
                        <td>
                            <label><h4>Filter By :</label></h4>
                        </td>
                        <td style="padding-left:10px">
                            <select class="form-control " id="">
                                <option>Type</option>
                                <option>academic</option>
                                <option>nonAcademic</option>
                            </select>
                        </td>
                        <td style="padding-left:10px">
                            <select class="form-control " style="width:150%" id="">
                                <option>Position</option>
                                <option>internship</option>
                                <option>junior</option>
                                <option>Senior</option>
                                <option>Manager</option>
                                <option>Assosiate</option>
                            </select>
                        </td>

                    </tr>
                </table>
            </div>
        </div> -->

<div style="padding-top:10px">
    <?php $staffDetails = \DB::table('staff')->get();
            $count = 1;

    ?>


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
          <a href="/staff_Details?{{$details->regNo}}"><button type="button" class="btn btn-success" name="button">View Details</button></a>
        </td>
       </tr>
@endforeach

    </table>
</div>



@endsection
