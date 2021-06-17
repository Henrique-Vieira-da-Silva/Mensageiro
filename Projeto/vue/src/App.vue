<template>
  <div id="app" class="h-100 " >
    <div id="nav"  >
    </div>
    <router-view/>
  </div>
</template>

<style>
.bloco{
  padding:0px;
  margin:0px;
  border:0px;
   
  width:100%;
}


body,html{
 height:100%;
  width:100%;
   padding:0px;
  margin:0px;
  border:0px;
  overflow:hidden;
}

#app{
-webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
    width:100%;
     padding:0px;
  margin:0px;
  border:0px;
}

#nav{
 height: 0%;
    width:100%;
}

.topo {


 height:14%;
  width:100%;
   padding:0px;
  margin:0px;
  border:0px;
  
}

.textoConfig{

  color:#F2F2F2;
  margin-bottom:2%;
  margin-top:5%;
  margin-left:3%;
}

.degrade{
  background-image: linear-gradient(to right,#00B0F0,#00B0F0 , #0070C0);
}

.linha1{
   height:13%;
  width:100%;
}

.linha2{
   height:13%;
  width:100%;
}
.linha3{
   height:13%;
  width:100%;
 
}
.linha4{
   height:7%;
  width:100%;
 color:#7F7F7F;

    padding:0px;
  margin:0px;
  border:0px;
}

.button{

   height:70%;
   font-size:130%;
   color:#F2F2F2;
   border-radius:0px;
   width:100%;
   border:none;
   padding:2%;
}

.input{
  border:1px;
  border-bottom:2px solid #009AD0;
  text-align:center;
  font:#595959;
  
  width:100%;
}

.button:focus, input:focus, select:focus {
    border: 1 solid;
    outline: 0;
} 

.span{
  width:100%;
  text-align:center;
   opacity: 1.0;
   color: #009AD0;
}

.login{
  height:100%
}
.novoUsuario{
  height:100%
}
.image-login{
  visibility:hidden;
  height:0px;
  width:0px;
}
.aviso{
   width:100%;
  color:#F00;
  font-size:80%;
  text-align:center;
  margin-left:6%;
  }
@media only screen and (max-height: 500px) {
  body, html{
    height:500px;
  }

}
@media only screen and (min-width: 760px) {

  .image-login{
    visibility:visible;
    height:25%;
    width:25%;
    margin-left:37.5%;
    margin-top:-13%;
  }
    .login{
      
      height:50%;
      background-color: #e0e0e0;
      border-radius:15px;
      width:30%;
      margin:auto;
      margin-top:7%;
    }
      .novoUsuario{
      
      height:
      50%;
      background-color: #e0e0e0;
      border-radius:15px;
      width:30%;
      margin:auto;
      margin-top:7%;
    }
    .input{
      background-color:#e0e0e0;
    }
  .linha1{
   height:20%;
  }
  

.linha2{
   height:20%;

}
.linha3{
   height:20%;
  
}
.linha4{
   height:12%;

}
.aviso{
   width:100%;
  color:#F00;
  font-size:80%;
  text-align:center;
  }

 }

.span{ transition-duration:0.5s;}
 .span:hover{ 
     transition-duration: 0.5s;
   text-shadow: 0px -1px 20px rgba(0,154,208,0.99);
}

.button{ transition-duration:1s;}
 .button:hover{ 
     transition-duration: 1s;
   text-shadow: 0px -1px 20px rgba(0,255,208,0.99);
}

#load{
  visibility:collapse;
}

.load{
  background-color:#3d3d3da2;
 transition-duration: 1s;
   position: fixed;
  z-index: 998;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
.loader {
   transition-duration: 1s;
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.perfil{
  background-color: #BDEEFF;
  padding:0px;
  border-radius:15px;
  margin:1%;
  margin-left: 5%;
  width:90%
  
  
}
.key{
  width:25px;
  height:50px;
  
}

.recado{
  font-size:70%;
  font-style: italic;
}
.nome{
  margin-top:5%;
}
.recadoI{
 
  margin-top:5%;
  border:none;
   border-bottom:2px solid #009AD0;
  text-align: center;
    width:60%;
      margin:auto;
        margin-top:5%;
}

.nomeI{
  
  border:none;
  border-bottom:2px solid #009AD0;
  width:40%;
  margin-top:5%;
  margin:auto;
    margin-top:5%;
  text-align: center;
}
.conta{
  margin-top:8px;
  margin-left:5%;
}

.p{
  padding:0px;
}
.imgPerfil{
   width:100px;
  height:100px;
  margin:0px;
  padding:0px;
  margin:auto;
}
#imgPerfil{
 
  margin:0px;
  padding:0px;
}
</style>


