<?php
    foreach ($_REQUEST as $key => $value) {
    header("location:".$key.".php");
    }
?>