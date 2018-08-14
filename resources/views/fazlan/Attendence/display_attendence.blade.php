<!DOCTYPE html>
<html>
<head>
    <title>Salary Report</title>
    <link rel="stylesheet" href="css/staff_CSS/prinSal.css">
    <link rel="stylesheet" href="css/staff_CSS/staff_salGen.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts-1.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<center>
<!-- <meta http-equiv="refresh" content="5" > -->
<link rel="stylesheet" href="css\staff_CSS\attendence.css">

<!-- <div class="col-md-12 view_det">
  <div class="heading" style="padding: 0px; color: rgb(103, 103, 103); font-family: f23;">
    <label for=""><h2 class="h2">Staff Attendence Recorder</h2></label>
  </div>
<hr> -->


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>
<script type="text/javascript">
    function att(item, checked){

            $.ajax({
                url:"staff_Attendence",
                method: 'POST',
                dataType: 'JSON',
                data:{
                    name: item,
                    status: checked,
                }
            })
            .done(function(data){
                console.log('success');
                alert(data.response);

            })
            .fail(function(){
                console.log('fail');
                alert('failed');
            });

    }
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#reg').click(function(){
        var x = document.getElementById('regNo').value;
        var y = document.getElementById('reg').checked;
        att(x,y);
    });

    setInterval( function() {
    // Create a newDate() object and extract the seconds of the current time on the visitor's
        var seconds = new Date().getSeconds();
        // Add a leading zero to seconds value
        $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
        },1000);


    setInterval( function() {
    // Create a newDate() object and extract the minutes of the current time on the visitor's
        var minutes = new Date().getMinutes();
    // Add a leading zero to the minutes value
        $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
        },1000);

    setInterval( function() {
    // Create a newDate() object and extract the hours of the current time on the visitor's
        var hours = new Date().getHours();
        hours = hours % 12;
        hours = hours ? hours : 12;
    // Add a leading zero to the hours value
        $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
        }, 1000);
});
</script>

<div style="height:220px;width:auto;background-attachment:fixed;" id="time">
  <div class="row">

      <div style="font-style:bold;font-size:3em;text-align:center;font-family:Microsoft JhengHei Light;">
        <?php echo(date("Y D M j"));?>
      </div>

          <div class="clock">
              <div id="Date"></div>
              <ul>
                  <li id="hours"></li>
                  <li id="point">:</li>
                  <li id="min"></li>
                  <li id="point">:</li>
                  <li id="sec"></li>
              </ul>
          </div>

  </div>
</div>
<?php
        $staffDetails = \DB::table('staff')->select('regNo', 'name', 'pos')->get();
        $count = 1;
?>

    <div style="height:450px;width:auto;overflow:scroll;">
      <div style="padding-top:10px">
          <table class="table table-striped">
            <tr>
            <th></th>
              <th>No</th>
              <th>Reg No</th>
              <th>Name</th>
              <th>status</th>
            </tr>
    @foreach($staffDetails as $details)
             <tr>
                 <th></th>
                  <td>{{$count++}}</td>
                  <td>{{$details->regNo}}</td>
                  <td>{{$details->name}}</td>
                  <td style="width:250px">
                    <label class="switch">
                            <input type="checkbox" class="get_time" id="reg"   name="ch">
                        <span class="slider"></span>
                    </label>
                  </td>
                  <input type="hidden" name="ch" value="{{$details->regNo}}" id="regNo">
            </tr>

    @endforeach
          </table>

    </div>
  </div>
</div>

<!-- <script type="text/javascript">
function enableButton2() {
    document.getElementById("button2").disabled = false;
    document.getElementById("button1").disabled = true;
}
function enableButton1(){
    document.getElementById("button1").disabled = false;
    document.getElementById("button2").disabled = true;
}
</script>

  <button type="button" class="btn btn-success col-md-3" id="button1" name="Present" style="width:90px" onclick="enableButton2()" enabled>Present</button>
  <button type="button" class="btn btn-warning col-md-3" id="button2" name="Out" style="margin:0px 0px 0px 10px;width:90px" onclick="enableButton1()" disabled>Out</button> -->
  <!-- <script type="text/javascript">
      function getTime(){
          var hours = new Date().getHours();
          var minutes = new Date().getMinutes();
          hours = hours % 12;
          hours = hours ? hours : 12;
          hours = (hours < 10 ? "0" : "" ) + hours;
          minutes = ( minutes < 10 ? "0" : "" ) + minutes;
          var h = hours+":"+minutes;
          document.getElementById('de').innerHTML.value =h;
          alert(hours+":"+minutes);
      }
  </script> -->
