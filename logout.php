<?php
   session_start();
   
   if(session_destroy()) {
        header("Location: adminlogin.php");
        echo '<script language="javascript">';
        echo 'alert("Logout successful")';
        echo '</script>';

   }
?>