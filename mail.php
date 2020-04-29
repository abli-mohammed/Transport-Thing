<?php

    $to="ammarabli8@gmail.com";
    $sup="Chack for email";
    $txt="<h1>The code is 28<h1>";
    $head="CC: ammarabli8@gmail.com";
    if(mail($to,$sup,$txt,$head))
      echo"yes";
      else
      echo"no";


?>
