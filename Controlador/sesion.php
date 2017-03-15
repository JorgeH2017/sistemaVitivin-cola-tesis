<?php

if (!isset($_SESSION["usuario"])) {
    header("location:../Vista/index.html");
}
?>