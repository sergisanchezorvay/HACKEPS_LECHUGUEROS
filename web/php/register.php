<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'user_regs');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn === false){
  die("ERROR: Connection error.".mysqli_connect_error());
}

if(isset($_GET['submit']))
{ 
    $email = strip_tags($_GET['email']);
    $username = strip_tags($_GET['name']);
    $password = strip_tags($_GET['password']);
    $sql = "INSERT INTO usuaris (email, user_password, u_name) VALUES ('$email','$password','$username')";
      if (mysqli_query($conn, $sql)) {
            header('Location: /HACKEPS_LECHUGUEROS/web/index.html');  
            console_log("Header");
      }
      mysqli_close($conn);
    
}
else{echo "<span class='form-error'> Ha habido un error. </span>";
  console_log("submit empty");}

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
?>