<?php

$con=mysql_connect('localhost', 'root', '');
$db=mysql_select_db('employee');


if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from employees where first_name like '%{$search}%' || last_name like '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['first_name']."</td><td></td><td>".$row['last_name']."</td></tr>";
  }
}else{
    echo "No employee Found<br><br>";
  }

}else{                          //while not in use of search  returns all the values
  $query=mysql_query("select * from employees");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['first_name']."</td><td></td><td>".$row['last_name']."</td></tr>";
  }
}

mysql_close();
?>
