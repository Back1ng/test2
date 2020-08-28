<?php


namespace App\Controllers;


use App\Service\XLSXParser;

class ParserController extends Controller
{
    public function index()
    {
        $XLSXParser = new XLSXParser("");
        $XLSXParser->parseRows();
    }
}