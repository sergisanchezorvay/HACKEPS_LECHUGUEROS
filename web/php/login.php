<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'user_regs');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn === false){
  die("ERROR: Connection error.".mysqli_connect_error());
}
else{
    
if (isset($_GET['login'])) {

 $username = $_GET['email'];
 $password = $_GET['password'];


 $sql = "SELECT * FROM usuaris WHERE email='$username' and user_password ='$password'";
 
 if (!$consulta = $conn->query($sql)) {
     echo '<p class="error">An Error occurred</p>';
 } else {
     $filas = mysqli_num_rows($consulta);
     if ($filas == 0) {
         echo '<p class="error">Username password combination is wrong!</p>';
         header ( 'refresh:2; /HACKEPS_LECHUGUEROS/web/login.html' );

     } else {
        $_SESSION['username'] = $username;
        //user information available in database
        echo "Login successful";
        echo "<br><br> re-directing to members page";
        header ( 'refresh:2; /HACKEPS_LECHUGUEROS/web/coop_panel.html' );
    }
 }
}}

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

?>
