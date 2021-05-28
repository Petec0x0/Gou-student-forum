<?php
session_start();
unset($_SESSION["s_user_id"]);
unset($_SESSION["s_email"]);
unset($_SESSION["s_firstname"]);
unset($_SESSION["s_lastname"]);
unset($_SESSION["authenticated"]);
unset($_SESSION["student_authenticated"]);
Header("Location: login.php");
?>