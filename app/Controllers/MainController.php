<?php


namespace App\Controllers;

use App\Database\DB;

/**
 * Контроллер для базовых страниц
 */
class MainController extends Controller
{
    public function index()
    {
        $rows = DB::getRows();
        require __DIR__ . "/../Views/layout.php";
    }
}