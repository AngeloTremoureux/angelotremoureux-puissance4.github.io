<?php
session_destroy();
header("Location:./login&prev_action=logout");
?>