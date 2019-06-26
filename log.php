<?php
session_start();
 define('data',TRUE);
include_once('data.php') ;




$logmsg = " ";
$logmsgclass = " ";
$hash;
$info1;



if (isset ($_POST['login'])){

   $log_email = $_POST['log_email'];
   $log_password    = $_POST['log_password'];




    $Retrieve= "SELECT * FROM users WHERE email = '$log_email'";
   //$count = mysqli_num_rows($Retrieve);
    $info = mysqli_query($db, $Retrieve) or die("login failed");
    $okah = mysqli_fetch_array($info);
    $info1= $okah['password'];
    $hash = password_verify($log_password,$info1 );



     if(1 == 1 AND $hash) {


                $_SESSION['name'] = $okah['name'] ;

                $_SESSION['id'] = session_id();

                $_SESSION['email'] =  $okah['email'] ;

                // $_SESSION['type'] =  $okah['type'] ;
                //
                // $_SESSION['location'] =  $okah['location'] ;
                //
                // $_SESSION['address'] =  $okah['address'] ;

                $_SESSION['phone'] =  $okah['phone'] ;


                echo "<script> alert('Success!') ;</script>";
                    }
         else {

            echo "<script> alert('Wrong Password!') ;</script>";
         }


}
?>