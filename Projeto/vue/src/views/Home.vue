<template>

<form  class=" h-100">

  <div id="load" >
  <div class="load h-100 w-100"></div> <div class="loader"></div>
  </div>
  <div class="lead container-fluid-row bloco h-100 ">
  

    <div class="row topo degrade ">
        <div class="col  position-relative">
            <span class=" display-4 position-absolute bottom-0 textoConfig">Login</span>
      </div>
  
    </div><!-- fim da primeira linha-->

      <div class="col  login "> 
    
      <div ><img class="image-login" src="../assets/usuario.png"/></div>
      <div class="row linha1 justify-content-center">
        <div class="col-10 position-relative" >
          <input id="input"  v-model="tcelular" type="text" placeholder="DDI + DDD + Telefone" class=" display-7 input position-absolute bottom-0" />
        </div>
      </div>
        <div class="row linha2 justify-content-center">
        <div class="col-10  position-relative">
         <input id="input1" v-model="senha"  type="password" placeholder="Senha" class=" display-7 input position-absolute bottom-0" />
        </div>
    </div>
    <span class="aviso col-10 ">{{login}}</span>
    <div class="row  linha3 justify-content-center ">
        <div class="col-7   position-relative " >
          <button @click="logar" type="button" class="button degrade  position-absolute bottom-0 btn btn-primary btn-lg btn-block">Entrar</button>
        </div>
    </div>
           <div id="teste" class="row  linha4  ">
        <div class="col  position-relative " style="padding:0px">
        <span class=" display-7 position-absolute bottom-0 span "><router-link to="/novoUsuario"><b>sou novo</b></router-link></span>
      

      
    </div>
    </div>
    </div>
  </div>
  {{mounted()}}
  </form>
 
</template>

<script>

export default{
 
  name: 'teste',
  data(){
    return{
      tcelular : '',
      senha: '',
      login:'',
      contador:0,
 
    }
  },
  directives: {
  focus: {
    // definição da diretiva
    inserted: function (el) {
      el.style="border-bottom:2px solid #f00";
    }
  }
},
  methods: {

     mounted(){
    
   if(this.contador <= 1){
      this.contador++;
        var request = new XMLHttpRequest();
        request.onreadystatechange  = function () { // Chama a função quando o estado mudar.
        document.getElementById("load").style="visibility:visible";
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
          if(JSON.parse(request.response).id >= 0){
               window.location.href = "/#/config";
           
            
          }else{
         
            document.getElementById("load").style="visibility:collapse";
          }
        }
        }
       request.open("GET", "http://localhost/status",true);
       request.withCredentials = true;
      request.send();
     }
     },

    logar: function(){
      this.login = "";
      document.getElementById("input").style="border-bottom:2px solid #009AD0";
      document.getElementById("input1").style="border-bottom:2px solid #009AD0";
      let esse = this;
      if(this.tcelular != "" && this.senha != ""){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            if(JSON.parse(xhttp.responseText).status != -1){
             
            // router.push({ path: 'about'});
              window.location.href = "/#/config";
            }else{
              esse.login = "*Senha ou Telefone Incorreto!";
              document.getElementById("input").style="border-bottom:2px solid #F00";
              document.getElementById("input").focus();
              document.getElementById("input1").style="border-bottom:2px solid #F00";
            }
          }
        };
        xhttp.open("GET", "http://localhost/autentica?ncelular="+this.tcelular+"&senha="+this.senha, true);
        xhttp.withCredentials = true;
        xhttp.send();
      }else{ 
        this.login = "*Insira suas credencias!";
         if(this.tcelular == "" && this.senha == ""){
        document.getElementById("input").style="border-bottom:2px solid #F00";
         document.getElementById("input").focus();
           document.getElementById("input1").style="border-bottom:2px solid #F00";
      }else if(this.tcelular == ""){
         document.getElementById("input").style="border-bottom:2px solid #F00";
         document.getElementById("input").focus();
      }else{
         document.getElementById("input1").style="border-bottom:2px solid #F00";
        document.getElementById("input1").focus();
      }
    }}
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
  