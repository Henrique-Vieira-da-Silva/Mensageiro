<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Mensagem extends Controller
{
    public function insert(Request $request){
        DB::table('mensagem')->insert([
            'id'=> $request->id,
            'destinatario'=> $request->destinatario,
            'remetente'=> $request->remetente,
            'tipo_remetente'=> $request->tipo_remetente,
            'tipo_destinatario'=> $request->tipo_destinatario,
            'corpo_mensagem'=> $request->corpo_mensagem
        ]           
        );
        return '{"status":1}';
    }

    public function delete(Request $request){
        DB::table('mensagem')->where('id',$request->id)->delete();
        return '{"status":1}';
    }

    public function busca(Request $request){
        return json_encode(DB::table('mensagem')->where('destinatario',$request->id)->get());
    }
}
