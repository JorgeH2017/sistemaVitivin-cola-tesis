<?php
namespace App\Controllers;
defined("APPPATH") OR die("Access denied");
 
class Home
{
    public function saludo($nombre)
    {
        echo "Hola " . $nombre;
    }
}