<?php 

// including the database connection
include_once 'db.php';


// show users details if update button is clicked
if (isset($_GET['update'])) {
  $update_id = $_GET['update'];
  $user_data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM password WHERE id='$update_id'"));
  $first_name = $user_data['plattform'];
  $last_name = $user_data['loginpw'];
  $email = $user_data['login_nm'];
  $date_of_birth = $user_data['datum'];
}


 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Veronas Application</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>



</head>
 
 <body>

  <style type="text/css">
        body{
              padding-top: 30px;
        }
  </style>

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
             <p class="" style="margin-left: 350px; color: white; padding-top: 6px;"><?php if (isset($msg)) echo $msg; ?></p>
            </div>
            
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

          <div class="row">  <!-- Blog Entries Column -->
            <div class="col-md-12">
                <h1 class="page-header text-center">
                    key_logger APPLICATION
                    <small>Update Database Records</small>
            </div>

           </div>
        

           <form class="form-horizontal" action="index.php" method="POST" >  
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
                        <input type="date" name="datum" class="form-control" placeholder="Datum" value="<?php if (isset($date_of_birth)) echo $date_of_birth;?>">
                    </div>
		<input type="hidden" name="hidden_id" value="<?php if (isset($_GET['update'])) echo $_GET['update']; ?>">
                </div>
                <div class="form-group">
               <div class="col-md-auto">
                <button class="btn btn-block btn-info btn-lg" name="update" type="submit">Update Record<span class="glyphicon glyphicon-chevron-right"></span></button>
                <hr class="text-danger">
                </div>
               </div>
            </form>
           
            <hr>
       


    </div>

</body>

</html>
