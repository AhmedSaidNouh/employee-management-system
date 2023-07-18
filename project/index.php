<?php
include '../project/share/header.php';
include '../project/share/body.php';
echo "<h1 class=mx-auto style=width: 200px; style=height: 200px;> WELCOME TO HOME PAGE</h1>";
if(isset($_GET['logout']))
{
    session_unset();
    session_destroy();
    header("location:/project/index.php");
}
include '../project/share/footer.php';