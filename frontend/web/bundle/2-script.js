!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=2)}({2:function(e,t,r){"use strict";var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};(window.webpackJsonp=window.webpackJsonp||[]).push([[2],{527:function(e,t,r){Object.defineProperty(t,"__esModule",{value:!0});var n=r(532);Object.defineProperty(t,"default",{enumerable:!0,get:function(){return(e=n,e&&e.__esModule?e:{default:e}).default;var e}})},530:function(e,t,r){Object.defineProperty(t,"__esModule",{value:!0});var n=s(r(536)),o=s(r(81)),u=s(r(107)),a=s(r(108)),i=s(r(109)),l=s(r(110)),f=s(r(111)),d=r(3),c=(s(d),s(r(531)));function s(e){return e&&e.__esModule?e:{default:e}}var p=(0,o.default)("p",{},void 0,"If you see this screen, it means you are all setup \\o/"),v=(0,o.default)("p",{},void 0,"The following JSON are showing contents coming from Redux, Saga and Config."),h=(0,o.default)("div",{}),y=function(e){function t(){return(0,a.default)(this,t),(0,l.default)(this,(t.__proto__||(0,u.default)(t)).apply(this,arguments))}return(0,f.default)(t,e),(0,i.default)(t,[{key:"render",value:function(){var e=this.props.example,t=e&&e.result||null;return t?(0,o.default)("div",{className:c.default.exampleOutput},void 0,(0,o.default)("h1",{},void 0,"Let's Get",(0,o.default)("span",{className:c.default.emphasize},void 0,"Started")),p,v,(0,o.default)("pre",{},void 0,(0,n.default)(t,void 0,2))):h}}]),t}(d.PureComponent);t.default=y},531:function(e,t,r){e.exports={exampleOutput:"Example__exampleOutput_S3lKCTuZ_bkNollEk9xVi",emphasize:"Example__emphasize_2T0_lblNMRS-y1saJ40CpT"}},532:function(e,t,r){Object.defineProperty(t,"__esModule",{value:!0});var n,o=y(r(81)),u=y(r(107)),a=y(r(108)),i=y(r(109)),l=y(r(110)),f=y(r(111)),d=y(r(225)),c=r(3),s=(y(c),y(r(2)),r(226)),p=y(r(224)),v=r(161),h=r(533);function y(e){return e&&e.__esModule?e:{default:e}}r(535),r(539),y(r(541)),(0,p.default)(function(){return Promise.resolve().then(r.t.bind(null,530,7))});var m=(0,d.default)({},v.actions),_=(0,o.default)("div",{className:"container"},void 0,(0,o.default)("div",{className:"row"},void 0,(0,o.default)("div",{className:"col-lg-12"},void 0,(0,o.default)("h1",{},void 0,"Budapest River Cruise")),(0,o.default)("div",{className:"col-lg-12"},void 0,"Welcome to Budapest, in the heart of Europe, in the middle of a fairy tale! Budapest is one of the most mystic, enchanted and romantic cities along the Danube river. As the capital of Hungary, this is a centre of everything you want to find in this welcoming country. At the same time, like the heart of Europe, you will find Budapest in a lovely, caothic way as in the East, a little precise, like on the West, as modern as the North with a little touch of the Souths. Join as and we will show you this fabolous side of the capital, while floating on the Danube river, underneath the Bridges, and you will be able to admire the panoramic view and the most famous places of Budapest."))),b=(0,s.connect)(function(e){return{example:(0,h.exampleSelector)(e)}},m)(n=function(e){function t(){return(0,a.default)(this,t),(0,l.default)(this,(t.__proto__||(0,u.default)(t)).apply(this,arguments))}return(0,f.default)(t,e),(0,i.default)(t,[{key:"componentDidMount",value:function(){(0,this.props.getAwesomeCode)()}},{key:"render",value:function(){return _}}]),t}(c.Component))||n;t.default=b},533:function(e,t,r){Object.defineProperty(t,"__esModule",{value:!0}),t.exampleSelector=void 0;var n=(0,r(534).createSelector)(function(e){return e.example},function(e){return e.get("result")});t.exampleSelector=function(e){return{result:n(e)}}},534:function(e,t,r){function o(e,t){return e===t}function u(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:o,r=null,n=null;return function(){return function(e,t,r){if(null===t||null===r||t.length!==r.length)return!1;for(var n=t.length,o=0;o<n;o++)if(!e(t[o],r[o]))return!1;return!0}(t,r,arguments)||(n=e.apply(null,arguments)),r=arguments,n}}function a(e){for(var t=arguments.length,r=Array(t>1?t-1:0),o=1;o<t;o++)r[o-1]=arguments[o];return function(){for(var t=arguments.length,o=Array(t),u=0;u<t;u++)o[u]=arguments[u];var a=0,i=o.pop(),l=function(e){var t=Array.isArray(e[0])?e[0]:e;if(!t.every(function(e){return"function"==typeof e})){var r=t.map(function(e){return void 0===e?"undefined":n(e)}).join(", ");throw new Error("Selector creators expect all input-selectors to be functions, instead received the following types: ["+r+"]")}return t}(o),f=e.apply(void 0,[function(){return a++,i.apply(null,arguments)}].concat(r)),d=e(function(){for(var e=[],t=l.length,r=0;r<t;r++)e.push(l[r].apply(null,arguments));return f.apply(null,e)});return d.resultFunc=i,d.dependencies=l,d.recomputations=function(){return a},d.resetRecomputations=function(){return a=0},d}}r.r(t),r.d(t,"defaultMemoize",function(){return u}),r.d(t,"createSelectorCreator",function(){return a}),r.d(t,"createSelector",function(){return i}),r.d(t,"createStructuredSelector",function(){return l});var i=a(u);function l(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i;if("object"!=(void 0===e?"undefined":n(e)))throw new Error("createStructuredSelector expects first argument to be an object where each property is a selector, instead received a "+(void 0===e?"undefined":n(e)));var r=Object.keys(e);return t(r.map(function(t){return e[t]}),function(){for(var e=arguments.length,t=Array(e),n=0;n<e;n++)t[n]=arguments[n];return t.reduce(function(e,t,n){return e[r[n]]=t,e},{})})}},535:function(e,t,r){Object.defineProperty(t,"__esModule",{value:!0});var n=r(530);Object.defineProperty(t,"Example",{enumerable:!0,get:function(){return u(n).default}});var o=r(538);function u(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"ExampleWithError",{enumerable:!0,get:function(){return u(o).default}})},536:function(e,t,r){e.exports={default:r(537),__esModule:!0}},537:function(e,t,r){var n=r(19),o=n.JSON||(n.JSON={stringify:JSON.stringify});e.exports=function(e){return o.stringify.apply(o,arguments)}},538:function(e,t,r){Object.defineProperty(t,"__esModule",{value:!0});var n=c(r(81)),o=c(r(107)),u=c(r(108)),a=c(r(109)),i=c(r(110)),l=c(r(111)),f=r(3),d=(c(f),c(r(531)));function c(e){return e&&e.__esModule?e:{default:e}}var s=(0,n.default)("h1",{},void 0,"This should catch by ErrorBoundary"),p=(0,n.default)("div",{}),v=function(e){function t(){return(0,u.default)(this,t),(0,i.default)(this,(t.__proto__||(0,o.default)(t)).apply(this,arguments))}return(0,l.default)(t,e),(0,a.default)(t,[{key:"render",value:function(){var e=this.props.example,t=e&&e.result?e.result:null;return t&&t.size&&t.size>0?(0,n.default)("div",{className:d.default.exampleOutput},void 0,s,t.something_not_existed.get("something_not_existed")):p}}]),t}(f.PureComponent);t.default=v},539:function(e,t,r){Object.defineProperty(t,"__esModule",{value:!0});var n=r(540);Object.defineProperty(t,"ErrorBoundary",{enumerable:!0,get:function(){return(e=n,e&&e.__esModule?e:{default:e}).default;var e}})},540:function(e,t,r){(function(e){Object.defineProperty(t,"__esModule",{value:!0});var n=d(r(81)),o=d(r(107)),u=d(r(108)),a=d(r(109)),i=d(r(110)),l=d(r(111)),f=r(3);function d(e){return e&&e.__esModule?e:{default:e}}d(f);var c=(0,n.default)("div",{style:{padding:".75rem 1.25rem",marginBottom:"1rem",border:"1px solid transparent",borderRadius:".25rem",color:"#721c24",backgroundColor:"#f8d7da",borderColor:"#f5c6cb"}},void 0,"Something is going wrong!! This error is caught by ErrorBoundary feature in React 16 \\o/"),s=function(t){function r(e){(0,u.default)(this,r);var t=(0,i.default)(this,(r.__proto__||(0,o.default)(r)).call(this,e));return t.state={hasError:!1},t}return(0,l.default)(r,t),(0,a.default)(r,[{key:"componentDidCatch",value:function(t,r){e.log(t,r),this.setState({hasError:!0})}},{key:"render",value:function(){var e=this.state.hasError,t=this.props.children;return e?c:t}}]),r}(f.PureComponent);t.default=s}).call(this,r(32))},541:function(e,t,r){}}])}});
//# sourceMappingURL=2-script.js.map