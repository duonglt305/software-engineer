!function(e){var r={};function t(n){if(r[n])return r[n].exports;var a=r[n]={i:n,l:!1,exports:{}};return e[n].call(a.exports,a,a.exports,t),a.l=!0,a.exports}t.m=e,t.c=r,t.d=function(e,r,n){t.o(e,r)||Object.defineProperty(e,r,{configurable:!1,enumerable:!0,get:n})},t.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(r,"a",r),r},t.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},t.p="/",t(t.s=53)}({53:function(e,r,t){e.exports=t(54)},54:function(e,r){var t=$(".breadcrumb .active > span").attr("id");new Vue({el:"#app",data:{name:t},watch:{name:function(e){this.getSlug(e)}},methods:{getSlug:function(e){return this.generateSlug(e)},generateSlug:function(e){return("@"+e.toLowerCase().replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi,"a").replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi,"e").replace(/i|í|ì|ỉ|ĩ|ị/gi,"i").replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi,"o").replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi,"u").replace(/ý|ỳ|ỷ|ỹ|ỵ/gi,"y").replace(/đ/gi,"d").replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,"").replace(/ /gi,"-").replace(/\-\-\-\-\-/gi,"-").replace(/\-\-\-\-/gi,"-").replace(/\-\-\-/gi,"-").replace(/\-\-/gi,"-")+"@").replace(/\@\-|\-\@|\@/gi,"")}}});$(document).ready(function(){$(".dropify").dropify()})}});