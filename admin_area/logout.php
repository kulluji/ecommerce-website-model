<?php
  session_start();
  session_destroy();
 echo "<sscript>window.open('login.php?logged_out=You have logged out,come back soon!','_self')</script>";