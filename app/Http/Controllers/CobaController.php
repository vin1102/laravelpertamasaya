<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function index (){
        return 'Test Berhasil';
    }

    public function coba ($ke){
        return view ('coba' , ['ke' => $ke]);

    }

    public function urutan ($ke){


        $numbers = [
            ['ke' => $ke, 'nomer' => 20],
            ['ke' => $ke, 'nomer' => 30],
            ['ke' => $ke, 'nomer' => 40],
        ];
        return view ('urutan', compact('numbers')); 
    }
    
}