<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{


    /**
     * 
     * @return response
     */
    public function teste(){

        $teste1 = ['nome'=>'henrique','idade'=> 20 ];
        return view('teste', compact('teste1'));
    }

    }
