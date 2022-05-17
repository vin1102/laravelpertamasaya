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


        $friends = friends::all();
        return view ('friend', compact('friends')); 
    }
    
}