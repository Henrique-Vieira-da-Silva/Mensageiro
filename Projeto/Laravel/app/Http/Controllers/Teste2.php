<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Teste2 extends Controller implements ShouldBroadcast
{
    public function broadcastOn()
    {
        return new PrivateChannel('novoCanal');
    }
}
