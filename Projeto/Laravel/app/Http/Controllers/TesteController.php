<?php

namespace App\Http\Controllers;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Auth;
use Illuminate\Http\Request;

class TesteController extends Controller implements ShouldBroadcast
{
     /**
     * 
     * @return response
     */
    public function broadcastOn()
    {
        if (Auth::check())
        {
            return 'ola';
        }
       return new PrivateChannel('novoCanal');
      //  return redirect()->intended('/');
    }
}
