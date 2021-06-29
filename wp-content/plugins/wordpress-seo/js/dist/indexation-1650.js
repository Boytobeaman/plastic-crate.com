!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=351)}({0:function(e,t){e.exports=window.wp.element},1:function(e,t){e.exports=window.yoast.propTypes},11:function(e,t){e.exports=function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}},13:function(e,t,n){var r=n(79);e.exports=function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&r(e,t)}},14:function(e,t,n){var r=n(34),o=n(11);e.exports=function(e,t){return!t||"object"!==r(t)&&"function"!=typeof t?o(e):t}},21:function(e,t){e.exports=window.jQuery},24:function(e,t){e.exports=window.yoast.styleGuide},26:function(e,t){e.exports=window.regeneratorRuntime},3:function(e,t){e.exports=window.wp.i18n},34:function(e,t){function n(t){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?e.exports=n=function(e){return typeof e}:e.exports=n=function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},n(t)}e.exports=n},351:function(e,t,n){"use strict";n.r(t);var r=n(0),o=n(21),i=n.n(o),s=n(47),a=n.n(s),c=n(5),u=n.n(c),d=n(6),p=n.n(d),f=n(11),l=n.n(f),x=n(13),y=n.n(x),h=n(14),g=n.n(h),w=n(8),m=n.n(w),b=n(26),v=n.n(b),O=n(3),j=n(7),k=n(24),S=n(1),I=n.n(S);var _=function(e){y()(h,e);var t,n,o,i,s,c,d,f,x=(d=h,f=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}(),function(){var e,t=m()(d);if(f){var n=m()(this).constructor;e=Reflect.construct(t,arguments,n)}else e=t.apply(this,arguments);return g()(this,e)});function h(e){var t;return u()(this,h),(t=x.call(this,e)).settings=yoastIndexingData,t.state={state:"idle",processed:0,amount:parseInt(t.settings.amount,10),firstTime:"1"===t.settings.firstTime},t.startIndexing=t.startIndexing.bind(l()(t)),t.stopIndexing=t.stopIndexing.bind(l()(t)),t}return p()(h,[{key:"doIndexingRequest",value:(c=a()(v.a.mark((function e(t,n){var r,o;return v.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,fetch(t,{method:"POST",headers:{"X-WP-Nonce":n}});case 2:return r=e.sent,e.next=5,r.json();case 5:if(o=e.sent,r.ok){e.next=8;break}throw new Error(o.message);case 8:return e.abrupt("return",o);case 9:case"end":return e.stop()}}),e)}))),function(_x,e){return c.apply(this,arguments)})},{key:"doPreIndexingAction",value:(s=a()(v.a.mark((function e(t){return v.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if("function"!=typeof this.props.preIndexingActions[t]){e.next=3;break}return e.next=3,this.props.preIndexingActions[t](this.settings);case 3:case"end":return e.stop()}}),e,this)}))),function(e){return s.apply(this,arguments)})},{key:"doPostIndexingAction",value:(i=a()(v.a.mark((function e(t,n){return v.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if("function"!=typeof this.props.indexingActions[t]){e.next=3;break}return e.next=3,this.props.indexingActions[t](n.objects,this.settings);case 3:case"end":return e.stop()}}),e,this)}))),function(e,t){return i.apply(this,arguments)})},{key:"doIndexing",value:(o=a()(v.a.mark((function e(t){var n,r=this;return v.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:n=this.settings.restApi.root+this.settings.restApi.endpoints[t];case 1:if(!this.isState("in_progress")||!1===n){e.next=11;break}return e.prev=2,e.delegateYield(v.a.mark((function e(){var o;return v.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,r.doPreIndexingAction(t);case 2:return e.next=4,r.doIndexingRequest(n,r.settings.restApi.nonce);case 4:return o=e.sent,e.next=7,r.doPostIndexingAction(t,o);case 7:r.setState((function(e){return{processed:e.processed+o.objects.length,firstTime:!1}})),n=o.next_url;case 9:case"end":return e.stop()}}),e)}))(),"t0",4);case 4:e.next=9;break;case 6:e.prev=6,e.t1=e.catch(2),this.setState({state:"errored",firstTime:!1});case 9:e.next=1;break;case 11:case"end":return e.stop()}}),e,this,[[2,6]])}))),function(e){return o.apply(this,arguments)})},{key:"index",value:(n=a()(v.a.mark((function e(){var t,n,r;return v.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:t=0,n=Object.keys(this.settings.restApi.endpoints);case 1:if(!(t<n.length)){e.next=8;break}return r=n[t],e.next=5,this.doIndexing(r);case 5:t++,e.next=1;break;case 8:this.isState("errored")||this.isState("idle")||this.completeIndexing();case 9:case"end":return e.stop()}}),e,this)}))),function(){return n.apply(this,arguments)})},{key:"startIndexing",value:(t=a()(v.a.mark((function e(){return v.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:this.setState({processed:0,state:"in_progress"},this.index);case 1:case"end":return e.stop()}}),e,this)}))),function(){return t.apply(this,arguments)})},{key:"completeIndexing",value:function(){this.setState({state:"completed"})}},{key:"stopIndexing",value:function(){this.setState((function(e){return{state:"idle",processed:0,amount:e.amount-e.processed}}))}},{key:"componentDidMount",value:function(){var e,t;if(!this.settings.disabled&&"true"===new URLSearchParams(window.location.search).get("start-indexation")){var n=function(e,t){var n=new URL(e);return n.searchParams.delete("start-indexation"),n.href}(window.location.href);null,e=document.title,t=n,window.history.pushState(null,e,t),this.startIndexing()}}},{key:"isState",value:function(e){return this.state.state===e}},{key:"renderFirstIndexationNotice",value:function(){return Object(r.createElement)(j.Alert,{type:"info"},Object(O.__)("This feature includes and replaces the Text Link Counter and Internal Linking Analysis","wordpress-seo"))}},{key:"renderStartButton",value:function(){return Object(r.createElement)(j.NewButton,{variant:"primary",onClick:this.startIndexing},Object(O.__)("Start SEO data optimization","wordpress-seo"))}},{key:"renderStopButton",value:function(){return Object(r.createElement)(j.NewButton,{variant:"secondary",onClick:this.stopIndexing},Object(O.__)("Stop SEO data optimization","wordpress-seo"))}},{key:"renderDisabledTool",value:function(){return Object(r.createElement)(r.Fragment,null,Object(r.createElement)("p",null,Object(r.createElement)(j.NewButton,{variant:"secondary",disabled:!0},Object(O.__)("Start SEO data optimization","wordpress-seo"))),Object(r.createElement)(j.Alert,{type:"info"},Object(O.__)("SEO data optimization is disabled for non-production environments.","wordpress-seo")))}},{key:"renderProgressBar",value:function(){return Object(r.createElement)(r.Fragment,null,Object(r.createElement)(j.ProgressBar,{style:{height:"16px",margin:"8px 0"},progressColor:k.colors.$color_pink_dark,max:parseInt(this.state.amount,10),value:this.state.processed}),Object(r.createElement)("p",{style:{color:k.colors.$palette_grey_text}},Object(O.__)("Optimizing SEO data... This may take a while.","wordpress-seo")))}},{key:"renderErrorAlert",value:function(){return Object(r.createElement)(j.Alert,{type:"error"},Object(O.__)("Oops, something has gone wrong and we couldn't complete the optimization of your SEO data. Please click the button again to re-start the process.","wordpress-seo"))}},{key:"renderTool",value:function(){return Object(r.createElement)(r.Fragment,null,this.isState("in_progress")&&this.renderProgressBar(),this.isState("errored")&&this.renderErrorAlert(),this.isState("idle")&&this.state.firstTime&&this.renderFirstIndexationNotice(),this.isState("in_progress")?this.renderStopButton():this.renderStartButton())}},{key:"render",value:function(){return this.settings.disabled?this.renderDisabledTool():this.isState("completed")||0===this.state.amount?Object(r.createElement)(j.Alert,{type:"success"},Object(O.__)("SEO data optimization complete","wordpress-seo")):this.renderTool()}}]),h}(r.Component);_.propTypes={indexingActions:I.a.object,preIndexingActions:I.a.object},_.defaultProps={indexingActions:{},preIndexingActions:{}};var A,P=_,E={},T={};function B(){A||(A=document.getElementById("yoast-seo-indexing-action")),A&&Object(r.render)(Object(r.createElement)(P,{preIndexingActions:E,indexingActions:T}),A)}window.yoast=window.yoast||{},window.yoast.indexing=window.yoast.indexing||{},window.yoast.indexing.registerPreIndexingAction=function(e,t){E[e]=t,B()},window.yoast.indexing.registerIndexingAction=function(e,t){T[e]=t,B()},window.yoast.indexation=window.yoast.indexing,window.yoast.indexation.registerPreIndexationAction=function(e,t){console.warn("Deprecated since 15.1. Use 'window.yoast.indexing.registerPreIndexingAction' instead."),window.yoast.indexing.registerPreIndexingAction(e,t)},window.yoast.indexation.registerIndexationAction=function(e,t){console.warn("Deprecated since 15.1. Use 'window.yoast.indexing.registerIndexingAction' instead."),window.yoast.indexing.registerIndexingAction(e,t)},i()((function(){B()}))},47:function(e,t){function n(e,t,n,r,o,i,s){try{var a=e[i](s),c=a.value}catch(e){return void n(e)}a.done?t(c):Promise.resolve(c).then(r,o)}e.exports=function(e){return function(){var t=this,r=arguments;return new Promise((function(o,i){var s=e.apply(t,r);function a(e){n(s,o,i,a,c,"next",e)}function c(e){n(s,o,i,a,c,"throw",e)}a(void 0)}))}}},5:function(e,t){e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}},6:function(e,t){function n(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}e.exports=function(e,t,r){return t&&n(e.prototype,t),r&&n(e,r),e}},7:function(e,t){e.exports=window.yoast.componentsNew},79:function(e,t){function n(t,r){return e.exports=n=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},n(t,r)}e.exports=n},8:function(e,t){function n(t){return e.exports=n=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},n(t)}e.exports=n}});