<?php

include_once '../database/dbh.inc.php';
include_once '../models/user-session.inc.php';

  /*logout*/
   $user_session = new UserSession();
   $user_session->useSessionLogout();

    echo '<script>location.href="index.php";</script>' ;

?>