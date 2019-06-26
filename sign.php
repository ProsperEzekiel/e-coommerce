<?php
define('data',TRUE);
include('data.php');


  $msg = " ";
  $msgclass = " " ;
  $mailmsg = "  ";
  $msgs = " ";
  $count1;



if (isset ($_POST['signup'])) {

  $name  =  mysqli_real_escape_string($db, $_POST['name']);
  $email =  mysqli_real_escape_string($db, $_POST['email']);
 
  $password  =   mysqli_real_escape_string($db, $_POST['password']);
  $confirm =   mysqli_real_escape_string($db, $_POST['confirm']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
 
  $passs= password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
  $passs = substr( $passs, 0, 60 );

  $sel = "SELECT * from users where email = '$email' " ;

  $query = mysqli_query($db, $sel) or die ('didnt connect') ;

  $count1 = mysqli_num_rows($query);

       if($count1 > 0){
        echo  "<script> 
                alert('This Email may already have an Account'); 
                window.location.href = 'sign-in.html';
               </script>";
        
       
            
        }




     if( $count1< 1 AND $password == $confirm  AND strlen($password)  AND strlen($phone)>9 ){




     $add ="INSERT into users VALUES ('','$name','$email' ,'$phone', '$passs')";
     mysqli_query($db, $add) or die('Database error');
      
     echo  "<script> 
                alert('Registration Successful proceed to Login');
                window.location.href = 'sign-in.html';
            </script>" ;
       
      }






       if( $password != $confirm){
        echo  "<script> 
                    alert('Passwords must be the same ');
                    window.location.href = 'sign-in.html';
                </script>" ;
           
          }

      if(  strlen($password)<6){

        echo  "<script> 
                    alert('Password should contain more than 6 characters ');
                    window.location.href = 'sign-in.html';
                </script>" ;
           
          }


                if(  strlen($phone)<9 ){

                    echo  "<script> 
                                alert('Phone number must have a length of 10 more characters and must be a number');
                                window.location.href = 'sign-in.html';
                           </script>" ;
                     
                    }

 }




?>



