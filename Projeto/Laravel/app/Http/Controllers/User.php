<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function insert(Request $request){
     $arquivo = fopen("../img/user.png",'r');
      $ler = fread($arquivo,2465);
       DB::table('usuario')->insert([
          'nome'=>$request->nome, 
          'sobrenome'=>$request->sobrenome,
          'password'=>bcrypt($request->senha),
          'recado'=>$request->recado,
          'foto_perfil'=> ".PNG".base64_encode($ler), 
          'npais'=>$request->npais, 
          'ncelular'=>$request->ncelular, 
          'ddd'=>$request->ddd
       ]);
       fclose($arquivo);
       return '{"status":1}';
       
      // return 'foi!'+$foto;
    //return view('teste');
    }

  

    public function update(Request $request){
        //$arquivo = fopen($request->foto_perfil,'r');
        //$ler = fread( $arquivo, filesize($request->foto_perfil) );
         DB::table('usuario')->where('id',$request->id)->update([
            'nome'=>$request->nome, 
            'sobrenome'=>$request->sobrenome,
            'password'=>bcrypt($request->senha),
            'recado'=>$request->recado,
            'foto_perfil'=> rtrim(substr($request->foto_perfil,0,4),".").base64_encode(substr($request->foto_perfil,4,strlen($request->foto_perfil))), 
            'npais'=>$request->npais, 
            'ncelular'=>$request->ncelular, 
            'ddd'=>$request->ddd
         ]);
        // fclose($arquivo);
         return '{"status":1}';
    }

    public function delete (Request $request){
       DB::table('usuario')->where('id',$request->id)->delete();
       return '{"status":1}';
    }

    public function busca (Request $request){
      return json_encode(DB::table('usuario')->where('id',$request->id)->first());
    }

    public function buscaCel (Request $request){
      return json_encode(DB::table('usuario')->where('ncelular',$request->ncelular)->first());
    }

    public function buscaCelInte ($ncelular){
      return DB::table('usuario')->where('ncelular',$ncelular)->first();
    }

}
