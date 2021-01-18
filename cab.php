<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <div class="container-fluid div1">
    <h1 style="color: white;">Book a City Taxi to your destination in Town</h1>
    <h2 style="color: white;">Choose from a range of categories and prices.</h2>
    <div class="row">
      <div class="col-md-4 col-sm-12 first">
        <h4 style="color:white;border-bottom: 1px solid grey;background-color:black;margin-left:30%;margin-right:30%;margin-top:1.5%;border-radius:50px ">CITY TAXI</h4>
        <h6 style="font-family: 'Quicksand', sans-serif;">Your everyday travel partner</h6>
        <h6 style="font-family: 'Quicksand', sans-serif;border-bottom: 1px solid grey;">AC Cabs for point to point travel</h6>
        <form id="for" name="myForm">
          <div class="form-group">

            PICKUP<select class="form-control" name="pickup" id="p1" required="Please Enter Location" required>
              <option value="Please Select a Location">Please Select a Location</option>
              <option value="Charbagh">Charbagh</option>
              <option value="Indira Nagar">Indira Nagar </option>
              <option value="BBD">BBD</option>
              <option value="Barabanki">Barabanki</option>
              <option value="Faizabad">Faizabad</option>
              <option value="Gorakhpur">Gorakhpur</option>
              <option value="Basti">Basti</option>
            </select>
          </div>
          <div class="form-group">
            DROP<select class="form-control" name="drop" id="p2" required>
              <option>Please Select a Location</option>
              <option value="Charbagh">Charbagh</option>
              <option value="Indira Nagar">Indira Nagar </option>
              <option value="BBD">BBD</option>
              <option value="Barabanki">Barabanki</option>
              <option value="Faizabad">Faizabad</option>
              <option value="Gorakhpur">Gorakhpur</option>
              <option value="Basti">Basti</option>
            </select>
          </div>
          <div class="form-group">
            Cab Type<select class="form-control" name="cabtype" id="ca" onchange="fun()" required="Please Enter Location">
              <option value="Please Select a CAB Type">Please Select a CAB Type</option>
              <option>CedMicro</option>
              <option>CedMini</option>
              <option>CedRoyal</option>
              <option>CedSUV</option>
            </select>
          </div>
          <div class="form-group">
            Luggage<input type="number" oninput="this.value = Math.abs(this.value)" max="999" step=".001" class="form-control" id="p3" placeholder="Enter Weight in KG" name="luggage">
          </div>
          <button type="submit" data-toggle="modal" data-target="#myModal" class="btn btn-dark" id="butn1">Calculate Fair</button>
        </form>
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4">
      </div>
    </div>
  </div>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Happy Journey!!!</h4><i class="fa fa-taxi fa-2x" style="float: right;"></i>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body" id="modal-body">
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="verification.php"><button type="button" id="book" class="btn btn-outline-warning" onclick="book();">Book Now</button></a>
          <button type="button" class="btn btn-outline-info" data-dismiss="modal">Cancel</button>

        </div>
      </div>
    </div>
  </div>
  <script>
    
    function book() {
      // alert("Thanks for Choosing CedCab!!\n Your Booking Is Done!");
      $(document).ready(function(){



      })

    }

    function fun() {
      $('#book').show();
      var la = document.getElementById("ca").value;
      if (la == "CedMicro") {
        $('#p3').prop('disabled', true);
        $('#p3').prop('placeholder', "Luggage is not allowed");
        $('#p3').val("");
      } else {
        $('#p3').prop('disabled', false);
        $('#p3').prop('placeholder', "Enter Weight in KG ");
      }
    }
    $(document).ready(function() {
      $('#book').show();
      $('select').on('change', function(event) {
        //restore previously selected value
        var prevValue = $(this).data('previous');
        $('select').not(this).find('option[value="' + prevValue + '"]').show();
        //hide option selected                
        var value = $(this).val();
        //update previously selected data
        $(this).data('previous', value);
        $('select').not(this).find('option[value="' + value + '"]').hide();
      });
      $("#for").submit(function(e) {
        e.preventDefault();
        var a = $("#p1").val();
        var b = $("#p2").val();
        var c = $("#ca").val();
        var d = $("#p3").val();
        console.log(d);
        if (a == "Please Select a Location") {
          document.getElementById("modal-body").innerHTML = "Please Select Any Location";
          $('#book').hide();
        } else
        if (b == "Please Select a Location") {
          document.getElementById("modal-body").innerHTML = "Please Select Any Location";
          $('#book').hide();
        } else
        if (c == "Please Select a CAB Type") {
          document.getElementById("modal-body").innerHTML = "Please Select Any Cab Type";
          $('#book').hide();
        } else
        if (d > 999) {
          document.getElementById("modal-body").innerHTML = "Please Enter correct luggage";
        } else
        if (d == "") {
          d = 0;
          $.ajax({
            type: 'POST',
            url: 'cab2.php',
            data: {
              'pickup': a,
              'drop': b,
              'cabtype': c,
              'luggage': d
            },
            success: function(data) {
              console.log(data);
              document.getElementById("modal-body").innerHTML = data;
            }
          });
        } else
        if (d == "" && c == "CedMicro") {
          $.ajax({
            type: 'POST',
            url: 'cab2.php',
            data: {
              'pickup': a,
              'drop': b,
              'cabtype': c,
              'luggage': d
            },
            success: function(data) {
              console.log(data);
              document.getElementById("modal-body").innerHTML = data;
            }
          });
        } else
        if (d == "-") {
          alert("Value should not be negative");
        } else {
          // console.log(a, b,c,d);
          $.ajax({
            type: 'POST',
            url: 'cab2.php',
            data: {
              'pickup': a,
              'drop': b,
              'cabtype': c,
              'luggage': d
            },
            success: function(data) {
              console.log(data);
              document.getElementById("modal-body").innerHTML = data;
            }
          });
        }
      });
    });
  </script>
  
</body>
</html>
<?php include 'footer.php'; ?>