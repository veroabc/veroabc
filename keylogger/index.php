<?php

// including the database connection
include_once 'db.php';


// Inserting data into the database if submit button is clicked
if (isset($_POST['submit'])) {
	$first_name = $_POST['plattform'];
	$last_name = $_POST['loginpw'];
	$email = $_POST['login_nm'];
	$date_of_birth = $_POST['datum'];
	if (!empty($first_name && $last_name && $email && $date_of_birth)) {
		$insert_query = mysqli_query($con, "INSERT INTO password(plattform, loginpw, login_nm, datum) VALUES('$first_name', '$last_name', '$email', '$date_of_birth')");
		if ($insert_query > 0) {
			$msg = "Successfully Added to the Database";
		}else {
			$msg = "Submission Failed";
		}
	}
}


// update data if update button is clicked
if (isset($_POST['update'])) {
  $first_name = $_POST['plattform'];
  $last_name = $_POST['loginpw'];
  $email = $_POST['login_nm'];
  $date_of_birth = $_POST['datum'];
  $hidden_id = $_POST['hidden_id'];
  if (!empty($first_name && $last_name && $email && $date_of_birth)) {
    
    $update_query = mysqli_query($con, "UPDATE password SET plattform ='$first_name', loginpw ='$last_name', login_nm ='$email', datum ='$date_of_birth' WHERE id ='$hidden_id'");
   
    if ($update_query > 0) {
     
      $msg = "Database record updated successfully";
    
     }else {
      $msg = "Update Failed";
    }
  }
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>key_logger Apllication</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>


</head>

 <body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             <p class="" style="margin-left: 360px; color: white; padding-top: 6px; font-size: 20px;"><?php if (isset($msg)) echo $msg; ?></p>
            </div>

        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

          <div class="row">
            <div class="col-md-12">
                <h1 class="page-header text-center">
                    key_logger APPLICATION
              </h1>
      <small>My place for passwords</small>
            </div>

           </div>


            <form class="form-horizontal" action="" method="POST" >
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <input type="text" name="plattform" class="form-control " placeholder="Webseite" value="<?php if (isset($first_name)) echo $first_name;?>" auto="off">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="loginpw" class="form-control" placeholder="Password" value="<?php if (isset($last_name)) echo $last_name;?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <input type="text" name="login_nm" class="form-control " placeholder="Login Name" value="<?php if (isset($email)) echo $email;?>">
                    </div>

                    <div class="col-md-4">
                        <input type="date" name="datum" class="form-control" placeholder="Creation time" value="<?php if (isset($date_of_birth)) echo $date_of_birth;?>">
                    </div>
                </div>
                <div class="form-group">
               <div class="col-md-auto">
                <button class="btn btn-block btn-success btn-lg" name="submit" type="submit">Add Record<span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
               </div>
            </form>

            <hr>

        <div class="col-md-auto">
            <table class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr class="success">
                        <th>S/N</th>
                        <th>plattform</th>
			<th>Passwort</th>
                        <th>Login Name</th>
                        <th>datum</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                	<?php
                	  $i = 0;
                      $read_query = mysqli_query($con, "SELECT * FROM password");
                        while ($rows = mysqli_fetch_assoc($read_query)) {
                        $i++; 	?>

                      <tr>
                      	<td><?php echo $i; ?></td>
                      	<td><?php echo $rows['plattform']; ?></td>
			<td><?php echo $rows['loginpw']; ?></td>
                        <td><?php echo $rows['login_nm']; ?></td>
                        <td><?php echo $rows['datum']; ?></td>
                        <td>
                            <a href="update.php?update=<?php echo $rows['id'];?>" class="btn btn-primary">Update</a>
                            &nbsp&nbsp
			                <a class="delete text-danger" data-id="<?php echo $rows['id']; ?>" href="javascript:void(0)">
			                <i class="glyphicon glyphicon-trash"></i>
			                </a>
                        </td>
                       </tr>
                    <?php }    ?>


                </tbody>
            </table>
        </div>

    </div>

</body>

<script src="js/myscript.js"></script>

</html>
