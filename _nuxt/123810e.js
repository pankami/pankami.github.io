(window.webpackJsonp=window.webpackJsonp||[]).push([[3],{269:function(t,e,n){"use strict";n.r(e);var c={data:function(){return{assetURL:""}},mounted:function(){this.stickyNav(),this.assetURL=this.getAssetURL()},methods:{stickyNav:function(){document.addEventListener("scroll",(function(t){var nav=document.getElementById("mainnav");nav.classList.toggle("shadow",nav.offsetTop<=window.scrollY+35),document.documentElement.scrollTop>100?document.getElementById("pan-totop").classList.add("pan-totop-button"):(document.getElementById("mainnav").classList.add("sticky"),document.getElementById("pan-totop").classList.remove("pan-totop-button"))}))},dropMenu:function(t){t.stopPropagation(),document.getElementById("dropMenu").classList.toggle("sub-open")}},beforeMount:function(){document.addEventListener("click",(function(t){document.getElementById("dropMenu").classList.remove("sub-open")}))}},o=n(52),component=Object(o.a)(c,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"main-nav sticky",attrs:{id:"mainnav"}},[n("div",{staticClass:"main-nav-wrapper"},[n("div",{staticClass:"pan-container"},[n("div",{staticClass:"pan-panel pan-grid"},[n("div",{staticClass:"widget-logo width-auto margin-remove"},[n("div",{staticClass:"widget-logo-header"},[n("h1",{staticClass:"clip"},[n("NuxtLink",{attrs:{to:{name:"index"},title:"Pan Kami"}},[n("span",[t._v("BDO: Pan Kami")])])],1),t._v(" "),n("NuxtLink",{staticClass:"widget-logo-image",attrs:{to:{name:"index"}}},[n("picture",[n("source",{directives:[{name:"lazy-load",rawName:"v-lazy-load"}],attrs:{"data-srcset":t.assetURL+"/bdo/img/logo/logo.webp",type:"image/webp"}}),t._v(" "),n("img",{directives:[{name:"lazy-load",rawName:"v-lazy-load"}],attrs:{alt:"Pan Kami","data-src":t.assetURL+"/bdo/img/logo/logo.png"}})])])],1)]),t._v(" "),n("div",{staticClass:"widget-nav width-expand margin-remove"},[n("nav",{staticClass:"main-nav-menu navbar-container margin-remove"},[n("ul",{staticClass:"navbar-nav"},[n("li",[n("NuxtLink",{attrs:{to:{name:"bdo-guide"}}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-database",width:"16",height:"16",viewBox:"0 0 20 20"}},[n("ellipse",{attrs:{fill:"none",stroke:"#fff",cx:"10",cy:"4.64",rx:"7.5",ry:"3.14"}}),t._v(" "),n("path",{attrs:{fill:"none",stroke:"#fff",d:"M17.5,8.11 C17.5,9.85 14.14,11.25 10,11.25 C5.86,11.25 2.5,9.84 2.5,8.11"}}),t._v(" "),n("path",{attrs:{fill:"none",stroke:"#fff",d:"M17.5,11.25 C17.5,12.99 14.14,14.39 10,14.39 C5.86,14.39 2.5,12.98 2.5,11.25"}}),t._v(" "),n("path",{attrs:{fill:"none",stroke:"#fff",d:"M17.49,4.64 L17.5,14.36 C17.5,16.1 14.14,17.5 10,17.5 C5.86,17.5 2.5,16.09 2.5,14.36 L2.5,4.64"}})]),n("span",[t._v("Guides")])])],1),t._v(" "),n("li",[n("NuxtLink",{attrs:{to:{name:"bdo-boss-timer"}}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-clock",width:"20",height:"20",viewBox:"0 0 20 20"}},[n("circle",{attrs:{fill:"none",stroke:"#fff","stroke-width":"1.1",cx:"10",cy:"10",r:"9"}}),t._v(" "),n("rect",{attrs:{x:"9",y:"4",width:"1",height:"7"}}),t._v(" "),n("path",{attrs:{fill:"none",stroke:"#fff","stroke-width":"1.1",d:"M13.018,14.197 L9.445,10.625"}})]),t._v(" "),n("span",[t._v("Boss Timer")])])],1),t._v(" "),n("li",[n("NuxtLink",{attrs:{to:{name:"bdo-donate"}}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-credit-card",width:"20",height:"20",viewBox:"0 0 20 20"}},[n("rect",{attrs:{fill:"none",stroke:"#fff",x:"1.5",y:"4.5",width:"17",height:"12"}}),t._v(" "),n("rect",{attrs:{x:"1",y:"7",width:"18",height:"3"}})]),t._v(" "),n("span",{staticStyle:{"padding-left":"5px"}},[t._v("Donate")])])],1),t._v(" "),n("li",[n("a",{attrs:{href:"https://discord.gg/Rm4gg9JDed",target:"_blank"}},[n("svg",{staticStyle:{height:"24px"},attrs:{xmlns:"http://www.w3.org/2000/svg",x:"0px",y:"0px",width:"30",height:"30",viewBox:"0 0 172 172"}},[n("g",{staticStyle:{"mix-blend-mode":"normal"},attrs:{fill:"none","fill-rule":"nonzero",stroke:"none","stroke-width":"1","stroke-linecap":"butt","stroke-linejoin":"miter","stroke-miterlimit":"10","stroke-dasharray":"","stroke-dashoffset":"0","font-family":"none","font-weight":"none","font-size":"none","text-anchor":"none"}},[n("g",{attrs:{fill:"#fff"}},[n("path",{attrs:{d:"M65.0375,24.08c0,0 -21.90312,1.505 -36.2275,13.0075c-0.06719,0.02688 -0.14781,0.06719 -0.215,0.1075c-2.48594,2.29781 -4.35375,5.85875 -6.665,10.965c-2.31125,5.10625 -4.75687,11.67719 -6.9875,19.0275c-4.44781,14.71406 -8.0625,32.77406 -8.0625,49.7725c-0.01344,0.60469 0.13438,1.19594 0.43,1.72c5.02563,8.82844 14.27063,14.16313 22.8975,17.5225c8.62688,3.35938 16.59531,4.70313 20.64,4.8375c1.14219,0.04031 2.23063,-0.48375 2.9025,-1.3975l8.385,-11.61c6.75906,1.59906 14.68719,2.6875 23.865,2.6875c9.17781,0 17.10594,-1.08844 23.865,-2.6875l8.385,11.61c0.67188,0.91375 1.76031,1.43781 2.9025,1.3975c4.04469,-0.13437 12.01313,-1.47812 20.64,-4.8375c8.62688,-3.35937 17.87188,-8.69406 22.8975,-17.5225c0.29563,-0.52406 0.44344,-1.11531 0.43,-1.72c0,-16.99844 -3.61469,-35.05844 -8.0625,-49.7725c-2.23062,-7.35031 -4.67625,-13.92125 -6.9875,-19.0275c-2.31125,-5.10625 -4.17906,-8.66719 -6.665,-10.965c-0.06719,-0.04031 -0.14781,-0.08062 -0.215,-0.1075c-14.32437,-11.5025 -36.2275,-13.0075 -36.2275,-13.0075c-0.25531,-0.02687 -0.49719,-0.02687 -0.7525,0c-1.19594,0.16125 -2.20375,0.94063 -2.6875,2.0425c0,0 -1.16906,2.56656 -1.935,6.235c-6.70531,-1.075 -12.34906,-1.3975 -15.5875,-1.3975c-3.23844,0 -8.88219,0.3225 -15.5875,1.3975c-0.76594,-3.66844 -1.935,-6.235 -1.935,-6.235c-0.59125,-1.34375 -1.97531,-2.16344 -3.44,-2.0425zM62.8875,31.4975c0.25531,0.69875 0.43,1.35719 0.645,2.15c-7.75344,1.80063 -16.24594,4.74344 -24.1875,9.675c-1.24969,0.52406 -2.06937,1.73344 -2.10969,3.09063c-0.02688,1.34375 0.73906,2.59344 1.94844,3.18469c1.22281,0.57781 2.67406,0.40312 3.70875,-0.47031c15.93688,-9.87656 36.21406,-11.2875 43.1075,-11.2875c6.89344,0 27.17063,1.41094 43.1075,11.2875c1.03469,0.87344 2.48594,1.04813 3.70875,0.47031c1.20938,-0.59125 1.97531,-1.84094 1.94844,-3.18469c-0.04031,-1.35719 -0.86,-2.56656 -2.10969,-3.09063c-7.94156,-4.93156 -16.43406,-7.87437 -24.1875,-9.675c0.215,-0.79281 0.38969,-1.45125 0.645,-2.15c3.92375,0.48375 19.17531,2.53969 29.5625,10.75c0.67188,0.61813 3.01,4.05813 5.16,8.815c2.15,4.75688 4.4075,10.95156 6.5575,18.06c4.1925,13.8675 7.57875,30.97344 7.74,46.655c-3.91031,6.32906 -11.24719,11.03219 -18.8125,13.975c-6.88,2.67406 -13.30312,3.87 -16.6625,4.1925l-5.805,-7.8475c2.95625,-0.95406 5.61688,-1.98875 7.955,-3.01c8.68063,-3.81625 13.33,-7.8475 13.33,-7.8475c1.42438,-1.27656 1.54531,-3.46687 0.26875,-4.89125c-1.27656,-1.42437 -3.46687,-1.54531 -4.89125,-0.26875c0,0 -3.60125,3.29219 -11.5025,6.7725c-2.9025,1.27656 -6.42312,2.53969 -10.4275,3.655c-0.92719,-0.1075 -1.85437,0.16125 -2.58,0.7525c-6.40969,1.55875 -14.02875,2.58 -23.005,2.58c-9.04344,0 -16.67594,-1.11531 -23.1125,-2.6875c-0.72562,-0.48375 -1.6125,-0.68531 -2.4725,-0.5375c-4.01781,-1.11531 -7.51156,-2.48594 -10.4275,-3.7625c-7.90125,-3.48031 -11.5025,-6.7725 -11.5025,-6.7725c-0.77937,-0.72562 -1.85437,-1.03469 -2.9025,-0.86c-1.33031,0.20156 -2.43219,1.15563 -2.795,2.45906c-0.37625,1.29 0.05375,2.6875 1.075,3.56094c0,0 4.64938,4.03125 13.33,7.8475c2.33813,1.02125 4.99875,2.05594 7.955,3.01l-5.805,7.8475c-3.35937,-0.3225 -9.7825,-1.51844 -16.6625,-4.1925c-7.56531,-2.94281 -14.90219,-7.64594 -18.8125,-13.975c0.16125,-15.68156 3.5475,-32.7875 7.74,-46.655c2.15,-7.10844 4.4075,-13.30312 6.5575,-18.06c2.15,-4.75687 4.48813,-8.19687 5.16,-8.815c10.38719,-8.21031 25.63875,-10.26625 29.5625,-10.75zM63.64,72.24c-8.77469,0 -15.48,7.96844 -15.48,17.2c0,9.23156 6.70531,17.2 15.48,17.2c8.77469,0 15.48,-7.96844 15.48,-17.2c0,-9.23156 -6.70531,-17.2 -15.48,-17.2zM108.36,72.24c-8.77469,0 -15.48,7.96844 -15.48,17.2c0,9.23156 6.70531,17.2 15.48,17.2c8.77469,0 15.48,-7.96844 15.48,-17.2c0,-9.23156 -6.70531,-17.2 -15.48,-17.2zM63.64,79.12c4.52844,0 8.6,4.35375 8.6,10.32c0,5.96625 -4.07156,10.32 -8.6,10.32c-4.52844,0 -8.6,-4.35375 -8.6,-10.32c0,-5.96625 4.07156,-10.32 8.6,-10.32zM108.36,79.12c4.52844,0 8.6,4.35375 8.6,10.32c0,5.96625 -4.07156,10.32 -8.6,10.32c-4.52844,0 -8.6,-4.35375 -8.6,-10.32c0,-5.96625 4.07156,-10.32 8.6,-10.32z"}})])])]),t._v(" "),n("span",[t._v("Join Discord")])])]),t._v(" "),n("li",{staticClass:"dropdown"},[n("a",{staticClass:"dropdown-btn",attrs:{href:"javascript:;"},on:{click:t.dropMenu}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-menu",width:"20",height:"20",viewBox:"0 0 20 20"}},[n("rect",{attrs:{x:"2",y:"4",width:"16",height:"1"}}),t._v(" "),n("rect",{attrs:{x:"2",y:"9",width:"16",height:"1"}}),t._v(" "),n("rect",{attrs:{x:"2",y:"14",width:"16",height:"1"}})]),t._v(" "),n("span",[t._v("Tools")])]),t._v(" "),n("div",{staticClass:"drop-menu",attrs:{id:"dropMenu"}},[n("NuxtLink",{attrs:{to:{name:"bdo-caphras-calculator"}}},[t._v("Caphras Calculator")]),t._v(" "),n("NuxtLink",{attrs:{to:{name:"bdo-ap-dp-bracket"}}},[t._v("AP / DP Brackets")])],1)])])])])])])])])}),[],!1,null,null,null);e.default=component.exports;installComponents(component,{Nav:n(269).default})}}]);