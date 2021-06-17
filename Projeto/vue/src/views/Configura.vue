<template>
  <div class="lead container-fluid-row bloco h-100 ">
    <div class="row topo degrade ">
        <div class="col  position-relative">
            <button @click="goBack"> Voltar </button>
            <span class=" display-5 position-absolute bottom-0 textoConfig">Configuração</span>
      </div>
    </div><!-- fim da primeira linha-->
    <div class="row">
        <div class="row perfil">
            <div class="col-3 col-md-1" id="imgPerfil"></div>
            <router-link class="col-5 " to="/perfil">
                <div class="row"> <span class="nome"><b style="color:#000">{{nome}}</b></span></div>
                <div class="row"><span class="recado"><b style="color:#000"> {{recado}}</b> </span></div>
              
            </router-link>
        </div>
      
    
        <div class="row conta">
            <div class="p col-2 col-md-1 ">
                <img class="key" src="../assets/key.png" alt="">
            </div>
            <router-link class="p col-8 Display-5" to="/configConta">
           
                 <b style="color:#000">Conta</b>
       
            </router-link>
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
           window.location.href = "/";
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

               document.getElementById("imgPerfil").innerHTML = '<img height="70px" width="70px"  src="data:image/'+esse.foto_perfil.substr(0,4)+';base64,'+esse.foto_perfil.substr(4,esse.foto_perfil.length)+'">';
          }else{
            return this.$router.go(-1);
          }
        }
      }
      request1.open("GET", "http://localhost/usuario/busca?id="+this.id,false);
       request1.withCredentials = true;
      request1.send();
     }
    
    },
   goBack(){

        var request = new XMLHttpRequest();
        request.onreadystatechange  = function () { // Chama a função quando o estado mudar.
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          if(JSON.parse(request.response).status){
             window.location.href = "/";}}}
         request.open("GET", "http://localhost/sair",false);
       request.withCredentials = true;
      request.send();
        

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