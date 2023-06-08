!function(D,j,R,z){"use strict";j=void 0!==j&&j.Math==Math?j:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")(),D.fn.sidebar=function(C){var k,e=D(this),w=D(j),T=D(R),x=D("html"),S=D("head"),A=e.selector||"",F=(new Date).getTime(),O=[],P=C,E="string"==typeof P,H=[].slice.call(arguments,1),M=j.requestAnimationFrame||j.mozRequestAnimationFrame||j.webkitRequestAnimationFrame||j.msRequestAnimationFrame||function(e){setTimeout(e,0)};return e.each(function(){var o,r,e,i,s,a=D.isPlainObject(C)?D.extend(!0,{},D.fn.sidebar.settings,C):D.extend({},D.fn.sidebar.settings),n=a.selector,l=a.className,t=a.namespace,c=a.regExp,d=a.error,u="."+t,f="module-"+t,b=D(this),h=D(a.context),m=b.children(n.sidebar),g=(h.children(n.fixed),h.children(n.pusher)),v=this,p=b.data(f),y={initialize:function(){y.debug("Initializing sidebar",C),y.create.id(),s=y.get.transitionEvent(),a.delaySetup?M(y.setup.layout):y.setup.layout(),M(function(){y.setup.cache()}),y.instantiate()},instantiate:function(){y.verbose("Storing instance of module",y),p=y,b.data(f,y)},create:{id:function(){e=(Math.random().toString(16)+"000000000").substr(2,8),r="."+e,y.verbose("Creating unique id for element",e)}},destroy:function(){y.verbose("Destroying previous module for",b),b.off(u).removeData(f),y.is.ios()&&y.remove.ios(),h.off(r),w.off(r),T.off(r)},event:{clickaway:function(e){var i=0<g.find(e.target).length||g.is(e.target),e=h.is(e.target);i&&(y.verbose("User clicked on dimmed page"),y.hide()),e&&(y.verbose("User clicked on dimmable context (scaled out page)"),y.hide())},touch:function(e){},containScroll:function(e){v.scrollTop<=0&&(v.scrollTop=1),v.scrollTop+v.offsetHeight>=v.scrollHeight&&(v.scrollTop=v.scrollHeight-v.offsetHeight-1)},scroll:function(e){0===D(e.target).closest(n.sidebar).length&&e.preventDefault()}},bind:{clickaway:function(){y.verbose("Adding clickaway events to context",h),a.closable&&h.on("click"+r,y.event.clickaway).on("touchend"+r,y.event.clickaway)},scrollLock:function(){a.scrollLock&&(y.debug("Disabling page scroll"),w.on("DOMMouseScroll"+r,y.event.scroll)),y.verbose("Adding events to contain sidebar scroll"),T.on("touchmove"+r,y.event.touch),b.on("scroll"+u,y.event.containScroll)}},unbind:{clickaway:function(){y.verbose("Removing clickaway events from context",h),h.off(r)},scrollLock:function(){y.verbose("Removing scroll lock from page"),T.off(r),w.off(r),b.off("scroll"+u)}},add:{inlineCSS:function(){var e=y.cache.width||b.outerWidth(),i=y.cache.height||b.outerHeight(),n=y.is.rtl(),t=y.get.direction(),i={left:e,right:-e,top:i,bottom:-i};n&&(y.verbose("RTL detected, flipping widths"),i.left=-e,i.right=e),n="<style>","left"===t||"right"===t?(y.debug("Adding CSS rules for animation distance",e),n+=" .ui.visible."+t+".sidebar ~ .fixed, .ui.visible."+t+".sidebar ~ .pusher {   -webkit-transform: translate3d("+i[t]+"px, 0, 0);           transform: translate3d("+i[t]+"px, 0, 0); }"):"top"!==t&&"bottom"!=t||(n+=" .ui.visible."+t+".sidebar ~ .fixed, .ui.visible."+t+".sidebar ~ .pusher {   -webkit-transform: translate3d(0, "+i[t]+"px, 0);           transform: translate3d(0, "+i[t]+"px, 0); }"),y.is.ie()&&("left"===t||"right"===t?(y.debug("Adding CSS rules for animation distance",e),n+=" body.pushable > .ui.visible."+t+".sidebar ~ .pusher:after {   -webkit-transform: translate3d("+i[t]+"px, 0, 0);           transform: translate3d("+i[t]+"px, 0, 0); }"):"top"!==t&&"bottom"!=t||(n+=" body.pushable > .ui.visible."+t+".sidebar ~ .pusher:after {   -webkit-transform: translate3d(0, "+i[t]+"px, 0);           transform: translate3d(0, "+i[t]+"px, 0); }"),n+=" body.pushable > .ui.visible.left.sidebar ~ .ui.visible.right.sidebar ~ .pusher:after, body.pushable > .ui.visible.right.sidebar ~ .ui.visible.left.sidebar ~ .pusher:after {   -webkit-transform: translate3d(0px, 0, 0);           transform: translate3d(0px, 0, 0); }"),o=D(n+="</style>").appendTo(S),y.debug("Adding sizing css to head",o)}},refresh:function(){y.verbose("Refreshing selector cache"),h=D(a.context),m=h.children(n.sidebar),g=h.children(n.pusher),h.children(n.fixed),y.clear.cache()},refreshSidebars:function(){y.verbose("Refreshing other sidebars"),m=h.children(n.sidebar)},repaint:function(){y.verbose("Forcing repaint event"),v.style.display="none";v.offsetHeight;v.scrollTop=v.scrollTop,v.style.display=""},setup:{cache:function(){y.cache={width:b.outerWidth(),height:b.outerHeight(),rtl:"rtl"==b.css("direction")}},layout:function(){0===h.children(n.pusher).length&&(y.debug("Adding wrapper element for sidebar"),y.error(d.pusher),g=D('<div class="pusher" />'),h.children().not(n.omitted).not(m).wrapAll(g),y.refresh()),0!==b.nextAll(n.pusher).length&&b.nextAll(n.pusher)[0]===g[0]||(y.debug("Moved sidebar to correct parent element"),y.error(d.movedSidebar,v),b.detach().prependTo(h),y.refresh()),y.clear.cache(),y.set.pushable(),y.set.direction()}},attachEvents:function(e,i){var n=D(e);i=D.isFunction(y[i])?y[i]:y.toggle,0<n.length?(y.debug("Attaching sidebar events to element",e,i),n.on("click"+u,i)):y.error(d.notFound,e)},show:function(e){if(e=D.isFunction(e)?e:function(){},y.is.hidden()){if(y.refreshSidebars(),a.overlay&&(y.error(d.overlay),a.transition="overlay"),y.refresh(),y.othersActive())if(y.debug("Other sidebars currently visible"),a.exclusive){if("overlay"!=a.transition)return void y.hideOthers(y.show);y.hideOthers()}else a.transition="overlay";y.pushPage(function(){e.call(v),a.onShow.call(v)}),a.onChange.call(v),a.onVisible.call(v)}else y.debug("Sidebar is already visible")},hide:function(e){e=D.isFunction(e)?e:function(){},(y.is.visible()||y.is.animating())&&(y.debug("Hiding sidebar",e),y.refreshSidebars(),y.pullPage(function(){e.call(v),a.onHidden.call(v)}),a.onChange.call(v),a.onHide.call(v))},othersAnimating:function(){return 0<m.not(b).filter("."+l.animating).length},othersVisible:function(){return 0<m.not(b).filter("."+l.visible).length},othersActive:function(){return y.othersVisible()||y.othersAnimating()},hideOthers:function(e){var i=m.not(b).filter("."+l.visible),n=i.length,t=0;e=e||function(){},i.sidebar("hide",function(){++t==n&&e()})},toggle:function(){y.verbose("Determining toggled direction"),y.is.hidden()?y.show():y.hide()},pushPage:function(i){var e,n,t=y.get.transition(),o="overlay"===t||y.othersActive()?b:g;i=D.isFunction(i)?i:function(){},"scale down"==a.transition&&y.scrollToTop(),y.set.transition(t),y.repaint(),e=function(){y.bind.clickaway(),y.add.inlineCSS(),y.set.animating(),y.set.visible()},t=function(){y.set.dimmed()},n=function(e){e.target==o[0]&&(o.off(s+r,n),y.remove.animating(),y.bind.scrollLock(),i.call(v))},o.off(s+r),o.on(s+r,n),M(e),a.dimPage&&!y.othersVisible()&&M(t)},pullPage:function(i){var e,n,t=y.get.transition(),o="overlay"==t||y.othersActive()?b:g;i=D.isFunction(i)?i:function(){},y.verbose("Removing context push state",y.get.direction()),y.unbind.clickaway(),y.unbind.scrollLock(),e=function(){y.set.transition(t),y.set.animating(),y.remove.visible(),a.dimPage&&!y.othersVisible()&&g.removeClass(l.dimmed)},n=function(e){e.target==o[0]&&(o.off(s+r,n),y.remove.animating(),y.remove.transition(),y.remove.inlineCSS(),("scale down"==t||a.returnScroll&&y.is.mobile())&&y.scrollBack(),i.call(v))},o.off(s+r),o.on(s+r,n),M(e)},scrollToTop:function(){y.verbose("Scrolling to top of page to avoid animation issues"),i=D(j).scrollTop(),b.scrollTop(0),j.scrollTo(0,0)},scrollBack:function(){y.verbose("Scrolling back to original page position"),j.scrollTo(0,i)},clear:{cache:function(){y.verbose("Clearing cached dimensions"),y.cache={}}},set:{ios:function(){x.addClass(l.ios)},pushed:function(){h.addClass(l.pushed)},pushable:function(){h.addClass(l.pushable)},dimmed:function(){g.addClass(l.dimmed)},active:function(){b.addClass(l.active)},animating:function(){b.addClass(l.animating)},transition:function(e){e=e||y.get.transition(),b.addClass(e)},direction:function(e){e=e||y.get.direction(),b.addClass(l[e])},visible:function(){b.addClass(l.visible)},overlay:function(){b.addClass(l.overlay)}},remove:{inlineCSS:function(){y.debug("Removing inline css styles",o),o&&0<o.length&&o.remove()},ios:function(){x.removeClass(l.ios)},pushed:function(){h.removeClass(l.pushed)},pushable:function(){h.removeClass(l.pushable)},active:function(){b.removeClass(l.active)},animating:function(){b.removeClass(l.animating)},transition:function(e){e=e||y.get.transition(),b.removeClass(e)},direction:function(e){e=e||y.get.direction(),b.removeClass(l[e])},visible:function(){b.removeClass(l.visible)},overlay:function(){b.removeClass(l.overlay)}},get:{direction:function(){return b.hasClass(l.top)?l.top:b.hasClass(l.right)?l.right:b.hasClass(l.bottom)?l.bottom:l.left},transition:function(){var e=y.get.direction(),e=y.is.mobile()?"auto"==a.mobileTransition?a.defaultTransition.mobile[e]:a.mobileTransition:"auto"==a.transition?a.defaultTransition.computer[e]:a.transition;return y.verbose("Determined transition",e),e},transitionEvent:function(){var e,i=R.createElement("element"),n={transition:"transitionend",OTransition:"oTransitionEnd",MozTransition:"transitionend",WebkitTransition:"webkitTransitionEnd"};for(e in n)if(i.style[e]!==z)return n[e]}},is:{ie:function(){var e=!j.ActiveXObject&&"ActiveXObject"in j,i="ActiveXObject"in j;return e||i},ios:function(){var e=navigator.userAgent,i=e.match(c.ios),n=e.match(c.mobileChrome);return!(!i||n)&&(y.verbose("Browser was found to be iOS",e),!0)},mobile:function(){var e=navigator.userAgent;return e.match(c.mobile)?(y.verbose("Browser was found to be mobile",e),!0):(y.verbose("Browser is not mobile, using regular transition",e),!1)},hidden:function(){return!y.is.visible()},visible:function(){return b.hasClass(l.visible)},open:function(){return y.is.visible()},closed:function(){return y.is.hidden()},vertical:function(){return b.hasClass(l.top)},animating:function(){return h.hasClass(l.animating)},rtl:function(){return y.cache.rtl===z&&(y.cache.rtl="rtl"==b.css("direction")),y.cache.rtl}},setting:function(e,i){if(y.debug("Changing setting",e,i),D.isPlainObject(e))D.extend(!0,a,e);else{if(i===z)return a[e];D.isPlainObject(a[e])?D.extend(!0,a[e],i):a[e]=i}},internal:function(e,i){if(D.isPlainObject(e))D.extend(!0,y,e);else{if(i===z)return y[e];y[e]=i}},debug:function(){!a.silent&&a.debug&&(a.performance?y.performance.log(arguments):(y.debug=Function.prototype.bind.call(console.info,console,a.name+":"),y.debug.apply(console,arguments)))},verbose:function(){!a.silent&&a.verbose&&a.debug&&(a.performance?y.performance.log(arguments):(y.verbose=Function.prototype.bind.call(console.info,console,a.name+":"),y.verbose.apply(console,arguments)))},error:function(){a.silent||(y.error=Function.prototype.bind.call(console.error,console,a.name+":"),y.error.apply(console,arguments))},performance:{log:function(e){var i,n;a.performance&&(n=(i=(new Date).getTime())-(F||i),F=i,O.push({Name:e[0],Arguments:[].slice.call(e,1)||"",Element:v,"Execution Time":n})),clearTimeout(y.performance.timer),y.performance.timer=setTimeout(y.performance.display,500)},display:function(){var e=a.name+":",n=0;F=!1,clearTimeout(y.performance.timer),D.each(O,function(e,i){n+=i["Execution Time"]}),e+=" "+n+"ms",A&&(e+=" '"+A+"'"),(console.group!==z||console.table!==z)&&0<O.length&&(console.groupCollapsed(e),console.table?console.table(O):D.each(O,function(e,i){console.log(i.Name+": "+i["Execution Time"]+"ms")}),console.groupEnd()),O=[]}},invoke:function(t,e,i){var o,r,n,s=p;return e=e||H,i=v||i,"string"==typeof t&&s!==z&&(t=t.split(/[\. ]/),o=t.length-1,D.each(t,function(e,i){var n=e!=o?i+t[e+1].charAt(0).toUpperCase()+t[e+1].slice(1):t;if(D.isPlainObject(s[n])&&e!=o)s=s[n];else{if(s[n]!==z)return r=s[n],!1;{if(!D.isPlainObject(s[i])||e==o)return s[i]!==z?r=s[i]:y.error(d.method,t),!1;s=s[i]}}})),D.isFunction(r)?n=r.apply(i,e):r!==z&&(n=r),D.isArray(k)?k.push(n):k!==z?k=[k,n]:n!==z&&(k=n),r}};E?(p===z&&y.initialize(),y.invoke(P)):(p!==z&&y.invoke("destroy"),y.initialize())}),k!==z?k:this},D.fn.sidebar.settings={name:"Sidebar",namespace:"sidebar",silent:!1,debug:!1,verbose:!1,performance:!0,transition:"auto",mobileTransition:"auto",defaultTransition:{computer:{left:"uncover",right:"uncover",top:"overlay",bottom:"overlay"},mobile:{left:"uncover",right:"uncover",top:"overlay",bottom:"overlay"}},context:"body",exclusive:!1,closable:!0,dimPage:!0,scrollLock:!1,returnScroll:!1,delaySetup:!1,duration:500,onChange:function(){},onShow:function(){},onHide:function(){},onHidden:function(){},onVisible:function(){},className:{active:"active",animating:"animating",dimmed:"dimmed",ios:"ios",pushable:"pushable",pushed:"pushed",right:"right",top:"top",left:"left",bottom:"bottom",visible:"visible"},selector:{fixed:".fixed",omitted:"script, link, style, .ui.modal, .ui.dimmer, .ui.nag, .ui.fixed",pusher:".pusher",sidebar:".ui.sidebar"},regExp:{ios:/(iPad|iPhone|iPod)/g,mobileChrome:/(CriOS)/g,mobile:/Mobile|iP(hone|od|ad)|Android|BlackBerry|IEMobile|Kindle|NetFront|Silk-Accelerated|(hpw|web)OS|Fennec|Minimo|Opera M(obi|ini)|Blazer|Dolfin|Dolphin|Skyfire|Zune/g},error:{method:"The method you called is not defined.",pusher:"Had to add pusher element. For optimal performance make sure body content is inside a pusher element",movedSidebar:"Had to move sidebar. For optimal performance make sure sidebar and pusher are direct children of your body tag",overlay:"The overlay setting is no longer supported, use animation: overlay",notFound:"There were no elements that matched the specified selector"}}}(jQuery,window,document);