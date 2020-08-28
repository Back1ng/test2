<?php


namespace App\Controllers;


use App\Database\DB;

class Controller
{
    public function __construct()
    {
        DB::getInstance();
    }
}