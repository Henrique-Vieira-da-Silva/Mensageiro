<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Controllers\User;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $user = new User();
        $userDate = $user->buscaCelInte($request->ncelular);
        
       // return json_encode($userDate);
        if( $userDate != null){
            if (password_verify ( $request->senha, $userDate->password )) // conferindo senha
            {
                session_start([
                    'cookie_lifetime' => 86400,
                ]);
                if(!isset($_SESSION['user'])){
                  $_SESSION['user']= $userDate->id;
                  
                }
                return '{"status":'.$userDate->id.'} ';  
            }
           
            else
            {
                return '{"status":-1}';
            }
        }else{
            return '{"status":-1}';
        }
       
    }

    public function status (Request $request){
        
        session_start();
        if(isset($_SESSION['user'])){
        return '{"id":'.($_SESSION['user']).'}';
        }else{
            return '{"id" : -1 }';
        }
        
        
    }
    public function sair (Request $request){
        session_start();
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            session_destroy();
            unset($_COOKIE['PHPSESSID']); 
        return '{"status":1}';
        }else{
            return '{"status":0}';
        }
        
        
    }


}
