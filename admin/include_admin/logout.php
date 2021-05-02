<?php
    session_start();

    $_SESSION['admin_id']=null;
    $_SESSION['adminname']=null;
    $_SESSION['password']=null;

    header('Location: ../index.php');
