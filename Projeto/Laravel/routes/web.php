<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\User;
use App\Http\Controllers\TesteController;
use App\http\Controllers\Contato;
use App\http\Controllers\Grupo;
use App\http\Controllers\Mensagem;
use App\http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//Route::post('insertContact');

Route::get('/', function (Request $request) {

  session_start();
  echo '1 '.($_SESSION['user']);
  if (isset($_SESSION) > 0) {//Verificar se a sessão não já está aberta.
    echo 'existe';
  }
  echo 'Sessão '.isset($_SESSION);

  if (isset($_SESSION) > 0) {//Verificar se a sessão não já está aberta.
    //session_destroy();
   // echo 'Destruida!';
  }


     $results = DB::select('select * from usuario');
    echo '<hr>';
    foreach ($results as $usuario) {
        echo "{$usuario->nome} ";
        echo "{$usuario->sobrenome} <br>";
        echo "{$usuario->password} | ";
        echo "{$usuario->recado} <br>";
        echo "+{$usuario->npais} ";
        echo "{$usuario->ddd} ";
        echo "{$usuario->ncelular} <br>";
        echo '<img height="50px" width="50px"  src="data:image/'.(substr($usuario->foto_perfil,0,4)).';base64,'.(substr($usuario->foto_perfil,4,strlen($usuario->foto_perfil))).'"/>';
        echo "<hr>";
 
     
    }
    //	id npais ncelular ddd nome id_usuario
//	id	npais	ncelular	ddd	nome		id_usuario
   echo '
   <H1> contato up</h1>
     <form action="contato/update" method="post"> 
    {{ csrf_field() }}
     <input type="text" name="id"><br>
    <input type="text" name="npais"><br>
    <input type="text" name="ncelular"><br>
    <input type="text" name="ddd">
    <input type="text" name="nome"><br>
    <input type="text" name="id_usuario"><br>
    <button type="submit">enviar</button><br>
    </form>
    ';

    echo '
    <form action="usuario/update" method="post"> 
    {{ csrf_field() }}
     <input type="text" name="npais"><br>
    <input type="text" name="ncelular"><br>
    <input type="text" name="ddd"><br>
    <input type="file" name="foto_perfil">
    <input type="text" name="nome">
    <input type="text" name="id_usuario"><br>
    <button type="submit">enviar</button><br>
    </form>
    ';



    return view('teste');
});

//########## Rotas
//USER
Route::post('usuario/insert',[User::class,'insert']);//INSERT
Route::post('usuario/update',[User::class,'update']);//UPDATE
Route::delete('usuario',[User::class,'delete']);//DELETE
Route::get('usuario/busca',[User::class,'busca']);//BUSCA
Route::get('usuario/buscaCel',[User::class,'buscaCel']);//BUSCACEL
//GRUPO
Route::post('grupo/insert',[Grupo::class,'insert']);//INSERT
Route::post('grupo/update',[Grupo::class,'update']);//UPDATE
Route::delete('grupo',[Grupo::class,'delete']);//DELETE
Route::get('grupo/busca',[Grupo::class,'busca']);//BUSCA
Route::get('grupo/adiciona',[Grupo::class,'adicionar_participante']);//ADICIONA_CONTATO_GRUPO
Route::get('grupo/remove',[Grupo::class,'remove_participante']);//REMOVE_CONTATO_GRUPO
Route::get('grupo/buscaParticipantes',[Grupo::class,'busca_participantes']);
//CONTATO
Route::post('contato/insert',[Contato::class,'insert']);//INSERT
Route::post('contato/update',[Contato::class,'update']);//UPDATE
Route::delete('contato',[Contato::class,'delete']);//DELETE
Route::get('contato/busca',[Contato::class,'busca']);//BUSCA
//MENSAGEM
Route::post('mensagem/insert',[Mensagem::class,'insert']);//INSERT
Route::delete('mensagem',[Mensagem::class,'delete']);//DELETE
Route::get('mensagem/busca',[Mensagem::class,'busca']);//BUSCA
//AUTENTICAÇÃO
Route::get('status',[AuthController::class,'status']);//AUTENTICA
Route::get('autentica',[AuthController::class,'authenticate']);//AUTENTICA
Route::get('sair',[AuthController::class,'sair']);//AUTENTICA

