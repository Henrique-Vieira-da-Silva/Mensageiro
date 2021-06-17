<!DOCTYPE html>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.ably.io/lib/ably.min-1.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Tema opcional -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Última versão JavaScript compilada e minificada -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <meta charset="UTF-8">
        <title>Sobre mim</title>
        <script>
var ably = new Ably.Realtime('aD4Xbg.P_UaGw:sj_k8pRt_JdtAraU');
var channel = ably.channels.get('default');

function vai() {
    var nome = document.getElementById("name").value;
    var msg = document.getElementById("msg").value;
  channel.publish('greeting', " "+nome + ": "+msg);
  document.getElementById("msg").value="";
  var objDiv = document.getElementById("scroll");
objDiv.scrollTop = objDiv.scrollHeight;
};

channel.subscribe('greeting',function(message) {
  //show('⬅ Received: ' + message.data.toString());
});
var a;
channel.subscribe('greeting', function(message) {
    a = message.data;
    show("" + message.data);
  //alert("Received a greeting message in realtime: " + message.data);
});

function show( status) {
var table = document.getElementById("table");
var row = table.insertRow(0);
var cell1 = row.insertCell(0);
cell1.innerHTML = status;

}
        </script>
    </head>
    <body style="overflow: none">

<form action="usuario/update" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<input placeholder="id" type="id" id="id" name="id"><br>
<input placeholder="nome" type="text" id="nome" name="nome"><br>
<input placeholder="sobrenome" type="text" id="sobrenome" name="sobrenome"><br>
<input placeholder="senha" type="text" id="senha" name="senha"><br>
<input placeholder="recado" type="text"  name="recado"><br>
<input  type="file"  accept="image/*" name="foto_perfil"><br>
<input placeholder="+55" type="number"  name="npais"><br>
<input placeholder="16" type="number"  name="ddd"><br>
<input placeholder="999999999" type="number"  name="ncelular"><br>
<button type="submit">enviar</button>
</form>




<ul class="row" id="caixa"></ul>    </body>
<div class="container-fluid">
<h1  style="font-size:60px; color:#555 " class="h1">H&H Mensseger</h1>
<input placeholder="Digite seu nome" style="font-size:50px; height: 70px" class="form-control" id="name" type="text" ><br>

<div id="scroll" style="height: 1200px; overflow: scroll; width: 100%;"><table  style="color:#555;font-size:50px;" id="table"></table></div>
  <div class="row" style=" display:inline;" >

      <input   style="display:inline; width: 70%; font-size:50px; height:80px;margin-bottom:10px;border:0px"  placeholder="Mensagem" class="form-control" id="msg" type="text" > 
      <button  style="display:inline;float:right;width:30%; font-size:50px; height: 80px;border:0px ;margin-bottom:10px"  class="btn btn-info" id="publish" onclick="vai()" value="Publish a message">Enviar</button>
      </div>

</div>
</html>