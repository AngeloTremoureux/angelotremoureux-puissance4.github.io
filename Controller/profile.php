<?php
if (!$isConnected)
{
    require('error.php');
}
else
{
    $path = "/account/me";
    $title = "Mon profile - Puissance4";
    require('View/v_profile_header.php');
    require('View/v_nav.php');
    require('View/v_profile.php');
}