<?php
session_start();

// destruir toda la sesión
session_unset();
session_destroy();

//redirigir al login
header("Location: login.php");
exit();