<?php
    $id = $_GET['id'];

    if(isset($_POST['sbm_edit'])){
        $title = $_POST["title"];
        $fname = $_POST["fname"];
        $mname = $_POST["mname"];
        $lname = $_POST["lname"];
        $contactNum = $_POST["contactNum"];
        $district = $_POST["district"];

        require("../config.php");

        $sql = "UPDATE customer SET id='$id', title= '$title', first_name='$fname', middle_name='$mname', last_name='$lname',contact_no='$contactNum',district='$district' WHERE id=$id";
        $con->query($sql);

        if($con->query($sql)){
            header('Location: viewCustomer.php');
        }else{
            echo "error".$con->error;
        }

    }
?>

<?php
     //edit
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM customer WHERE id = $id";
    require("../config.php");

    $result1 = $con->query($sql1);

    while($row = $result1->fetch_array()){

        $id = $row['id'];
        $title =$row['title'];
        $fname = $row['first_name'];
        $mname = $row['middle_name'];
        $lname = $row['last_name'];
        $contactNum = $row['contact_no'];
        $district = $row['district'];
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSQUARE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" >
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="../../img/csquared.png" width="100" height="30" alt="logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="viewCustomer.php">Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../item/viewItem.php">Item</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Reports
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../reports/invoiceReport.php">Invoice Report</a></li>
                  <li><a class="dropdown-item" href="../reports/invoiceItemReport.php">Invoice Item Report</a></li>
                  <li><a class="dropdown-item" href="../reports/itemReport.php">Item Report</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    <!-- navbar -->

    <div class="container text-center">
    <h2>Edit Customer</h2>
  </div>
  <div class="container">
    <form action="" method="post">
        <label for="title" class="form-label">Title: </label>
        <select name="title" class="form-select" value="<?php echo $title;?>" id="title">
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
            <option value="Dr">Dr</option>
        </select>
        
        <label for="fname" class="form-label">First Name: </label>
        <input type="text" class="form-control" value="<?php echo $fname;?>" id="fname" name="fname">
        
        <label for="mname" class="form-label">Middle Name: </label>
        <input type="text" class="form-control" value="<?php echo $mname;?>" id="mname" name="mname">
        
        <label for="lname" class="form-label">Last Name: </label>
        <input type="text" class="form-control" value="<?php echo $lname;?>" id="lname" name="lname">
       
        <label for="contactNum" class="form-label">Contact Number: </label>
        <input type="text" class="form-control" value="<?php echo $contactNum;?>" id="contactNum" name="contactNum">
        
        <label for="district" class="form-label">District: </label>
        <select name="district" class="form-select" id="district">
            <option value="1">Ampara</option>
            <option value="2">Anuradhapura</option>
            <option value="3">Badulla</option>
            <option value="4">Batticaloa</option>
            <option value="5">Colombo</option>
            <option value="6">Galle</option>
            <option value="7">Gampaha</option>
            <option value="8">Hambantota</option>
            <option value="9">Jaffna</option>
            <option value="10">Kalutara</option>
            <option value="11">Kalutara</option>
            <option value="12">Kandy</option>
            <option value="13">Kegalle</option>
            <option value="14">Kilinochchi</option>
            <option value="15">Kurunegala</option>
            <option value="16">Mannar</option>
            <option value="17">Matale</option>
            <option value="18">Matara</option>
            <option value="19">Moneragala</option>
            <option value="20">Mullaitivu</option>
            <option value="21">Nuwara Eliya</option>
            <option value="22">Polonnaruwa</option>
            <option value="23">Puttalam</option>
            <option value="24">Rathnapura</option>
            <option value="25">Vavuniya</option>
        </select>
        
        <input type="submit" class="btn btn-primary" style="margin-left: 90%; margin-top: 20px;" name="sbm_edit" value="Update">
    </form>

  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>