<?php

if(isset($_SESSION['email'])) {
    unset($_SESSION['email']);
}

header('Location: dang_nhap.php');