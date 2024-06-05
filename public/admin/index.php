<?php session_start();

{

  $start_time = time(); // get the current time
  $duration = 2; // set the duration of the timer in seconds
  
  while (time() < $start_time + $duration) {
      // code to be executed goes here
  

            echo "<script type='text/javascript'>document.location='/'</script>";
         

        }
}

?>