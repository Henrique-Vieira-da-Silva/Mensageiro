(function(t){function e(e){for(var r,a,i=e[0],c=e[1],l=e[2],s=0,p=[];s<i.length;s++)a=i[s],Object.prototype.hasOwnProperty.call(o,a)&&o[a]&&p.push(o[a][0]),o[a]=0;for(r in c)Object.prototype.hasOwnProperty.call(c,r)&&(t[r]=c[r]);f&&f(e);while(p.length)p.shift()();return u.push.apply(u,l||[]),n()}function n(){for(var t,e=0;e<u.length;e++){for(var n=u[e],r=!0,a=1;a<n.length;a++){var c=n[a];0!==o[c]&&(r=!1)}r&&(u.splice(e--,1),t=i(i.s=n[0]))}return t}var r={},o={app:0},u=[];function a(t){return i.p+"js/"+({about:"about"}[t]||t)+"."+{about:"845645d1"}[t]+".js"}function i(e){if(r[e])return r[e].exports;var n=r[e]={i:e,l:!1,exports:{}};return t[e].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.e=function(t){var e=[],n=o[t];if(0!==n)if(n)e.push(n[2]);else{var r=new Promise((function(e,r){n=o[t]=[e,r]}));e.push(n[2]=r);var u,c=document.createElement("script");c.charset="utf-8",c.timeout=120,i.nc&&c.setAttribute("nonce",i.nc),c.src=a(t);var l=new Error;u=function(e){c.onerror=c.onload=null,clearTimeout(s);var n=o[t];if(0!==n){if(n){var r=e&&("load"===e.type?"missing":e.type),u=e&&e.target&&e.target.src;l.message="Loading chunk "+t+" failed.\n("+r+": "+u+")",l.name="ChunkLoadError",l.type=r,l.request=u,n[1](l)}o[t]=void 0}};var s=setTimeout((function(){u({type:"timeout",target:c})}),12e4);c.onerror=c.onload=u,document.head.appendChild(c)}return Promise.all(e)},i.m=t,i.c=r,i.d=function(t,e,n){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},i.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)i.d(n,r,function(e){return t[e]}.bind(null,r));return n},i.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="/",i.oe=function(t){throw console.error(t),t};var c=window["webpackJsonp"]=window["webpackJsonp"]||[],l=c.push.bind(c);c.push=e,c=c.slice();for(var s=0;s<c.length;s++)e(c[s]);var f=l;u.push([0,"chunk-vendors"]),n()})({0:function(t,e,n){t.exports=n("56d7")},"034f":function(t,e,n){"use strict";n("85ec")},"09f6":function(t,e,n){"use strict";n.d(e,"a",(function(){return r})),n.d(e,"b",(function(){return o}));var r=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"home"},[t._v(" {Mensagens} ")])},o=[]},"56d7":function(t,e,n){"use strict";n.r(e);n("e260"),n("e6cf"),n("cca6"),n("a79d");var r=n("2b0e"),o=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{attrs:{id:"app"}},[n("div",{attrs:{id:"nav"}},[n("router-link",{attrs:{to:"/"}},[t._v("Mensagens")]),t._v(" | "),n("router-link",{attrs:{to:"/Contatos"}},[t._v("Contatos")])],1),n("router-view")],1)},u=[],a=(n("034f"),n("2877")),i={},c=Object(a["a"])(i,o,u,!1,null,null,null),l=c.exports,s=(n("d3b7"),n("3ca3"),n("ddb0"),n("8c4f")),f=n("bb51"),p=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[t._v(" {Contatos} ")])},d=[],v={},b=Object(a["a"])(v,p,d,!1,null,null,null),h=b.exports;r["a"].use(s["a"]);var m=[{path:"/",name:"Home",component:f["default"]},{path:"/about",name:"About",component:function(){return n.e("about").then(n.bind(null,"f820"))}},{path:"/Contatos",name:"Contatos",component:h}],y=new s["a"]({routes:m}),g=y;r["a"].config.productionTip=!1,new r["a"]({router:g,render:function(t){return t(l)}}).$mount("#app")},"7ad4":function(t,e,n){"use strict";var r=n("9cae"),o=n.n(r);e["default"]=o.a},"85ec":function(t,e,n){},"9cae":function(t,e){},bb51:function(t,e,n){"use strict";var r=n("09f6"),o=n("7ad4"),u=n("2877"),a=Object(u["a"])(o["default"],r["a"],r["b"],!1,null,null,null);e["default"]=a.exports}});
//# sourceMappingURL=app.9d109fcc.js.map