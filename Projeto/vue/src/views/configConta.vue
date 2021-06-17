<template>
<form  class=" h-100" >
  <div  class="lead container-fluid-row bloco h-100 ">
        <div class="row topo degrade ">
            <div class="col  position-relative"> 
                <button @click="goBack"> Voltar </button>
              <span class=" display-6 position-absolute bottom-0 textoConfig">Configuração de Conta</span>
           </div>
        </div><!-- fim da primeira linha-->
          <div class="col  novoUsuario"> 
            <div ><img class="image-login" src="../assets/usuario.png"/></div>
              <div class="row linha1 justify-content-center">
                <div class="col-10 position-relative" >
                 <input id="nome"  v-model="nome" type="text" placeholder="Primeiro nome" class=" display-7 input position-absolute bottom-0" />
               </div>
            </div>
            <div class="row linha2 justify-content-center">
              <div class="col-10  position-relative">
              <input id="sobrenome" v-model="sobrenome"  type="text" placeholder="Sobrenome" class=" display-7 input position-absolute bottom-0" />
            </div>
            </div>
            <div class="row linha2 justify-content-center">
              <div class="col-10  position-relative">
                <input id="senha" v-model="senha"  type="password" placeholder="Senha" class=" display-7 input position-absolute bottom-0" />
              </div>
            </div>
            <span class="aviso col-10 ">{{aviso}}</span>
            <div class="row  linha3 justify-content-center ">
              <div class="col-7   position-relative " >
                <button @click="Post" type="button" class="button degrade  position-absolute  bottom-0 tn btn-primary btn-lg btn-block">Salvar</button>
              </div>
         </div>
      </div>
   </div>
   {{mounted()}}//onload
</form >
</template>

<script>
  
var nome='',sobrenome='',senha='';
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
      reacado:'',
      foto_perfil:'',
      contador:0
    }
  },
  directives: {
  focus: {
    inserted: function (el) {
      el.style="border-bottom:2px solid #f00";
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
     window.location.href = "/#/config";
   },
   Post(){
         let parametro = "border-bottom:2px solid #009AD0";
         document.getElementById("nome").style=parametro;
   
         document.getElementById("senha").style=parametro;'';  
        this.aviso ="";
     if(this.nome != "" && this.sobrenome != "" &&  this.senha != "" && this.senha.length >= 8 && this.DDI != "" &&  this.telefone != "" && this.DDD != ""){
        var formData = new FormData();
        formData.append("id", this.id);
        formData.append("nome", this.nome);
        formData.append("sobrenome", this.sobrenome);
        formData.append("senha", this.senha2);
        formData.append("recado", this.recado);
        formData.append("foto_perfil", this.foto_perfil.substring(0,4)+this.foto_perfil.substring(4,this.foto_perfil.length));
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
          document.getElementById("senha").style="border-bottom:2px solid #F00";
          document.getElementById("senha").focus();
       }else{
          this.aviso = "Preencha todos os campos!";
          this.nome != "" ? this:document.getElementById("nome").style="border-bottom:2px solid #F00";
          this.sobrenome != "" ? this: document.getElementById("sobrenome").style="border-bottom:2px solid #F00";
          this.senha != "" ? this:document.getElementById("senha").style="border-bottom:2px solid #F00";
          document.getElementById("nome").focus();   
        }
      }
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
  