/*!
 * miniTip v1.5.3
 *
 * Updated: July 15, 2012
 * Requires: jQuery v1.3+
 *
 * (c) 2011, James Simpson
 * http://goldfirestudios.com
 *
 * Dual licensed under the MIT and GPL
 *
 * Documentation found at:
 * http://goldfirestudios.com/blog/81/miniTip-jQuery-Plugin
*/
(function(e){e.fn.miniTip=function(t){var n={title:"",content:!1,delay:300,anchor:"n",event:"hover",fadeIn:200,fadeOut:200,aHide:!0,maxW:"250px",offset:5,stemOff:0,doHide:!1},r=e.extend(n,t);e("#miniTip")[0]||e("body").append('<div id="miniTip"><div id="miniTip_t"></div><div id="miniTip_c"></div><div id="miniTip_a"></div></div>');var i=e("#miniTip"),s=e("#miniTip_t"),o=e("#miniTip_c"),u=e("#miniTip_a");return r.doHide?(i.stop(!0,!0).fadeOut(r.fadeOut),!1):this.each(function(){var t=e(this),n=r.content?r.content:t.attr("title");if(n!=""&&typeof n!="undefined"){window.delay=!1;var a=!1,f=!0;r.content||t.removeAttr("title"),r.event=="hover"?(t.hover(function(){i.removeAttr("click"),f=!0,l.call(this)},function(){f=!1,c()}),r.aHide||i.hover(function(){a=!0},function(){a=!1,setTimeout(function(){!f&&!i.attr("click")&&c()},20)})):r.event=="click"&&(r.aHide=!0,t.click(function(){return i.attr("click","t"),i.data("last_target")!==t?l.call(this):i.css("display")=="none"?l.call(this):c(),i.data("last_target",t),e("html").unbind("click").click(function(t){i.css("display")=="block"&&!e(t.target).closest("#miniTip").length&&(e("html").unbind("click"),c())}),!1}));var l=function(){r.show&&r.show.call(this,r),r.content&&r.content!=""&&(n=r.content),o.html(n),r.title!=""?s.html(r.title).show():s.hide(),r.render&&r.render(i),u.removeAttr("class"),i.hide().width("").width(i.width()).css("max-width",r.maxW);var a=t.is("area");if(a){var f,l=[],c=[],h=t.attr("coords").split(",");function p(e,t){return e-t}for(f=0;f<h.length;f++)l.push(h[f++]),c.push(h[f]);var d=t.parent().attr("name"),v=e("img[usemap=\\#"+d+"]").offset(),m=parseInt(v.left,10)+parseInt((parseInt(l.sort(p)[0],10)+parseInt(l.sort(p)[l.length-1],10))/2,10),g=parseInt(v.top,10)+parseInt((parseInt(c.sort(p)[0],10)+parseInt(c.sort(p)[c.length-1],10))/2,10)}else var g=parseInt(t.offset().top,10),m=parseInt(t.offset().left,10);var y=a?0:parseInt(t.outerWidth(),10),b=a?0:parseInt(t.outerHeight(),10),w=i.outerWidth(),E=i.outerHeight(),S=Math.round(m+Math.round((y-w)/2)),x=Math.round(g+b+r.offset+8),T=Math.round(w-16)/2-parseInt(i.css("borderLeftWidth"),10),N=0,C=m+y+w+r.offset+8>parseInt(e(window).width(),10),k=w+r.offset+8>m,L=E+r.offset+8>g-e(window).scrollTop(),A=g+b+E+r.offset+8>parseInt(e(window).height()+e(window).scrollTop(),10),O=r.anchor;if(k||r.anchor=="e"&&!C){if(r.anchor=="w"||r.anchor=="e")O="e",N=Math.round(E/2-8-parseInt(i.css("borderRightWidth"),10)),T=-8-parseInt(i.css("borderRightWidth"),10),S=m+y+r.offset+8,x=Math.round(g+b/2-E/2)}else if(C||r.anchor=="w"&&!k)if(r.anchor=="w"||r.anchor=="e")O="w",N=Math.round(E/2-8-parseInt(i.css("borderLeftWidth"),10)),T=w-parseInt(i.css("borderLeftWidth"),10),S=m-w-r.offset-8,x=Math.round(g+b/2-E/2);if(A||r.anchor=="n"&&!L){if(r.anchor=="n"||r.anchor=="s")O="n",N=E-parseInt(i.css("borderTopWidth"),10),x=g-(E+r.offset+8)}else if(L||r.anchor=="s"&&!A)if(r.anchor=="n"||r.anchor=="s")O="s",N=-8-parseInt(i.css("borderBottomWidth"),10),x=g+b+r.offset+8;r.anchor=="n"||r.anchor=="s"?w/2>m?(S=S<0?T+S:T,T=0):m+w/2>parseInt(e(window).width(),10)&&(S-=T,T*=2):L?(x+=N,N=0):A&&(x-=N,N*=2),u.css({"margin-left":(T>0?T:T+parseInt(r.stemOff,10)/2)+"px","margin-top":N+"px"}).attr("class",O),delay&&clearTimeout(delay),delay=setTimeout(function(){i.css({"margin-left":S+"px","margin-top":x+"px"}).stop(!0,!0).fadeIn(r.fadeIn)},r.delay)},c=function(){if(!r.aHide&&!a||r.aHide)delay&&clearTimeout(delay),delay=setTimeout(function(){h()},r.delay)},h=function(){!r.aHide&&!a||r.aHide?(i.stop(!0,!0).fadeOut(r.fadeOut),r.hide&&r.hide.call(this)):setTimeout(function(){c()},200)}}})}})(jQuery)