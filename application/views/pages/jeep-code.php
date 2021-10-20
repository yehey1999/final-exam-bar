<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>AWS Midterm Practical</title>
  <link href="<?php echo base_url(); ?>assets/css/jeep-code.css" rel="stylesheet" type="text/css" />
</head>

<body class="container-fluid">
  <form id="form" name="jeepCodeForm" action="<?php echo base_url(); ?>parse-codes"  method="POST">
    <div class="row d-flex justify-content-center">
      <div class="col-4">
        <div class="form-group d-flex flex-column">
          <label for="jeepCodeInput" class="align-self-center">
            <h1 class="display-4 my-5">Jeep Code</h1>
          </label>
          <input id="codes" type="text" class="form-control mb-1" id="jeepCodeInput" aria-describedby="jeepCodeHelp" placeholder="Enter Jeep Code/s" value="" name="jeepCode" required>
          <input type="submit" value="Submit" class="btn btn-primary mt-2">
        </div>
      </div>
      <div id="error"></div>
    </div>
  </form>

  <div>
    <h1 class="display-4 my-5">Result</h1>
    <div>
        <?php
            if (!is_null($answer))
                echo $answer;
        ?>
    </div>
  </div>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/js/validators.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>