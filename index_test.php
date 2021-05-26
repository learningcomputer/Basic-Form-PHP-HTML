<!DOCTYPE HTML>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">

<html>

<head>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel="stylesheet" href="landing.css">
  <script src="myScript.js"></script>
  <?php
  include_once 'db.php';
  include_once 'inputValidator.php';
  // define variables and set to empty values
  $nameErr = $passErr = $statusErr = $locErr = "";
  $date = $time = $name = $pass = $status = $location = "";
  ?>
</head>

<body onload="startTime()">
  <div class="container-fluid text-center">
    <div class="container">
      <div class="header">


        <br>
        <div class="logo">

          <img class="responsive-img" id="logoPribadi" src="https://kisikisi-root.nos.jkt-1.neo.id/assets/images/logo/educational_coordinator_1520858768.png" alt="Logo Pribadi Bandung" width="75">


          <h2>E-Attendance</h2>

        </div>
        <h3 id="nowDate"></h3>

        <h3 id="nowTime"></h3>
      </div>

      <form id="survey-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <input type="hidden" name="date" id="currentDate" readonly>


        <input type="hidden" name="time" id="currentTime" readonly>

        <div class="form-group">
          <label id="name-label" for="name">Name:</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" required>
        </div>

        <div class="form-group">
          <label id="pass-label" for="password">Password:</label>
          <div class="row">
            <div class="col-xs-12 col-sm-8">
              <input type="password" name="password" id="myInput" class="form-control" placeholder="Enter your password">
            </div>
            <div class="col-xs-12 col-sm-4">
              <input type="checkbox" onclick="myFunction()">Show Password
            </div>



            <span class="error"><?php echo $passErr; ?></span>
          </div>
        </div>

        <div class="form-group">
          <label id="status-label" for="status">Status:</label>
          <div class="row center">
            <div class="col-xs-6">
              <input type="radio" name="status" class="form-control" value="in">Check In
            </div>
            <div class="col-xs-6">
              <input type="radio" name="status" class="form-control" value="out">Check Out
            </div>
          </div>
        </div>

        <div class="form-group">
          <label id="loc-label" for="location">Location:</label>
          <div class="row  row-no-gutters" id="locInput">
            <div class="col-xs-12 col-sm-9"><input type="text" name="location" class="form-control" id="demo"></div>
            <div class="col-xs-12 col-sm-3"><input class="btn btn-default btn-sm" type="button" id="locBtn" value="Get Location" onclick="getLocation()" /></div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div id="iframeholder">

            </div>

            <div class="col-xs-12"><input class="btn btn-default btn-sm" type="button" value="Get Location2" onclick="getLocation3()" /></div>
          </div>
        </div>



        <div class="form-group">
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="Submit">
        </div>
      </form>
      <script src="afterloadScript.js"></script>

    </div>
  </div>
</body>

</html>