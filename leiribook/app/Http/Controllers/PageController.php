<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contactos(){
        return view("contactos");
    }
    public function politica_privacidade(){
        return view("politica_privacidade");
    }
    public function evento(){
        return view("evento");
    }
    public function eventos(){
        return view("eventos");
    }
}
