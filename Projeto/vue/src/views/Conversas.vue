<template>
  <form  class=" h-100" >
  <div  class="lead container-fluid-row bloco h-100 ">
        <div class="row topo degrade ">
            <div class="col  position-relative"> 
              <div class="row">
              <span class=" display-6 position-absolute bottom-0 textoConfig">O Mensageiro</span>
              </div>
              <br/>
              <div class="row">
                <div class="col-6">
                   <span class=" display-7 position-absolute top-0 textoConfig">Conversas</span>
                 </div>
                <div class="col-6">
                  <span class=" display-7 position-absolute top-0 textoConfig">Contatos</span>
                 </div>
                </div>
           </div>
      </div><!-- fim da primeira linha-->
    
    <div class="row">
      <div class="col-12">
        
          <div  v-for="(item,i) of items" :key='i'  >
            <router-link :to="item.link" ><i> {{ item.nome }} > {{  item.corpo_mensagem }}</i></router-link>
          </div>

      

      </div>
    </div>

  {{mounted()}}
  </div>
</form >
</template>
<script>
  
var nome='',sobrenome='',senha='';
export default{
  name: 'teste',
  data(){
    return{
    items: [],
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
      contador:0,
      contatos:[],
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
      if(this.contador >= 1)return;
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
      var isso;
     // alert(this.id);
     if(this.id != -1){
     var request1 = new XMLHttpRequest();
      request1.onreadystatechange = function() { // Chama a função quando o estado mudar.
       if (this.readyState === 4 && this.status === 200) {
            isso = JSON.parse(request1.response);
            
        }
      }
      request1.open("GET", "http://localhost/mensagem/busca?id="+this.id,false);
       request1.withCredentials = true;
      request1.send();
      this.items = isso;
     // alert(this.items[0].destinatario);
     }

    var cont = 0;
     for(cont=0; cont< this.items.length; cont++){
     var request2 = new XMLHttpRequest();
      request2.onreadystatechange = function() { // Chama a função quando o estado mudar.
       if (this.readyState === 4 && this.status === 200) {
            isso = JSON.parse(request2.response);
            
        }
      }
      request2.open("GET", "http://localhost/contato/busca?id="+this.items[cont].remetente,false);
       request2.withCredentials = true;
      request2.send();
      
      Object.assign(this.items[cont], {
    firstNewAttribute: {
        nestedAttribute: 'nome'
    }
    });
     Object.assign(this.items[cont], {
    firstNewAttribute: {
        nestedAttribute: 'link'
    }
    });
    this.items[cont].link = "/conversa/?id="+this.items[cont].remetente;
    this.items[cont].nome = isso.nome;
   // alert(isso.nome);
    // alert("nome"+this.items[cont].nome);
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
  
