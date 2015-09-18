<?php
ob_start();
session_start();
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);
session_unset();
session_destroy();
header('Location: ../../entrar/');
ob_end_flush();