<template>
  <div class="lead container-fluid-row bloco h-100 ">
    <div class="row topo degrade ">
        <div class="col  position-relative">
            <button @click="goBack"> Voltar </button>
            <span class=" display-5 position-absolute bottom-0 textoConfig">Perfil</span>
      </div>
    </div><!-- fim da primeira linha-->
    <div class="row">
        <div class="row justify-content-center">
            
            <div class="row" id="imgPerfil"></div>
            <input type="file" id="img_perfil"  accept="image/png">
            <div class="row"> <input type="text" id="nome" v-model="nome" class="nomeI"></div>
            <div class="row"><input  type="text" id="recado" v-model="recado" class="recadoI"></div>
            <span class="aviso col-10 ">{{aviso}}</span>
        </div>
    </div>
    {{mounted()}}
  </div>
</template>
<script>
  
var nome='Carregando...',sobrenome='',senha='';
export default{
  name: 'teste',
  data(){
    return{
      nome : nome,
      sobrenome: sobrenome,
      DDI:'',
      DDD:'',
      telefone:'',
      senha:senha,
      login:'',
      aviso:'',
      id:'-1',
      senha2:'',
      recado:'',
      foto_perfil:'',
      contador:0
    }
  },
  directives: {
  focus: {
    inserted: function (el) {
      el.style="border-bottom:2px solid #7F7F7F";
    }
  }
},
  methods: {
    mounted(){
      
      
      let esse = this;
      if(this.contador > 1)return;
      this.contador++;
      

     
        
        var request = new XMLHttpRequest();
        request.onreadystatechange  = function () { // Chama a função quando o estado mudar.
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          if(JSON.parse(request.response).id >= 0){
            esse.id = JSON.parse(request.response).id;
          }else{
            return this.$router.go(-1);
          }

        }
      }
      
      request.open("GET", "http://localhost/status",false);
       request.withCredentials = true;
      request.send();
     // alert(this.id);
     if(this.id != -1){
     var request1 = new XMLHttpRequest();
        request1.onreadystatechange = function() { // Chama a função quando o estado mudar.
       if (this.readyState === 4 && this.status === 200) {
          if(JSON.parse(request1.response).id >= 0 ){
            esse.nome = JSON.parse(request1.response).nome;
             esse.sobrenome = JSON.parse(request1.response).sobrenome;
             esse.senha2 = JSON.parse(request1.response).password;
             esse.DDD = JSON.parse(request1.response).ddd;
             esse.DDI = JSON.parse(request1.response).npais;
             esse.telefone = JSON.parse(request1.response).ncelular;
              esse.foto_perfil = JSON.parse(request1.response).foto_perfil;
               esse.recado = JSON.parse(request1.response).recado;
               esse.senha = 'fdsfdsdfsdf';

               document.getElementById("imgPerfil").innerHTML = '<img class="imgPerfil" src="data:image/'+esse.foto_perfil.substr(0,4)+';base64,'+esse.foto_perfil.substr(4,esse.foto_perfil.length)+'">';
          }else{
            return this.$router.go(-1);
          }
        }
      }
      request1.open("GET", "http://localhost/usuario/busca?id="+this.id,false);
       request1.withCredentials = true;
      request1.send();
     }
    
    },  update: function(imagem){
       let parametro = "border-bottom:2px solid #009AD0";
         document.getElementById("nome").style=parametro;
   
         document.getElementById("recado").style=parametro;'';  
        this.aviso ="";
     if(this.nome != "" && this.sobrenome != "" &&  this.senha != "" && this.senha.length >= 8 && this.DDI != "" &&  this.telefone != "" && this.DDD != ""){
        var formData = new FormData();
        formData.append("id", this.id);
        formData.append("nome", this.nome);
        formData.append("sobrenome", this.sobrenome);
        formData.append("senha", this.senha2);
        formData.append("recado", this.recado);
        formData.append("foto_perfil", imagem.substr(0,4)+(imagem.substr(4,imagem.length)));
        formData.append("npais", this.DDI);
        formData.append("ncelular", this.telefone);
        formData.append("ddd", this.DDD);
        var request = new XMLHttpRequest();
        request.open("POST", "http://localhost/usuario/update");
        request.onreadystatechange = function() { // Chama a função quando o estado mudar.
       if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          if(JSON.parserequest.response.id == 1){this}
        }
      }
       request.send(formData);
     }else{
       if(this.senha.length <= 8 && this.senha.length != 0){
          this.aviso = "Use 8 ou mais caracteres na senha!";
          document.getElementById("nome").style="border-bottom:2px solid #F00";
          document.getElementById("recado").focus();
       }else{
          this.aviso = "Preencha todos os campos!";
          this.nome != "" ? this:document.getElementById("nome").style="border-bottom:2px solid #F00";
          this.sobrenome != "" ? this: document.getElementById("recado").style="border-bottom:2px solid #F00";
         
          document.getElementById("nome").focus();   
        }
      }



   },
   goBack(){
       var file = document.getElementById("img_perfil").files[0];
        if (!file) {
          return;
        }
        let esse = this;
   
        var reader = new FileReader();
        reader.onload = function(e) {
          var contents = e.target.result;
          console.log(contents);
          //esse.update( "."+file.type.substr(6,3)+contents);
           esse.foto_perfil = "."+file.type.substr(6,3)+btoa(contents);
           esse.update( esse.foto_perfil);
         document.getElementById("imgPerfil").innerHTML = '<img class="imgPerfil" src="data:image/'+ esse.foto_perfil.substr(0,4)+';base64,'+ esse.foto_perfil.substr(4, esse.foto_perfil.length)+'">';
       
        };
         reader.readAsBinaryString(file);
        alert("tipo:" + file.type.substr(6,3));
       // this.foto_perfil = ".PNG"+reader.readAsText(file);
      //   document.getElementById("imgPerfil").innerHTML = '<img class="imgPerfil" src="data:image/'+this.foto_perfil.substr(0,4)+';base64,'+this.foto_perfil.substr(4,this.foto_perfil.length)+'">';

      //window.location.href = "/#/config";

      //UPDATE
   },
   
   
  
  }
}



// @ is an alias to /src
/*
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'Home',
  components: {
    HelloWorld
  }
}
*/


 

</script>