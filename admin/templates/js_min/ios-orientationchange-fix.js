/* A fix for the iOS orientationchange zoom bug. Script by @scottjehl, rebound by @wilto.MIT License.*/
(function(a){function j(){b.setAttribute("content",l),c=!0}function m(){b.setAttribute("content",k),c=!1}function n(b){d=b.accelerationIncludingGravity,e=Math.abs(d.x),f=Math.abs(d.y),g=Math.abs(d.z),(!a.orientation||a.orientation===180)&&(e>7||(g>6&&f<8||g<8&&f>6)&&e>5)?c&&m():c||j()}if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1))return;var h=a.document;if(!h.querySelector)return;var b=h.querySelector("meta[name=viewport]"),i=b&&b.getAttribute("content"),k=i+",maximum-scale=1",l=i+",maximum-scale=10",c=!0,e,f,g,d;if(!b)return;a.addEventListener("orientationchange",j,!1),a.addEventListener("devicemotion",n,!1)})(this)