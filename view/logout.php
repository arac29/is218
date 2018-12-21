<?php 
//session_set_cookie_params(0,"/~aa986/","web.njit.edu");
session_start();


$_SESSION=array(); //mkes it empty  grabage collection OS, every other time not instantly 


//time to not send the cookie anymore. putting an empty string, current time-1hour TTL sends header to browser to delete session
setcookie("PHPSESSID","",time()-3600,'/~aa986/',0,0);
session_destroy(); //kills server data on session 

echo "<h2> You have been logged out...</h2> <br>";
?>
