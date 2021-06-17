<template>
<form  class=" h-100">
  <div class="lead container-fluid-row bloco h-100 ">
  

    <div class="row topo degrade ">
        <div class="col  position-relative">
          
            <button @click="goBack"> Voltar </button>
         
            <span class=" display-6 position-absolute bottom-0 textoConfig">Cadastre-se</span>
      </div>
  
    </div><!-- fim da primeira linha-->

    <div class="col  novoUsuario "> 
    
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
        <div class="col-3  position-relative">
        <input id="DDI" v-model="DDI"  type="text" placeholder="DDI" class=" display-7 input position-absolute bottom-0" />
         </div>
        <div class="col-3  position-relative">
        <input id="DDD" v-model="DDD"  type="text" placeholder="DDD" class=" display-7 input position-absolute bottom-0" />
         </div>
        <div class="col-4  position-relative">
            <input id="telefone" v-model="telefone"  type="text" placeholder="Telefone" class=" display-7 input position-absolute bottom-0" />
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
          <button @click="Post" type="button" class="button degrade  position-absolute  bottom-0 tn btn-primary btn-lg btn-block">Entrar</button>
        </div>
         </div>
    </div>
  </div>
 
  </form>
  
</template>

<script>

export default{
  name: 'teste',
  data(){
    return{
      nome : '',
      sobrenome: '',
      DDI:'',
      DDD:'',
      telefone:'',
      senha:'',
      login:'',
      aviso:''
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
   

    goBack(){
       return this.$router.go(-1);
    },
    Post(){
         let parametro = "border-bottom:2px solid #009AD0";
         document.getElementById("nome").style=parametro;
         document.getElementById("sobrenome").style=parametro;
         document.getElementById("DDI").style=parametro;
         document.getElementById("DDD").style=parametro;
         document.getElementById("telefone").style=parametro;
         document.getElementById("senha").style=parametro;''  

       this.aviso ="";
     if(this.nome != "" && this.sobrenome != "" &&  this.senha != "" && this.senha.length >= 8 && this.DDI != "" &&  this.telefone != "" && this.DDD != ""){
      var formData = new FormData();
      formData.append("nome", this.nome);
      formData.append("sobrenome", this.sobrenome);
      formData.append("senha", this.senha);
      formData.append("recado", "Hello! i'm use Mensageiro!");
      formData.append("npais", this.DDI);
      formData.append("ncelular", this.telefone);
      formData.append("ddd", this.DDD);
      var request = new XMLHttpRequest();
      request.open("POST", "http://localhost/usuario/insert");
      request.onreadystatechange = function() { // Chama a função quando o estado mudar.
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
              if(JSON.parserequest.response.status == 1){this}
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
          this.DDI != "" ? this:document.getElementById("DDI").style="border-bottom:2px solid #F00";
          this.DDD != "" ? this: document.getElementById("DDD").style="border-bottom:2px solid #F00";
          this.telefone != "" ? this: document.getElementById("telefone").style="border-bottom:2px solid #F00";
          this.senha != "" ? this:document.getElementById("senha").style="border-bottom:2px solid #F00";

           document.getElementById("nome").focus();
         
       }
     }

  /*
      var xhr = new XMLHttpRequest();
      xhr.open("POST", 'http://localhost/usuario/insert', true);
      let esse = this;
      // Envia a informação do cabeçalho junto com a requisição.
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function() { // Chama a função quando o estado mudar.
          if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
             alert("foi");
          }
      }
      xhr.send("nome="+esse.nome+"&sobrenome="+esse.Sobrenome+"&senha="+esse.senha+"&ddd="+esse.DDD+"&recado= Hi! i'm use Mensageiro"+"&npais="+esse.telefone+"&npais="+esse.DDI);

      // xhr.send(new Int8Array());
      // xhr.send(document);
      
      
      */
    }
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
  