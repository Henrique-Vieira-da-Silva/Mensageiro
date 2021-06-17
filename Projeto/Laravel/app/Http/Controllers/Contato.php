<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class Contato extends Controller
{

    public function insert(Request $request){
     //	id	npais	ncelular	ddd	nome		id_usuario
         DB::table('contato')->insert(
            [
                'id' => $request->id,
                'npais' => $request -> npais,
                'ncelular'=> $request -> ncelular,
                'ddd' => $request -> ddd,
                'nome' => $request -> nome,
                'id_usuario' => $request -> id_usuario

            ]
        );
        return '{"status":1}';
    }
   

//	id npais ncelular ddd nome id_usuario

    public function update(Request $request){
        DB::table('contato')->where('id',$request->id)->update([
            'npais'=> $request->npais,
            'ncelular'=> $request->ncelular,
            'ddd'=> $request->ddd,
            'nome'=> $request->nome,
            'id_usuario'=> $request->id_usuario,
        ]);
        return '{"status":1}';
    }

    public function delete(Request $request){
        DB::table('contato')->where('id',$request->id)->delete();
        return '{"status":1}';
    }

    public function busca(Request $request){
        return json_encode(DB::table('contato')->where('id_usuario',$request->id)->first());
    }

    public function busca_interna($id){
        return DB::table('contato')->where('id',$id)->first();
    }
}
 