!function(C,n,A,S){"use strict";n=void 0!==n&&n.Math==Math?n:"undefined"!=typeof self&&self.Math==Math?self:Function("return this")(),C.fn.transition=function(){var f,r=C(this),p=r.selector||"",g=(new Date).getTime(),v=[],b=arguments,y=b[0],h=[].slice.call(arguments,1),w="string"==typeof y;n.requestAnimationFrame||n.mozRequestAnimationFrame||n.webkitRequestAnimationFrame||n.msRequestAnimationFrame;return r.each(function(i){var l,s,e,u,t,a,n,o,c=C(this),d=this,m={initialize:function(){l=m.get.settings.apply(d,b),u=l.className,e=l.error,t=l.metadata,o="."+l.namespace,n="module-"+l.namespace,s=c.data(n)||m,a=m.get.animationEndEvent(),!1===(w=w&&m.invoke(y))&&(m.verbose("Converted arguments into settings object",l),l.interval?m.delay(l.animate):m.animate(),m.instantiate())},instantiate:function(){m.verbose("Storing instance of module",m),s=m,c.data(n,s)},destroy:function(){m.verbose("Destroying previous module for",d),c.removeData(n)},refresh:function(){m.verbose("Refreshing display type on next animation"),delete m.displayType},forceRepaint:function(){m.verbose("Forcing element repaint");var n=c.parent(),e=c.next();0===e.length?c.detach().appendTo(n):c.detach().insertBefore(e)},repaint:function(){m.verbose("Repainting element");d.offsetWidth},delay:function(n){var e=(e=m.get.animationDirection())||(m.can.transition()?m.get.direction():"static");n=n!==S?n:l.interval,e="auto"==l.reverse&&e==u.outward||1==l.reverse?(r.length-i)*l.interval:i*l.interval,m.debug("Delaying animation by",e),setTimeout(m.animate,e)},animate:function(n){if(l=n||l,!m.is.supported())return m.error(e.support),!1;if(m.debug("Preparing animation",l.animation),m.is.animating()){if(l.queue)return!l.allowRepeats&&m.has.direction()&&m.is.occurring()&&!0!==m.queuing?m.debug("Animation is currently occurring, preventing queueing same animation",l.animation):m.queue(l.animation),!1;if(!l.allowRepeats&&m.is.occurring())return m.debug("Animation is already occurring, will not execute repeated animation",l.animation),!1;m.debug("New animation started, completing previous early",l.animation),s.complete()}m.can.animate()?m.set.animating(l.animation):m.error(e.noAnimation,l.animation,d)},reset:function(){m.debug("Resetting animation to beginning conditions"),m.remove.animationCallbacks(),m.restore.conditions(),m.remove.animating()},queue:function(n){m.debug("Queueing animation of",n),m.queuing=!0,c.one(a+".queue"+o,function(){m.queuing=!1,m.repaint(),m.animate.apply(this,l)})},complete:function(n){m.debug("Animation complete",l.animation),m.remove.completeCallback(),m.remove.failSafe(),m.is.looping()||(m.is.outward()?(m.verbose("Animation is outward, hiding element"),m.restore.conditions(),m.hide()):m.is.inward()?(m.verbose("Animation is outward, showing element"),m.restore.conditions(),m.show()):(m.verbose("Static animation completed"),m.restore.conditions(),l.onComplete.call(d)))},force:{visible:function(){var n=c.attr("style"),e=m.get.userStyle(),i=m.get.displayType(),t=e+"display: "+i+" !important;",e=c.css("display"),n=n===S||""===n;e!==i?(m.verbose("Overriding default display to show element",i),c.attr("style",t)):n&&c.removeAttr("style")},hidden:function(){var n=c.attr("style"),e=c.css("display"),n=n===S||""===n;"none"===e||m.is.hidden()?n&&c.removeAttr("style"):(m.verbose("Overriding default display to hide element"),c.css("display","none"))}},has:{direction:function(n){var i=!1;return"string"==typeof(n=n||l.animation)&&(n=n.split(" "),C.each(n,function(n,e){e!==u.inward&&e!==u.outward||(i=!0)})),i},inlineDisplay:function(){var n=c.attr("style")||"";return C.isArray(n.match(/display.*?;/,""))}},set:{animating:function(n){m.remove.completeCallback(),n=n||l.animation,n=m.get.animationClass(n),m.save.animation(n),m.force.visible(),m.remove.hidden(),m.remove.direction(),m.start.animation(n)},duration:function(n,e){!(e="number"==typeof(e=e||l.duration)?e+"ms":e)&&0!==e||(m.verbose("Setting animation duration",e),c.css({"animation-duration":e}))},direction:function(n){(n=n||m.get.direction())==u.inward?m.set.inward():m.set.outward()},looping:function(){m.debug("Transition set to loop"),c.addClass(u.looping)},hidden:function(){c.addClass(u.transition).addClass(u.hidden)},inward:function(){m.debug("Setting direction to inward"),c.removeClass(u.outward).addClass(u.inward)},outward:function(){m.debug("Setting direction to outward"),c.removeClass(u.inward).addClass(u.outward)},visible:function(){c.addClass(u.transition).addClass(u.visible)}},start:{animation:function(n){n=n||m.get.animationClass(),m.debug("Starting tween",n),c.addClass(n).one(a+".complete"+o,m.complete),l.useFailSafe&&m.add.failSafe(),m.set.duration(l.duration),l.onStart.call(d)}},save:{animation:function(n){m.cache||(m.cache={}),m.cache.animation=n},displayType:function(n){"none"!==n&&c.data(t.displayType,n)},transitionExists:function(n,e){C.fn.transition.exists[n]=e,m.verbose("Saving existence of transition",n,e)}},restore:{conditions:function(){var n=m.get.currentAnimation();n&&(c.removeClass(n),m.verbose("Removing animation class",m.cache)),m.remove.duration()}},add:{failSafe:function(){var n=m.get.duration();m.timer=setTimeout(function(){c.triggerHandler(a)},n+l.failSafeDelay),m.verbose("Adding fail safe timer",m.timer)}},remove:{animating:function(){c.removeClass(u.animating)},animationCallbacks:function(){m.remove.queueCallback(),m.remove.completeCallback()},queueCallback:function(){c.off(".queue"+o)},completeCallback:function(){c.off(".complete"+o)},display:function(){c.css("display","")},direction:function(){c.removeClass(u.inward).removeClass(u.outward)},duration:function(){c.css("animation-duration","")},failSafe:function(){m.verbose("Removing fail safe timer",m.timer),m.timer&&clearTimeout(m.timer)},hidden:function(){c.removeClass(u.hidden)},visible:function(){c.removeClass(u.visible)},looping:function(){m.debug("Transitions are no longer looping"),m.is.looping()&&(m.reset(),c.removeClass(u.looping))},transition:function(){c.removeClass(u.visible).removeClass(u.hidden)}},get:{settings:function(n,e,i){return"object"==typeof n?C.extend(!0,{},C.fn.transition.settings,n):"function"==typeof i?C.extend({},C.fn.transition.settings,{animation:n,onComplete:i,duration:e}):"string"==typeof e||"number"==typeof e?C.extend({},C.fn.transition.settings,{animation:n,duration:e}):"object"==typeof e?C.extend({},C.fn.transition.settings,e,{animation:n}):"function"==typeof e?C.extend({},C.fn.transition.settings,{animation:n,onComplete:e}):C.extend({},C.fn.transition.settings,{animation:n})},animationClass:function(n){var e=n||l.animation,n=m.can.transition()&&!m.has.direction()?m.get.direction()+" ":"";return u.animating+" "+u.transition+" "+n+e},currentAnimation:function(){return!(!m.cache||m.cache.animation===S)&&m.cache.animation},currentDirection:function(){return m.is.inward()?u.inward:u.outward},direction:function(){return m.is.hidden()||!m.is.visible()?u.inward:u.outward},animationDirection:function(n){var i;return"string"==typeof(n=n||l.animation)&&(n=n.split(" "),C.each(n,function(n,e){e===u.inward?i=u.inward:e===u.outward&&(i=u.outward)})),i||!1},duration:function(n){return"string"==typeof(n=!1===(n=n||l.duration)?c.css("animation-duration")||0:n)?-1<n.indexOf("ms")?parseFloat(n):1e3*parseFloat(n):n},displayType:function(n){return l.displayType||((n=n===S||n)&&c.data(t.displayType)===S&&m.can.transition(!0),c.data(t.displayType))},userStyle:function(n){return(n=n||c.attr("style")||"").replace(/display.*?;/,"")},transitionExists:function(n){return C.fn.transition.exists[n]},animationStartEvent:function(){var n,e=A.createElement("div"),i={animation:"animationstart",OAnimation:"oAnimationStart",MozAnimation:"mozAnimationStart",WebkitAnimation:"webkitAnimationStart"};for(n in i)if(e.style[n]!==S)return i[n];return!1},animationEndEvent:function(){var n,e=A.createElement("div"),i={animation:"animationend",OAnimation:"oAnimationEnd",MozAnimation:"mozAnimationEnd",WebkitAnimation:"webkitAnimationEnd"};for(n in i)if(e.style[n]!==S)return i[n];return!1}},can:{transition:function(n){var e,i,t,a,o=l.animation,r=m.get.transitionExists(o),s=m.get.displayType(!1);if(r===S||n){if(m.verbose("Determining whether animation exists"),e=c.attr("class"),t=c.prop("tagName"),n=(i=C("<"+t+" />").addClass(e).insertAfter(c)).addClass(o).removeClass(u.inward).removeClass(u.outward).addClass(u.animating).addClass(u.transition).css("animationName"),t=i.addClass(u.inward).css("animationName"),s||(s=i.attr("class",e).removeAttr("style").removeClass(u.hidden).removeClass(u.visible).show().css("display"),m.verbose("Determining final display state",s),m.save.displayType(s)),i.remove(),n!=t)m.debug("Direction exists for animation",o),a=!0;else{if("none"==n||!n)return void m.debug("No animation defined in css",o);m.debug("Static animation found",o,s),a=!1}m.save.transitionExists(o,a)}return r!==S?r:a},animate:function(){return m.can.transition()!==S}},is:{animating:function(){return c.hasClass(u.animating)},inward:function(){return c.hasClass(u.inward)},outward:function(){return c.hasClass(u.outward)},looping:function(){return c.hasClass(u.looping)},occurring:function(n){return n="."+(n=n||l.animation).replace(" ","."),0<c.filter(n).length},visible:function(){return c.is(":visible")},hidden:function(){return"hidden"===c.css("visibility")},supported:function(){return!1!==a}},hide:function(){m.verbose("Hiding element"),m.is.animating()&&m.reset(),d.blur(),m.remove.display(),m.remove.visible(),m.set.hidden(),m.force.hidden(),l.onHide.call(d),l.onComplete.call(d)},show:function(n){m.verbose("Showing element",n),m.remove.hidden(),m.set.visible(),m.force.visible(),l.onShow.call(d),l.onComplete.call(d)},toggle:function(){m.is.visible()?m.hide():m.show()},stop:function(){m.debug("Stopping current animation"),c.triggerHandler(a)},stopAll:function(){m.debug("Stopping all animation"),m.remove.queueCallback(),c.triggerHandler(a)},clear:{queue:function(){m.debug("Clearing animation queue"),m.remove.queueCallback()}},enable:function(){m.verbose("Starting animation"),c.removeClass(u.disabled)},disable:function(){m.debug("Stopping animation"),c.addClass(u.disabled)},setting:function(n,e){if(m.debug("Changing setting",n,e),C.isPlainObject(n))C.extend(!0,l,n);else{if(e===S)return l[n];C.isPlainObject(l[n])?C.extend(!0,l[n],e):l[n]=e}},internal:function(n,e){if(C.isPlainObject(n))C.extend(!0,m,n);else{if(e===S)return m[n];m[n]=e}},debug:function(){!l.silent&&l.debug&&(l.performance?m.performance.log(arguments):(m.debug=Function.prototype.bind.call(console.info,console,l.name+":"),m.debug.apply(console,arguments)))},verbose:function(){!l.silent&&l.verbose&&l.debug&&(l.performance?m.performance.log(arguments):(m.verbose=Function.prototype.bind.call(console.info,console,l.name+":"),m.verbose.apply(console,arguments)))},error:function(){l.silent||(m.error=Function.prototype.bind.call(console.error,console,l.name+":"),m.error.apply(console,arguments))},performance:{log:function(n){var e,i;l.performance&&(i=(e=(new Date).getTime())-(g||e),g=e,v.push({Name:n[0],Arguments:[].slice.call(n,1)||"",Element:d,"Execution Time":i})),clearTimeout(m.performance.timer),m.performance.timer=setTimeout(m.performance.display,500)},display:function(){var n=l.name+":",i=0;g=!1,clearTimeout(m.performance.timer),C.each(v,function(n,e){i+=e["Execution Time"]}),n+=" "+i+"ms",p&&(n+=" '"+p+"'"),1<r.length&&(n+=" ("+r.length+")"),(console.group!==S||console.table!==S)&&0<v.length&&(console.groupCollapsed(n),console.table?console.table(v):C.each(v,function(n,e){console.log(e.Name+": "+e["Execution Time"]+"ms")}),console.groupEnd()),v=[]}},invoke:function(t,n,e){var a,o,i,r=s;return n=n||h,e=d||e,"string"==typeof t&&r!==S&&(t=t.split(/[\. ]/),a=t.length-1,C.each(t,function(n,e){var i=n!=a?e+t[n+1].charAt(0).toUpperCase()+t[n+1].slice(1):t;if(C.isPlainObject(r[i])&&n!=a)r=r[i];else{if(r[i]!==S)return o=r[i],!1;{if(!C.isPlainObject(r[e])||n==a)return r[e]!==S&&(o=r[e]),!1;r=r[e]}}})),C.isFunction(o)?i=o.apply(e,n):o!==S&&(i=o),C.isArray(f)?f.push(i):f!==S?f=[f,i]:i!==S&&(f=i),o!==S&&o}};m.initialize()}),f!==S?f:this},C.fn.transition.exists={},C.fn.transition.settings={name:"Transition",silent:!1,debug:!1,verbose:!1,performance:!0,namespace:"transition",interval:0,reverse:"auto",onStart:function(){},onComplete:function(){},onShow:function(){},onHide:function(){},useFailSafe:!0,failSafeDelay:100,allowRepeats:!1,displayType:!1,animation:"fade",duration:!1,queue:!0,metadata:{displayType:"display"},className:{animating:"animating",disabled:"disabled",hidden:"hidden",inward:"in",loading:"loading",looping:"looping",outward:"out",transition:"transition",visible:"visible"},error:{noAnimation:"Element is no longer attached to DOM. Unable to animate.  Use silent setting to surpress this warning in production.",repeated:"That animation is already occurring, cancelling repeated animation",method:"The method you called is not defined",support:"This browser does not support CSS animations"}}}(jQuery,window,document);