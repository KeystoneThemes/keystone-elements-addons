!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define([],e):"object"==typeof exports?exports._vantaEffect=e():t._vantaEffect=e()}("undefined"!=typeof self?self:this,function(){return function(t){var e={};function i(s){if(e[s])return e[s].exports;var o=e[s]={i:s,l:!1,exports:{}};return t[s].call(o.exports,o,o.exports,i),o.l=!0,o.exports}return i.m=t,i.c=e,i.d=function(t,e,s){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:s})},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var s=Object.create(null);if(i.r(s),Object.defineProperty(s,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)i.d(s,o,function(e){return t[e]}.bind(null,o));return s},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="",i(i.s=13)}({0:function(t,e,i){"use strict";function s(t,e){for(let i in e)e.hasOwnProperty(i)&&(t[i]=e[i]);return t}function o(){return"undefined"!=typeof navigator?/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)||window.innerWidth<600:null}i.d(e,"c",function(){return s}),i.d(e,"e",function(){return o}),i.d(e,"i",function(){return n}),i.d(e,"h",function(){return r}),i.d(e,"g",function(){return h}),i.d(e,"f",function(){return a}),i.d(e,"a",function(){return c}),i.d(e,"b",function(){return u}),i.d(e,"d",function(){return l}),Number.prototype.clamp=function(t,e){return Math.min(Math.max(this,t),e)};const n=t=>t[Math.floor(Math.random()*t.length)];function r(t,e){return null==t&&(t=0),null==e&&(e=1),t+Math.random()*(e-t)}function h(t,e){return null==t&&(t=0),null==e&&(e=1),Math.floor(t+Math.random()*(e-t+1))}const a=t=>document.querySelector(t),c=t=>"number"==typeof t?"#"+("00000"+t.toString(16)).slice(-6):t,u=(t,e=1)=>{const i=c(t),s=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(i),o=s?{r:parseInt(s[1],16),g:parseInt(s[2],16),b:parseInt(s[3],16)}:null;return"rgba("+o.r+","+o.g+","+o.b+","+e+")"},l=t=>.299*t.r+.587*t.g+.114*t.b},1:function(t,e,i){"use strict";i.d(e,"a",function(){return r});var s=i(0);const o="object"==typeof window;let n=o&&window.THREE||{};o&&!window.VANTA&&(window.VANTA={});const r=o&&window.VANTA||{};r.register=(t,e)=>r[t]=t=>new e(t),r.version="0.5.17";const h=function(){return Array.prototype.unshift.call(arguments,"[VANTA]"),console.error.apply(this,arguments)};r.VantaBase=class{constructor(t={}){if(!o)return!1;r.current=this,this.windowMouseMoveWrapper=this.windowMouseMoveWrapper.bind(this),this.windowTouchWrapper=this.windowTouchWrapper.bind(this),this.windowGyroWrapper=this.windowGyroWrapper.bind(this),this.resize=this.resize.bind(this),this.animationLoop=this.animationLoop.bind(this),this.restart=this.restart.bind(this);const e="function"==typeof this.getDefaultOptions?this.getDefaultOptions():this.defaultOptions;if(this.options=Object(s.c)({mouseControls:!0,touchControls:!0,gyroControls:!1,minHeight:200,minWidth:200,scale:1,scaleMobile:1},e),(t instanceof HTMLElement||"string"==typeof t)&&(t={el:t}),Object(s.c)(this.options,t),this.options.THREE&&(n=this.options.THREE),this.el=this.options.el,null==this.el)h('Instance needs "el" param!');else if(!(this.options.el instanceof HTMLElement)){const t=this.el;if(this.el=Object(s.f)(t),!this.el)return void h("Cannot find element",t)}this.prepareEl(),this.initThree(),this.setSize();try{this.init()}catch(t){return h("Init error",t),this.renderer&&this.renderer.domElement&&this.el.removeChild(this.renderer.domElement),void(this.options.backgroundColor&&(console.log("[VANTA] Falling back to backgroundColor"),this.el.style.background=Object(s.a)(this.options.backgroundColor)))}this.initMouse(),this.resize(),this.animationLoop();const i=window.addEventListener;i("resize",this.resize),window.requestAnimationFrame(this.resize),this.options.mouseControls&&(i("scroll",this.windowMouseMoveWrapper),i("mousemove",this.windowMouseMoveWrapper)),this.options.touchControls&&(i("touchstart",this.windowTouchWrapper),i("touchmove",this.windowTouchWrapper)),this.options.gyroControls&&i("deviceorientation",this.windowGyroWrapper)}setOptions(t={}){Object(s.c)(this.options,t),this.triggerMouseMove()}prepareEl(){let t,e;if("undefined"!=typeof Node&&Node.TEXT_NODE)for(t=0;t<this.el.childNodes.length;t++){const e=this.el.childNodes[t];if(e.nodeType===Node.TEXT_NODE){const t=document.createElement("span");t.textContent=e.textContent,e.parentElement.insertBefore(t,e),e.remove()}}for(t=0;t<this.el.children.length;t++)e=this.el.children[t],"static"===getComputedStyle(e).position&&(e.style.position="relative"),"auto"===getComputedStyle(e).zIndex&&(e.style.zIndex=1);"static"===getComputedStyle(this.el).position&&(this.el.style.position="relative")}applyCanvasStyles(t,e={}){Object(s.c)(t.style,{position:"absolute",zIndex:0,top:0,left:0,background:""}),Object(s.c)(t.style,e),t.classList.add("vanta-canvas")}initThree(){n.WebGLRenderer?(this.renderer=new n.WebGLRenderer({alpha:!0,antialias:!0}),this.el.appendChild(this.renderer.domElement),this.applyCanvasStyles(this.renderer.domElement),isNaN(this.options.backgroundAlpha)&&(this.options.backgroundAlpha=1),this.scene=new n.Scene):console.warn("[VANTA] No THREE defined on window")}getCanvasElement(){return this.renderer?this.renderer.domElement:this.p5renderer?this.p5renderer.canvas:void 0}getCanvasRect(){const t=this.getCanvasElement();return!!t&&t.getBoundingClientRect()}windowMouseMoveWrapper(t){const e=this.getCanvasRect();if(!e)return!1;const i=t.clientX-e.left,s=t.clientY-e.top;i>=0&&s>=0&&i<=e.width&&s<=e.height&&(this.mouseX=i,this.mouseY=s,this.options.mouseEase||this.triggerMouseMove(i,s))}windowTouchWrapper(t){const e=this.getCanvasRect();if(!e)return!1;if(1===t.touches.length){const i=t.touches[0].clientX-e.left,s=t.touches[0].clientY-e.top;i>=0&&s>=0&&i<=e.width&&s<=e.height&&(this.mouseX=i,this.mouseY=s,this.options.mouseEase||this.triggerMouseMove(i,s))}}windowGyroWrapper(t){const e=this.getCanvasRect();if(!e)return!1;const i=Math.round(2*t.alpha)-e.left,s=Math.round(2*t.beta)-e.top;i>=0&&s>=0&&i<=e.width&&s<=e.height&&(this.mouseX=i,this.mouseY=s,this.options.mouseEase||this.triggerMouseMove(i,s))}triggerMouseMove(t,e){void 0===t&&void 0===e&&(this.options.mouseEase?(t=this.mouseEaseX,e=this.mouseEaseY):(t=this.mouseX,e=this.mouseY)),this.uniforms&&(this.uniforms.iMouse.value.x=t/this.scale,this.uniforms.iMouse.value.y=e/this.scale);const i=t/this.width,s=e/this.height;"function"==typeof this.onMouseMove&&this.onMouseMove(i,s)}setSize(){this.scale||(this.scale=1),Object(s.e)()&&this.options.scaleMobile?this.scale=this.options.scaleMobile:this.options.scale&&(this.scale=this.options.scale),this.width=Math.max(this.el.offsetWidth,this.options.minWidth),this.height=Math.max(this.el.offsetHeight,this.options.minHeight)}initMouse(){(!this.mouseX&&!this.mouseY||this.mouseX===this.options.minWidth/2&&this.mouseY===this.options.minHeight/2)&&(this.mouseX=this.width/2,this.mouseY=this.height/2,this.triggerMouseMove(this.mouseX,this.mouseY))}resize(){this.setSize(),this.camera&&(this.camera.aspect=this.width/this.height,"function"==typeof this.camera.updateProjectionMatrix&&this.camera.updateProjectionMatrix()),this.renderer&&(this.renderer.setSize(this.width,this.height),this.renderer.setPixelRatio(window.devicePixelRatio/this.scale)),"function"==typeof this.onResize&&this.onResize()}isOnScreen(){const t=this.el.offsetHeight,e=this.el.getBoundingClientRect(),i=window.pageYOffset||(document.documentElement||document.body.parentNode||document.body).scrollTop,s=e.top+i;return s-window.innerHeight<=i&&i<=s+t}animationLoop(){return this.t||(this.t=0),this.t+=1,this.t2||(this.t2=0),this.t2+=this.options.speed||1,this.uniforms&&(this.uniforms.iTime.value=.016667*this.t2),this.options.mouseEase&&(this.mouseEaseX=this.mouseEaseX||this.mouseX||0,this.mouseEaseY=this.mouseEaseY||this.mouseY||0,Math.abs(this.mouseEaseX-this.mouseX)+Math.abs(this.mouseEaseY-this.mouseY)>.1&&(this.mouseEaseX+=.05*(this.mouseX-this.mouseEaseX),this.mouseEaseY+=.05*(this.mouseY-this.mouseEaseY),this.triggerMouseMove(this.mouseEaseX,this.mouseEaseY))),(this.isOnScreen()||this.options.forceAnimate)&&("function"==typeof this.onUpdate&&this.onUpdate(),this.scene&&this.camera&&(this.renderer.render(this.scene,this.camera),this.renderer.setClearColor(this.options.backgroundColor,this.options.backgroundAlpha)),this.fps&&this.fps.update&&this.fps.update(),"function"==typeof this.afterRender&&this.afterRender()),this.req=window.requestAnimationFrame(this.animationLoop)}restart(){if(this.scene)for(;this.scene.children.length;)this.scene.remove(this.scene.children[0]);"function"==typeof this.onRestart&&this.onRestart(),this.init()}init(){"function"==typeof this.onInit&&this.onInit()}destroy(){"function"==typeof this.onDestroy&&this.onDestroy();const t=window.removeEventListener;t("touchstart",this.windowTouchWrapper),t("touchmove",this.windowTouchWrapper),t("scroll",this.windowMouseMoveWrapper),t("mousemove",this.windowMouseMoveWrapper),t("deviceorientation",this.windowGyroWrapper),t("resize",this.resize),window.cancelAnimationFrame(this.req),this.renderer&&(this.renderer.domElement&&this.el.removeChild(this.renderer.domElement),this.renderer=null,this.scene=null)}},e.b=r.VantaBase},13:function(t,e,i){"use strict";i.r(e);var s=i(1),o=i(0);let n="object"==typeof window&&window.THREE;class r extends s.b{static initClass(){this.prototype.defaultOptions={backgroundColor:2106408,color:8978176},this.prototype.colors=[16720469,16716185,16737996,8978176,7851025,16776960,16742195,1179647,1149149,16768290,2250188,7975100,5468283]}constructor(t){n=t.THREE||n,super(t)}material(t){return new n.MeshLambertMaterial({color:t})}genRing(t,e,i,s,r,h,a){null==s&&(s=0),null==r&&(r=1.4*Math.PI),null==h&&(h=0),null==a&&(a=1),this.rings||(this.rings=[]),e<1&&(e=1);const c={amount:.4,bevelEnabled:!1,steps:1,curveSegments:~~(64*r/6.14)},u=new n.Shape;u.absarc(0,0,e+i,0,r,!1),u.lineTo(e*Math.cos(r),e*Math.sin(r)),u.absarc(0,0,e,r,0,!0);const l=new n.ExtrudeGeometry(u,c),d=this.material(t);(0===Object(o.g)(0,1)||e>60)&&(d.transparent=!0,d.opacity=Math.max(50/e+Object(o.h)(-.3,.3),.1));const p=new n.Mesh(l,d);if(p.rotation.x=Math.PI/2,p.rotation.z=s,p.position.y=h,p.speed=.001*a,p.receiveShadow=!0,p.castShadow=!0,this.rings.push(p),this.cont.add(p),e<20&&r<1.3*Math.PI&&Object(o.g)(0,2))try{this.genRing(Object(o.i)(this.colors),e+Object(o.h)(-1,3),i+Object(o.h)(-2,0),s+r,r+Object(o.h)(-.5,.5),h+Object(o.h)(-3,1),a)}catch(t){}return p}onInit(){let t;const{material:e}=this;this.cont=new n.Group,this.cont.position.set(30,0,0),this.cont.rotation.x=.06667,this.cont.rotation.z=.16667,this.scene.add(this.cont);let i=Object(o.e)()?30:60;for(let e=0;e<i;e++){let e;Object(o.g)(0,3)?(e=Object(o.h)(2,4)+Object(o.h)(1,30)*Object(o.h)(1,2)*Object(o.h)(1,2)*Object(o.h)(1,2),Object(o.e)()&&(e*=.5),t=Object(o.h)(0,3.5)+Object(o.h)(0,3.5)-Object(o.g)(0,e/4)-e/50):(e=Object(o.h)(1,3)*Object(o.h)(2,4),t=Object(o.h)(1,2)*Object(o.h)(1,2)*Object(o.h)(1.1,1.5));const i=.05*Math.pow(2,Object(o.g)(0,4));t<i&&(t=i),this.genRing(Object(o.i)(this.colors),e,t,Object(o.h)(0,1e3),Object(o.h)(1,6),Object(o.h)(0,50/(e+1)+5)+5/t/(e+.5),.25*Math.max(-Object(o.h)(.5,2),Object(o.h)(1,50-e/2)-e/2))}this.camera=new n.PerspectiveCamera(25,this.width/this.height,10,1e4),this.camera.position.set(0,150,200),this.scene.add(this.camera);const s=new n.AmbientLight(16777215,.5);return this.scene.add(s),this.pointLight=new n.PointLight(16777215,.5),this.pointLight.position.set(0,150,200),this.scene.add(this.pointLight),this.spot=new n.SpotLight(16777215,1),this.spot.position.set(-15,50,100),this.spot.penumbra=1,this.spot.angle=.5,this.spot.decay=1,this.spot.distance=300,this.spot.target=this.cont,this.scene.add(this.spot)}onUpdate(){let t;null!=this.helper&&this.helper.update(),null!=this.controls&&this.controls.update();const e=this.camera;Math.abs(e.tx-e.position.x)>.01&&(t=e.tx-e.position.x,e.position.x+=.02*t),Math.abs(e.ty-e.position.y)>.01&&(t=e.ty-e.position.y,e.position.y+=.02*t),e.lookAt(new n.Vector3(0,25,7)),e.near=Math.max(.5*e.position.z-20,1),e.updateProjectionMatrix();for(let t of Array.from(null!=this.rings?this.rings:[]))t.rotation.z+=t.speed;const i=.001*this.t;return this.cont.rotation.x+=1e-4*Math.sin(i),this.cont.rotation.z+=7e-5*Math.cos(i)}onMouseMove(t,e){const i=this.camera;return i.oy||(i.oy=i.position.y,i.ox=i.position.x),i.tx=i.ox+50*(t-.5),i.ty=i.oy-50*e}}r.initClass(),e.default=s.a.register("RINGS",r)}})});