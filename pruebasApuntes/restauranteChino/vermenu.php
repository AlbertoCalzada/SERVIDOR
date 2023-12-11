<?php

require './bbdd/methods.php';

$menus=getMenus($db);


foreach ($menus as $menu)
{
    echo $menu->name."<br>";
    echo $menu->primero."<br>";
    echo $menu->segundo."<br>";
    echo $menu->postre."<br>";
}
?>