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
    if(!isset($_GET['Email'])){console_log("error");}
    $username = $_GET['Email'];

    $sql = "SELECT c.product_id as Product, c.price as Unit_Price, c.qtt as Quantity from cart c, usuaris u where u.email = '$username' AND c.shopper_id = u.user_id";
    if ($result = mysqli_query($conn, $sql)) {
        $array = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        <html>
        <div>
            <span></span>
        </div>
        </html>

     } else {
        echo '<p class="error">There are no users with that email!</p>';
      }
      mysqli_close($conn);
        //user information available in database
        
    }
 
}

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

?>
