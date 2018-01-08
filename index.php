<?php

//if(session_status()!=PHP_SESSION_ACTIVE) session_start();
session_start();
require('header.php');

print_r($_SESSION);

require('footer.php');

