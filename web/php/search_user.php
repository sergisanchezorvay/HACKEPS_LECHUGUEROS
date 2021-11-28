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

    $sql = "SELECT c.product_id as '0', c.price as '1', c.qtt as '2' from cart c, usuaris u where u.email = '$username' AND c.shopper_id = u.user_id";
    if ($result = mysqli_query($conn, $sql)) {
        $array = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
       

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

<!DOCTYPE html>

<html>
<link href="/HACKEPS_LECHUGUEROS/web/css/style.css" rel="stylesheet" type="text/css" media="all" /> 
  
  <div class="search_user">
      <table class="table">
        <?php if(count($array)>0){
          echo '<tr>';
              echo'<th>'; echo 'Product Name'; echo'</th>';
              echo'<th>'; echo 'Price'; echo'</th>';
              echo'<th>';echo 'Quantity'; echo'</th>';
            echo'</tr>';
          
              for ($i=0; $i<count($array);$i++){
                echo '<tr>';
                for($j=0; $j<count($array[$i]);$j++){
                    echo'<td>';echo htmlspecialchars($array[$i][$j]);echo'</td>';
    
                }echo'</tr>';}
            }else{echo ($username); echo' has no products in the cart.';header ( 'refresh:2; /HACKEPS_LECHUGUEROS/web/coop_panel.html' );
            }
      
       ?></table>
       
  </div>
<div>
    <a href="/HACKEPS_LECHUGUEROS/web/coop_panel.html" class="back" > GO BACK </a>
</div>

  <style type="text/css">
.search_user {
    width: 100%;
    height: 90vh;
    justify-content: center;
    align-items: center;
    display: flex;
}
.table tr{
    width:100%;
}
.table th{
    padding: 0 2em 0 2em;
    justify-content:center;
}
.table td{
    padding: 0 2em 0 2em;
    justify-content:center;

}
.back{
    display:flex;
    justify-content:center;
    color:black;
}

</style>
</html>

