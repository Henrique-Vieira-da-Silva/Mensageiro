<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\http\Controllers\Contato;
class Grupo extends Controller
{
    public function insert (Request $request){
        //nome	id_usuario
    DB::table('grupo')->insert(
        [
          'nome'=> $request-> nome,
          'id_usuario'=> $request -> id_usuario
        ]
        );
        return '{"status":1}';
    }

    public function update (Request $request){
        DB:: table('grupo')->where('nome',$request -> nomeAntigo)->update([
            'nome'=> $request -> nome,
            'id_usuario'=> $request -> id_usuario
        ]);
        return '{"status":1}';
    }
    
    public function delete(Request $request){
        DB::table('grupo')->where('nome',$request->nome)->delete();
        return '{"status":1}';
    }

    public function busca(Request $request){
        return json_encode(DB::table('grupo')->where('nome',$request-> nome)->first());
        return '{"status":1}';
    }

    public function adicionar_participante(Request $request){
        try{
            $contato = new Contato();
            $contatoData = $contato->busca_interna($request->idContato);
            $grupoData =  DB::table('grupo')->where('nome',$request->nome)->first();
            DB::table('relacao_contato_grupo')->insert(['id_contato'=>$contatoData->id,'id_grupo'=>$grupoData->nome]);
            return '{"status":1}';
        }catch(e){
            return '{"status":0}';
        }
    }

    public function remove_participante(Request $request){
        try{
            DB::table('relacao_contato_grupo')->where('id_grupo',$request->nome)->where('id_contato',$request->idContato)->delete();
            return '{"status":1}';
        }catch (e){
            return '{"status":0}';
        }
    }

    public function busca_participantes(Request $request){
        try{
           // return $request->nome;
            $participantes =  DB::table('relacao_contato_grupo')->where('id_grupo',$request->nome)->get();
            foreach($participantes as $participante ){
               echo json_encode($participante);
          }
           
        }catch (e){
            return '{"status":0}';
        }
    }
}