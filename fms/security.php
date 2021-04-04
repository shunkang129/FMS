<?php

include('dbconfig.php');


// Act as error page for unauthorized access to any pages other than login and signup page
if (!$_SESSION['login']) {
    header('Location: errorPage.php');
}
