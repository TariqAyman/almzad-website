(function(){function n(n,t){var e,l=n.split("."),r=V;l[0]in r||!r.execScript||r.execScript("var "+l[0]);for(;l.length&&(e=l.shift());)l.length||void 0===t?r=r[e]?r[e]:r[e]={}:r[e]=t}function t(n,t){function e(){}e.prototype=t.prototype,n.M=t.prototype,n.prototype=new e,n.prototype.constructor=n,n.N=function(n,e,l){for(var r=Array(arguments.length-2),i=2;i<arguments.length;i++)r[i-2]=arguments[i];return t.prototype[e].apply(n,r)}}function e(n,t){null!=n&&this.a.apply(this,arguments)}function l(n){n.b=""}function r(n,t){return n>t?1:n<t?-1:0}function i(n,t){this.b=n,this.a={};for(var e=0;e<t.length;e++){var l=t[e];this.a[l.b]=l}}function u(n){return function(n,t){n.sort(t||r)}(n=function(n){var t,e=[],l=0;for(t in n)e[l++]=n[t];return e}(n.a),function(n,t){return n.b-t.b}),n}function a(n,t){switch(this.b=n,this.g=!!t.v,this.a=t.c,this.i=t.type,this.h=!1,this.a){case q:case T:case U:case Y:case k:case P:case G:this.h=!0}this.f=t.defaultValue}function o(){this.a={},this.f=this.j().a,this.b=this.g=null}function s(n,t){var e=n.a[t];if(null==e)return null;if(n.g){if(!(t in n.b)){var l=n.g,r=n.f[t];if(null!=e)if(r.g){for(var i=[],u=0;u<e.length;u++)i[u]=l.b(r,e[u]);e=i}else e=l.b(r,e);return n.b[t]=e}return n.b[t]}return e}function f(n,t,e){var l=s(n,t);return n.f[t].g?l[e||0]:l}function p(n,t){var e;if(null!=n.a[t])e=f(n,t,void 0);else n:{if(void 0===(e=n.f[t]).f){var l=e.i;if(l===Boolean)e.f=!1;else if(l===Number)e.f=0;else{if(l!==String){e=new l;break n}e.f=e.h?"0":""}}e=e.f}return e}function c(n,t){return n.f[t].g?null!=n.a[t]?n.a[t].length:0:null!=n.a[t]?1:0}function h(n,t,e){n.a[t]=e,n.b&&(n.b[t]=e)}function g(n,t){var e,l=[];for(e in t)0!=e&&l.push(new a(e,t[e]));return new i(n,l)}function m(){o.call(this)}function b(){o.call(this)}function d(){o.call(this)}function y(){}function v(){}function _(){}function S(){this.a={}}function w(n){return 0==n.length||tn.test(n)}function x(n,t){if(null==t)return null;t=t.toUpperCase();var e=n.a[t];if(null==e){if(null==(e=Q[t]))return null;e=(new _).a(d.j(),e),n.a[t]=e}return e}function A(n){return null==(n=z[n])?"ZZ":n[0]}function N(n){this.H=RegExp(" "),this.C="",this.m=new e,this.w="",this.i=new e,this.u=new e,this.l=!0,this.A=this.o=this.F=!1,this.G=S.b(),this.s=0,this.b=new e,this.B=!1,this.h="",this.a=new e,this.f=[],this.D=n,this.J=this.g=$(this,this.D)}function $(n,t){var e;if(null!=t&&isNaN(t)&&t.toUpperCase()in Q){if(null==(e=x(n.G,t)))throw Error("Invalid region code: "+t);e=p(e,10)}else e=0;return null!=(e=x(n.G,A(e)))?e:en}function j(n){for(var t=n.f.length,e=0;e<t;++e){var r,i=n.f[e],u=p(i,1);if(n.w==u)return!1;r=n;var a=p(s=i,1);if(-1!=a.indexOf("|"))r=!1;else{var o;a=(a=a.replace(ln,"\\d")).replace(rn,"\\d"),l(r.m),o=r;var s=p(s,2),c="999999999999999".match(a)[0];c.length<o.a.b.length?o="":o=(o=c.replace(new RegExp(a,"g"),s)).replace(RegExp("9","g")," "),0<o.length?(r.m.a(o),r=!0):r=!1}if(r)return n.w=u,n.B=an.test(f(i,4)),n.s=0,!0}return n.l=!1}function E(n,t){for(var e=[],l=t.length-3,r=n.f.length,i=0;i<r;++i){var u=n.f[i];0==c(u,3)?e.push(n.f[i]):(u=f(u,3,Math.min(l,c(u,3)-1)),0==t.search(u)&&e.push(n.f[i]))}n.f=e}function B(n){return n.l=!0,n.A=!1,n.f=[],n.s=0,l(n.m),n.w="",C(n)}function R(n){for(var t=n.a.toString(),e=n.f.length,l=0;l<e;++l){var r=n.f[l],i=p(r,1);if(new RegExp("^(?:"+i+")$").test(t))return n.B=an.test(f(r,4)),F(n,t=t.replace(new RegExp(i,"g"),f(r,2)))}return""}function F(n,t){var e=n.b.b.length;return n.B&&0<e&&" "!=n.b.toString().charAt(e-1)?n.b+" "+t:n.b+t}function C(n){var t=n.a.toString();if(3<=t.length){for(var e=n.o&&0==n.h.length&&0<c(n.g,20)?s(n.g,20)||[]:s(n.g,19)||[],l=e.length,r=0;r<l;++r){var i=e[r];0<n.h.length&&w(p(i,4))&&!f(i,6)&&null==i.a[5]||(0!=n.h.length||n.o||w(p(i,4))||f(i,6))&&un.test(p(i,2))&&n.f.push(i)}return E(n,t),0<(t=R(n)).length?t:j(n)?I(n):n.i.toString()}return F(n,t)}function I(n){var t=n.a.toString(),e=t.length;if(0<e){for(var l="",r=0;r<e;r++)l=M(n,t.charAt(r));return n.l?F(n,l):n.i.toString()}return n.b.toString()}function D(n){var t,e=n.a.toString(),r=0;return 1!=f(n.g,10)?t=!1:t="1"==(t=n.a.toString()).charAt(0)&&"0"!=t.charAt(1)&&"1"!=t.charAt(1),t?(r=1,n.b.a("1").a(" "),n.o=!0):null!=n.g.a[15]&&(t=new RegExp("^(?:"+f(n.g,15)+")"),null!=(t=e.match(t))&&null!=t[0]&&0<t[0].length&&(n.o=!0,r=t[0].length,n.b.a(e.substring(0,r)))),l(n.a),n.a.a(e.substring(r)),e.substring(0,r)}function H(n){var t=n.u.toString(),e=new RegExp("^(?:\\+|"+f(n.g,11)+")");return null!=(e=t.match(e))&&null!=e[0]&&0<e[0].length&&(n.o=!0,e=e[0].length,l(n.a),n.a.a(t.substring(e)),l(n.b),n.b.a(t.substring(0,e)),"+"!=t.charAt(0)&&n.b.a(" "),!0)}function K(n){if(0==n.a.b.length)return!1;var t,r=new e;n:{if(0!=(t=n.a.toString()).length&&"0"!=t.charAt(0))for(var i,u=t.length,a=1;3>=a&&a<=u;++a)if((i=parseInt(t.substring(0,a),10))in z){r.a(t.substring(a)),t=i;break n}t=0}return 0!=t&&(l(n.a),n.a.a(r.toString()),"001"==(r=A(t))?n.g=x(n.G,""+t):r!=n.D&&(n.g=$(n,r)),n.b.a(""+t).a(" "),n.h="",!0)}function M(n,t){if(0<=(r=n.m.toString()).substring(n.s).search(n.H)){var e=r.search(n.H),r=r.replace(n.H,t);return l(n.m),n.m.a(r),n.s=e,r.substring(0,n.s+1)}return 1==n.f.length&&(n.l=!1),n.w="",n.i.toString()}var V=this;e.prototype.b="",e.prototype.set=function(n){this.b=""+n},e.prototype.a=function(n,t,e){if(this.b+=String(n),null!=t)for(var l=1;l<arguments.length;l++)this.b+=arguments[l];return this},e.prototype.toString=function(){return this.b};var G=1,P=2,q=3,T=4,U=6,Y=16,k=18;o.prototype.set=function(n,t){h(this,n.b,t)},o.prototype.clone=function(){var n=new this.constructor;return n!=this&&(n.a={},n.b&&(n.b={}),function n(t,e){for(var l=u(t.j()),r=0;r<l.length;r++){var i=(o=l[r]).b;if(null!=e.a[i]){t.b&&delete t.b[o.b];var a=11==o.a||10==o.a;if(o.g)for(var o=s(e,i)||[],f=0;f<o.length;f++){var p=t,c=i,g=a?o[f].clone():o[f];p.a[c]||(p.a[c]=[]),p.a[c].push(g),p.b&&delete p.b[c]}else o=s(e,i),a?(a=s(t,i))?n(a,o):h(t,i,o.clone()):h(t,i,o)}}}(n,this)),n},t(m,o);var J=null;t(b,o);var L=null;t(d,o);var O=null;m.prototype.j=function(){var n=J;return n||(J=n=g(m,{0:{name:"NumberFormat",I:"i18n.phonenumbers.NumberFormat"},1:{name:"pattern",required:!0,c:9,type:String},2:{name:"format",required:!0,c:9,type:String},3:{name:"leading_digits_pattern",v:!0,c:9,type:String},4:{name:"national_prefix_formatting_rule",c:9,type:String},6:{name:"national_prefix_optional_when_formatting",c:8,defaultValue:!1,type:Boolean},5:{name:"domestic_carrier_code_formatting_rule",c:9,type:String}})),n},m.j=m.prototype.j,b.prototype.j=function(){var n=L;return n||(L=n=g(b,{0:{name:"PhoneNumberDesc",I:"i18n.phonenumbers.PhoneNumberDesc"},2:{name:"national_number_pattern",c:9,type:String},9:{name:"possible_length",v:!0,c:5,type:Number},10:{name:"possible_length_local_only",v:!0,c:5,type:Number},6:{name:"example_number",c:9,type:String}})),n},b.j=b.prototype.j,d.prototype.j=function(){var n=O;return n||(O=n=g(d,{0:{name:"PhoneMetadata",I:"i18n.phonenumbers.PhoneMetadata"},1:{name:"general_desc",c:11,type:b},2:{name:"fixed_line",c:11,type:b},3:{name:"mobile",c:11,type:b},4:{name:"toll_free",c:11,type:b},5:{name:"premium_rate",c:11,type:b},6:{name:"shared_cost",c:11,type:b},7:{name:"personal_number",c:11,type:b},8:{name:"voip",c:11,type:b},21:{name:"pager",c:11,type:b},25:{name:"uan",c:11,type:b},27:{name:"emergency",c:11,type:b},28:{name:"voicemail",c:11,type:b},29:{name:"short_code",c:11,type:b},30:{name:"standard_rate",c:11,type:b},31:{name:"carrier_specific",c:11,type:b},33:{name:"sms_services",c:11,type:b},24:{name:"no_international_dialling",c:11,type:b},9:{name:"id",required:!0,c:9,type:String},10:{name:"country_code",c:5,type:Number},11:{name:"international_prefix",c:9,type:String},17:{name:"preferred_international_prefix",c:9,type:String},12:{name:"national_prefix",c:9,type:String},13:{name:"preferred_extn_prefix",c:9,type:String},15:{name:"national_prefix_for_parsing",c:9,type:String},16:{name:"national_prefix_transform_rule",c:9,type:String},18:{name:"same_mobile_and_fixed_line_pattern",c:8,defaultValue:!1,type:Boolean},19:{name:"number_format",v:!0,c:11,type:m},20:{name:"intl_number_format",v:!0,c:11,type:m},22:{name:"main_country_for_code",c:8,defaultValue:!1,type:Boolean},23:{name:"leading_digits",c:9,type:String},26:{name:"leading_zero_possible",c:8,defaultValue:!1,type:Boolean}})),n},d.j=d.prototype.j,y.prototype.a=function(n){throw new n.b,Error("Unimplemented")},y.prototype.b=function(n,t){if(11==n.a||10==n.a)return t instanceof o?t:this.a(n.i.prototype.j(),t);if(14==n.a){if("string"==typeof t&&Z.test(t)){var e=Number(t);if(0<e)return e}return t}if(!n.h)return t;if((e=n.i)===String){if("number"==typeof t)return String(t)}else if(e===Number&&"string"==typeof t&&("Infinity"===t||"-Infinity"===t||"NaN"===t||Z.test(t)))return Number(t);return t};var Z=/^-?[0-9]+$/;t(v,y),v.prototype.a=function(n,t){var e=new n.b;return e.g=this,e.a=t,e.b={},e},t(_,v),_.prototype.b=function(n,t){return 8==n.a?!!t:y.prototype.b.apply(this,arguments)},_.prototype.a=function(n,t){return _.M.a.call(this,n,t)};var z={852:["HK"]},Q={HK:[null,[null,null,"8[0-46-9]\\d{6,7}|9\\d{4}(?:\\d(?:\\d(?:\\d{4})?)?)?|(?:[235-79]\\d|46)\\d{6}",null,null,null,null,null,null,[5,6,7,8,9,11]],[null,null,"(?:2(?:[13-8]\\d|2[013-9]|9[0-24-9])\\d|3(?:(?:[1569][0-24-9]|4[0-246-9]|7[0-24-69])\\d|8(?:4[04]|9\\d))|58(?:0[1-8]|1[2-9]))\\d{4}",null,null,null,"21234567",null,null,[8]],[null,null,"(?:46(?:0[0-6]|10|4[0-57-9])|5(?:(?:[1-59][0-46-9]|6[0-4689])\\d|7(?:[0-2469]\\d|30))|6(?:(?:0[1-9]|[13-59]\\d|[68][0-57-9]|7[0-79])\\d|2(?:[0-57-9]\\d|6[01]))|707[1-5]|8480|9(?:(?:0[1-9]|1[02-9]|[358][0-8]|[467]\\d)\\d|2(?:[0-8]\\d|9[03-9])))\\d{4}",null,null,null,"51234567",null,null,[8]],[null,null,"800\\d{6}",null,null,null,"800123456",null,null,[9]],[null,null,"900(?:[0-24-9]\\d{7}|3\\d{1,4})",null,null,null,"90012345678",null,null,[5,6,7,8,11]],[null,null,null,null,null,null,null,null,null,[-1]],[null,null,"8(?:1[0-4679]\\d|2(?:[0-36]\\d|7[0-4])|3(?:[034]\\d|2[09]|70))\\d{4}",null,null,null,"81123456",null,null,[8]],[null,null,null,null,null,null,null,null,null,[-1]],"HK",852,"00(?:30|5[09]|[126-9]?)",null,null,null,null,null,"00",null,[[null,"(\\d{3})(\\d{2,5})","$1 $2",["900","9003"]],[null,"(\\d{4})(\\d{4})","$1 $2",["[2-7]|8[1-4]|9(?:0[1-9]|[1-8])"]],[null,"(\\d{3})(\\d{3})(\\d{3})","$1 $2 $3",["8"]],[null,"(\\d{3})(\\d{2})(\\d{3})(\\d{3})","$1 $2 $3 $4",["9"]]],null,[null,null,"7(?:1(?:0[0-38]|1[0-3679]|3[013]|69|9[136])|2(?:[02389]\\d|1[18]|7[27-9])|3(?:[0-38]\\d|7[0-369]|9[2357-9])|47\\d|5(?:[178]\\d|5[0-5])|6(?:0[0-7]|2[236-9]|[35]\\d)|7(?:[27]\\d|8[7-9])|8(?:[23689]\\d|7[1-9])|9(?:[025]\\d|6[0-246-8]|7[0-36-9]|8[238]))\\d{4}",null,null,null,"71123456",null,null,[8]],null,null,[null,null,null,null,null,null,null,null,null,[-1]],[null,null,"30(?:0[1-9]|[15-7]\\d|2[047]|89)\\d{4}",null,null,null,"30161234",null,null,[8]],null,null,[null,null,null,null,null,null,null,null,null,[-1]]]};S.b=function(){return S.a?S.a:S.a=new S};var W={0:"0",1:"1",2:"2",3:"3",4:"4",5:"5",6:"6",7:"7",8:"8",9:"9","０":"0","１":"1","２":"2","３":"3","４":"4","５":"5","６":"6","７":"7","８":"8","９":"9","٠":"0","١":"1","٢":"2","٣":"3","٤":"4","٥":"5","٦":"6","٧":"7","٨":"8","٩":"9","۰":"0","۱":"1","۲":"2","۳":"3","۴":"4","۵":"5","۶":"6","۷":"7","۸":"8","۹":"9"},X=RegExp("[+＋]+"),nn=RegExp("([0-9０-９٠-٩۰-۹])"),tn=/^\(?\$1\)?$/,en=new d;h(en,11,"NA");var ln=/\[([^\[\]])*\]/g,rn=/\d(?=[^,}][^,}])/g,un=RegExp("^[-x‐-―−ー－-／  ­​⁠　()（）［］.\\[\\]/~⁓∼～]*(\\$\\d[-x‐-―−ー－-／  ­​⁠　()（）［］.\\[\\]/~⁓∼～]*)+$"),an=/[- ]/;N.prototype.K=function(){this.C="",l(this.i),l(this.u),l(this.m),this.s=0,this.w="",l(this.b),this.h="",l(this.a),this.l=!0,this.A=this.o=this.F=!1,this.f=[],this.B=!1,this.g!=this.J&&(this.g=$(this,this.D))},N.prototype.L=function(n){return this.C=function(n,t){n.i.a(t);var e,r=t;if(nn.test(r)||1==n.i.b.length&&X.test(r)?("+"==(r=t)?(e=r,n.u.a(r)):(e=W[r],n.u.a(e),n.a.a(e)),t=e):(n.l=!1,n.F=!0),!n.l){if(!n.F)if(H(n)){if(K(n))return B(n)}else if(0<n.h.length&&(r=n.a.toString(),l(n.a),n.a.a(n.h),n.a.a(r),e=(r=n.b.toString()).lastIndexOf(n.h),l(n.b),n.b.a(r.substring(0,e))),n.h!=D(n))return n.b.a(" "),B(n);return n.i.toString()}switch(n.u.b.length){case 0:case 1:case 2:return n.i.toString();case 3:if(!H(n))return n.h=D(n),C(n);n.A=!0;default:return n.A?(K(n)&&(n.A=!1),n.b.toString()+n.a.toString()):0<n.f.length?(r=M(n,t),0<(e=R(n)).length?e:(E(n,n.a.toString()),j(n)?I(n):n.l?F(n,r):n.i.toString())):C(n)}}(this,n)},n("Cleave.AsYouTypeFormatter",N),n("Cleave.AsYouTypeFormatter.prototype.inputDigit",N.prototype.L),n("Cleave.AsYouTypeFormatter.prototype.clear",N.prototype.K)}).call("object"==typeof global&&global?global:window);
