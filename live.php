<?php

$connect = mysqli_connect("localhost", "veronika", "password1","Crud");
$output = '';
if(isset($_POST["query"]))
{
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = "
  SELECT * FROM users
  WHERE f_name LIKE '%".$search."%'
  OR l_name LIKE '%".$search."%'
  OR email LIKE '%".$search."%'
  OR dob LIKE '%".$search."%'
  ";
}
else
{
$query = "
SELECT * FROM users
";
}

  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
    $output .= '
    <div class="col-md-12">
    <table class="table table-striped table-boarded table-responsive">
    <thead>
    <tr class="success">
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Date of Birth</th>
    <th>Actions</th>
</tr>
    </thead>
    ';
    while($row = mysqli_fetch_array($result))
    {
      $output .= '
      <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["f_name"].'</td>
      <td>'.$row["l_name"].'</td>
      <td>'.$row["email"].'</td>
      <td>'.$row["dob"].'</td>


    <td>
                            <a href="update.php?update='.$row["id"].'"class="btn btn-primary">Update</a>
							&nbsp&nbsp
			                <a class="delete text-danger" data-id='.$row["id"].' href="javascript:void(0)">
			                <i class="glyphicon glyphicon-trash"></i>
			                </a>
    </td>


      </tr>
      ';
    }

  echo $output;
}
else
  {
    echo 'Daten not found';

  }

?>
<script src="js/myscript.js"></script>
