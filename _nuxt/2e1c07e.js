(window.webpackJsonp=window.webpackJsonp||[]).push([[5],{298:function(t,e,n){"use strict";n.r(e);var o=!0,c={data:function(){return{isActive:"active",optionBg:[],optionMain:[],optionTheme:[],optionFont:[],fontCurrent:"",themeMode:[],optionTheme_selected:"",optionBg_selected:"",optionMain_selected:""}},mounted:function(){this.themeMode=this.getSettingTheme().color,this.optionTheme_selected=this.getSettingTheme().color,this.fontCurrent=this.getSettingFont().title,this.setOptionTheme(),this.setOptionBG(),this.setOptionMain(),this.setOptionFont()},methods:{onClickSettingBG:function(t){this.optionBg_selected=t.target.dataset.value,this.setSetting("bg",t.target.dataset.value),this.initSetting()},onClickSettingMain:function(t){this.optionMain_selected=t.target.dataset.value,this.setSetting("main",t.target.dataset.value),this.initSetting()},onClickSettingTheme:function(t){this.optionTheme_selected=t.target.dataset.value,this.themeMode=t.target.dataset.value,this.setSetting("theme",t.target.dataset.value),this.initSetting()},setOptionBG:function(){this.optionBg=[{data:"#c4183c,#4f37ac"},{data:"#ff4800,#ff007e"},{data:"#2b32b2,#1488cc"},{data:"#f857a6,#ff5858"},{data:"#870000,#c85631"},{data:"#028398,#056546"},{data:"#c04848,#480048"},{data:"#2f7336,#38aa5a"}]},setOptionMain:function(){this.optionMain=[{data:"#0256b1,#114175"},{data:"#5cb85c,#5c9310"},{data:"#f0ad4e,#f08802"},{data:"#d9534f,#d92e03"},{data:"#ff5ca1,#ff3755"},{data:"#a695c7,#a6707b"},{data:"#00aea4,#008958"},{data:"#13cf13,#137100"}]},setOptionTheme:function(){this.optionTheme=[{data:"light"},{data:"dark"}]},setOptionFont:function(){this.optionFont=[{data:"roboto",title:"Roboto Condensed"},{data:"roboto2",title:"Roboto"},{data:"helvetica",title:"Helvetica Neue"}]},site_option:function(){o?(document.getElementById("site-options").classList.remove("off_canvas"),document.getElementById("svg-setting").classList.add("off_svg"),document.getElementById("svg-close").classList.remove("off_svg"),o=!1):(document.getElementById("site-options").classList.add("off_canvas"),document.getElementById("svg-setting").classList.remove("off_svg"),document.getElementById("svg-close").classList.add("off_svg"),o=!0)},selectFont:function(t){var e=t.target.value,n={roboto:"'Roboto Condensed', Helvetica, Arial, sans-serif",helvetica:"'Helvetica Neue',Helvetica,Arial,sans-serif",roboto2:"Roboto, Helvetica, Arial, sans-serif"},data={font:n[e],title:e};this.fontCurrent=e,this.setSetting("font",data),this.initSetting()}}},r=n(52),component=Object(r.a)(c,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"site-options off_canvas",attrs:{id:"site-options"}},[n("span",{staticClass:"site-option-btn pan-icon pan-icon-button",attrs:{id:"site-option-btn"},on:{click:t.site_option}},[n("svg",{attrs:{id:"svg-setting",width:"20",height:"20",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg","data-svg":"settings"}},[n("ellipse",{attrs:{fill:"none",stroke:"#000",cx:"6.11",cy:"3.55",rx:"2.11",ry:"2.15"}}),t._v(" "),n("ellipse",{attrs:{fill:"none",stroke:"#000",cx:"6.11",cy:"15.55",rx:"2.11",ry:"2.15"}}),t._v(" "),n("circle",{attrs:{fill:"none",stroke:"#000",cx:"13.15",cy:"9.55",r:"2.15"}}),t._v(" "),n("rect",{attrs:{x:"1",y:"3",width:"3",height:"1"}}),t._v(" "),n("rect",{attrs:{x:"10",y:"3",width:"8",height:"1"}}),t._v(" "),n("rect",{attrs:{x:"1",y:"9",width:"8",height:"1"}}),t._v(" "),n("rect",{attrs:{x:"15",y:"9",width:"3",height:"1"}}),t._v(" "),n("rect",{attrs:{x:"1",y:"15",width:"3",height:"1"}}),t._v(" "),n("rect",{attrs:{x:"10",y:"15",width:"8",height:"1"}})]),t._v(" "),n("svg",{staticClass:"off_svg",attrs:{id:"svg-close",width:"20",height:"20",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg","data-svg":"close"}},[n("path",{attrs:{fill:"none",stroke:"#000","stroke-width":"1.06",d:"M16,16 L4,4"}}),t._v(" "),n("path",{attrs:{fill:"none",stroke:"#000","stroke-width":"1.06",d:"M16,4 L4,16"}})])]),t._v(" "),n("div",{staticClass:"setting-content"},[n("div",{staticClass:"setting-container"},[n("div",{staticClass:"nav2"},[n("div",{staticClass:"setting-title txt-center"},[t._v("Menu")]),t._v(" "),n("hr"),t._v(" "),n("ul",{staticClass:"navbar-nav2"},[n("li",[n("NuxtLink",{attrs:{to:{name:"index"}}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-home",width:"15",height:"15",viewBox:"0 0 20 20"}},[n("polygon",{attrs:{points:"18.65 11.35 10 2.71 1.35 11.35 0.65 10.65 10 1.29 19.35 10.65"}}),t._v(" "),n("polygon",{attrs:{points:"15 4 18 4 18 7 17 7 17 5 15 5"}}),t._v(" "),n("polygon",{attrs:{points:"3 11 4 11 4 18 7 18 7 12 12 12 12 18 16 18 16 11 17 11 17 19 11 19 11 13 8 13 8 19 3 19"}})]),n("span",[t._v("Trang chủ")])])],1),t._v(" "),n("li",[n("a",{attrs:{href:"https://discord.gg/Rm4gg9JDed",target:"_blank"}},[n("svg",{staticStyle:{fill:"rgb(0, 0, 0)","margin-top":"2px",height:"20px",position:"absolute","margin-left":"-6px"},attrs:{xmlns:"http://www.w3.org/2000/svg",x:"0px",y:"0px",width:"30",height:"30",viewBox:"0 0 172 172"}},[n("g",{staticStyle:{"mix-blend-mode":"normal"},attrs:{fill:"none","fill-rule":"nonzero",stroke:"none","stroke-width":"1","stroke-linecap":"butt","stroke-linejoin":"miter","stroke-miterlimit":"10","stroke-dasharray":"","stroke-dashoffset":"0","font-family":"none","font-weight":"none","font-size":"none","text-anchor":"none"}},[n("g",{attrs:{fill:"#333"}},[n("path",{attrs:{d:"M65.0375,24.08c0,0 -21.90312,1.505 -36.2275,13.0075c-0.06719,0.02688 -0.14781,0.06719 -0.215,0.1075c-2.48594,2.29781 -4.35375,5.85875 -6.665,10.965c-2.31125,5.10625 -4.75687,11.67719 -6.9875,19.0275c-4.44781,14.71406 -8.0625,32.77406 -8.0625,49.7725c-0.01344,0.60469 0.13438,1.19594 0.43,1.72c5.02563,8.82844 14.27063,14.16313 22.8975,17.5225c8.62688,3.35938 16.59531,4.70313 20.64,4.8375c1.14219,0.04031 2.23063,-0.48375 2.9025,-1.3975l8.385,-11.61c6.75906,1.59906 14.68719,2.6875 23.865,2.6875c9.17781,0 17.10594,-1.08844 23.865,-2.6875l8.385,11.61c0.67188,0.91375 1.76031,1.43781 2.9025,1.3975c4.04469,-0.13437 12.01313,-1.47812 20.64,-4.8375c8.62688,-3.35937 17.87188,-8.69406 22.8975,-17.5225c0.29563,-0.52406 0.44344,-1.11531 0.43,-1.72c0,-16.99844 -3.61469,-35.05844 -8.0625,-49.7725c-2.23062,-7.35031 -4.67625,-13.92125 -6.9875,-19.0275c-2.31125,-5.10625 -4.17906,-8.66719 -6.665,-10.965c-0.06719,-0.04031 -0.14781,-0.08062 -0.215,-0.1075c-14.32437,-11.5025 -36.2275,-13.0075 -36.2275,-13.0075c-0.25531,-0.02687 -0.49719,-0.02687 -0.7525,0c-1.19594,0.16125 -2.20375,0.94063 -2.6875,2.0425c0,0 -1.16906,2.56656 -1.935,6.235c-6.70531,-1.075 -12.34906,-1.3975 -15.5875,-1.3975c-3.23844,0 -8.88219,0.3225 -15.5875,1.3975c-0.76594,-3.66844 -1.935,-6.235 -1.935,-6.235c-0.59125,-1.34375 -1.97531,-2.16344 -3.44,-2.0425zM62.8875,31.4975c0.25531,0.69875 0.43,1.35719 0.645,2.15c-7.75344,1.80063 -16.24594,4.74344 -24.1875,9.675c-1.24969,0.52406 -2.06937,1.73344 -2.10969,3.09063c-0.02688,1.34375 0.73906,2.59344 1.94844,3.18469c1.22281,0.57781 2.67406,0.40312 3.70875,-0.47031c15.93688,-9.87656 36.21406,-11.2875 43.1075,-11.2875c6.89344,0 27.17063,1.41094 43.1075,11.2875c1.03469,0.87344 2.48594,1.04813 3.70875,0.47031c1.20938,-0.59125 1.97531,-1.84094 1.94844,-3.18469c-0.04031,-1.35719 -0.86,-2.56656 -2.10969,-3.09063c-7.94156,-4.93156 -16.43406,-7.87437 -24.1875,-9.675c0.215,-0.79281 0.38969,-1.45125 0.645,-2.15c3.92375,0.48375 19.17531,2.53969 29.5625,10.75c0.67188,0.61813 3.01,4.05813 5.16,8.815c2.15,4.75688 4.4075,10.95156 6.5575,18.06c4.1925,13.8675 7.57875,30.97344 7.74,46.655c-3.91031,6.32906 -11.24719,11.03219 -18.8125,13.975c-6.88,2.67406 -13.30312,3.87 -16.6625,4.1925l-5.805,-7.8475c2.95625,-0.95406 5.61688,-1.98875 7.955,-3.01c8.68063,-3.81625 13.33,-7.8475 13.33,-7.8475c1.42438,-1.27656 1.54531,-3.46687 0.26875,-4.89125c-1.27656,-1.42437 -3.46687,-1.54531 -4.89125,-0.26875c0,0 -3.60125,3.29219 -11.5025,6.7725c-2.9025,1.27656 -6.42312,2.53969 -10.4275,3.655c-0.92719,-0.1075 -1.85437,0.16125 -2.58,0.7525c-6.40969,1.55875 -14.02875,2.58 -23.005,2.58c-9.04344,0 -16.67594,-1.11531 -23.1125,-2.6875c-0.72562,-0.48375 -1.6125,-0.68531 -2.4725,-0.5375c-4.01781,-1.11531 -7.51156,-2.48594 -10.4275,-3.7625c-7.90125,-3.48031 -11.5025,-6.7725 -11.5025,-6.7725c-0.77937,-0.72562 -1.85437,-1.03469 -2.9025,-0.86c-1.33031,0.20156 -2.43219,1.15563 -2.795,2.45906c-0.37625,1.29 0.05375,2.6875 1.075,3.56094c0,0 4.64938,4.03125 13.33,7.8475c2.33813,1.02125 4.99875,2.05594 7.955,3.01l-5.805,7.8475c-3.35937,-0.3225 -9.7825,-1.51844 -16.6625,-4.1925c-7.56531,-2.94281 -14.90219,-7.64594 -18.8125,-13.975c0.16125,-15.68156 3.5475,-32.7875 7.74,-46.655c2.15,-7.10844 4.4075,-13.30312 6.5575,-18.06c2.15,-4.75687 4.48813,-8.19687 5.16,-8.815c10.38719,-8.21031 25.63875,-10.26625 29.5625,-10.75zM63.64,72.24c-8.77469,0 -15.48,7.96844 -15.48,17.2c0,9.23156 6.70531,17.2 15.48,17.2c8.77469,0 15.48,-7.96844 15.48,-17.2c0,-9.23156 -6.70531,-17.2 -15.48,-17.2zM108.36,72.24c-8.77469,0 -15.48,7.96844 -15.48,17.2c0,9.23156 6.70531,17.2 15.48,17.2c8.77469,0 15.48,-7.96844 15.48,-17.2c0,-9.23156 -6.70531,-17.2 -15.48,-17.2zM63.64,79.12c4.52844,0 8.6,4.35375 8.6,10.32c0,5.96625 -4.07156,10.32 -8.6,10.32c-4.52844,0 -8.6,-4.35375 -8.6,-10.32c0,-5.96625 4.07156,-10.32 8.6,-10.32zM108.36,79.12c4.52844,0 8.6,4.35375 8.6,10.32c0,5.96625 -4.07156,10.32 -8.6,10.32c-4.52844,0 -8.6,-4.35375 -8.6,-10.32c0,-5.96625 4.07156,-10.32 8.6,-10.32z"}})])])]),t._v(" "),n("span",{staticStyle:{"padding-left":"14px"}},[t._v("Join Discord")])])]),t._v(" "),n("li",[n("NuxtLink",{attrs:{to:{name:"bdo-boss-timer"}}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-world",width:"16",height:"16",viewBox:"0 0 20 20"}},[n("path",{attrs:{fill:"none",stroke:"#fff",d:"M1,10.5 L19,10.5"}}),t._v(" "),n("path",{attrs:{fill:"none",stroke:"#fff",d:"M2.35,15.5 L17.65,15.5"}}),t._v(" "),n("path",{attrs:{fill:"none",stroke:"#fff",d:"M2.35,5.5 L17.523,5.5"}}),t._v(" "),n("path",{attrs:{fill:"none",stroke:"#fff",d:"M10,19.46 L9.98,19.46 C7.31,17.33 5.61,14.141 5.61,10.58 C5.61,7.02 7.33,3.83 10,1.7 C10.01,1.7 9.99,1.7 10,1.7 L10,1.7 C12.67,3.83 14.4,7.02 14.4,10.58 C14.4,14.141 12.67,17.33 10,19.46 L10,19.46 L10,19.46 L10,19.46 Z"}}),t._v(" "),n("circle",{attrs:{fill:"none",stroke:"#fff",cx:"10",cy:"10.5",r:"9"}})]),t._v(" "),n("span",[t._v("Boss Timer")])])],1),t._v(" "),n("li",[n("NuxtLink",{attrs:{to:{name:"bdo-caphras-calculator"}}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-grid",width:"20",height:"20",viewBox:"0 0 20 20"}},[n("rect",{attrs:{x:"2",y:"2",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"8",y:"2",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"14",y:"2",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"2",y:"8",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"8",y:"8",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"14",y:"8",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"2",y:"14",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"8",y:"14",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"14",y:"14",width:"3",height:"3"}})]),t._v(" "),n("span",[t._v("Caphras Calculator")])])],1),t._v(" "),n("li",[n("NuxtLink",{attrs:{to:{name:"bdo-ap-dp-bracket"}}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-grid",width:"20",height:"20",viewBox:"0 0 20 20"}},[n("rect",{attrs:{x:"2",y:"2",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"8",y:"2",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"14",y:"2",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"2",y:"8",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"8",y:"8",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"14",y:"8",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"2",y:"14",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"8",y:"14",width:"3",height:"3"}}),t._v(" "),n("rect",{attrs:{x:"14",y:"14",width:"3",height:"3"}})]),t._v(" "),n("span",[t._v("AP / DP Brackets")])])],1),t._v(" "),n("li",[n("NuxtLink",{attrs:{to:{name:"bdo-donate"}}},[n("svg",{attrs:{version:"1.1",meta:"vk-icons-credit-card",width:"20",height:"20",viewBox:"0 0 20 20"}},[n("rect",{attrs:{fill:"none",stroke:"#fff",x:"1.5",y:"4.5",width:"17",height:"12"}}),t._v(" "),n("rect",{attrs:{x:"1",y:"7",width:"18",height:"3"}})]),t._v(" "),n("span",[t._v("Donate")])])],1)])]),t._v(" "),n("div",{staticClass:"setting-title txt-center"},[t._v("Website settings")]),t._v(" "),n("hr"),t._v(" "),n("div",{staticClass:"setting-group"},[n("span",{staticClass:"setting-group-title"},[t._v("Theme Color")]),t._v(" "),n("div",{staticClass:"setting-theme pan-grid"},t._l(t.optionTheme,(function(e,o){return n("div",{key:o},[n("span",{class:{active:e.data==t.optionTheme_selected},attrs:{"data-value":e.data},on:{click:t.onClickSettingTheme}})])})),0)]),t._v(" "),n("hr"),t._v(" "),"dark"!==t.themeMode?n("div",{staticClass:"setting-group"},[n("span",{staticClass:"setting-group-title"},[t._v("Background Color")]),t._v(" "),n("div",{staticClass:"setting-palette pan-grid"},t._l(t.optionBg,(function(e,o){return n("div",{key:o},[n("span",{class:{active:e.data==t.optionBg_selected},attrs:{"data-value":e.data},on:{click:t.onClickSettingBG}})])})),0)]):t._e(),t._v(" "),"dark"!==t.themeMode?n("hr"):t._e(),t._v(" "),n("div",{staticClass:"setting-group"},[n("span",{staticClass:"setting-group-title uk-margin-bottom uk-heading-bullet"},[t._v("Main Color")]),t._v(" "),n("div",{staticClass:"setting-color pan-grid"},t._l(t.optionMain,(function(e,o){return n("div",{key:o},[n("span",{class:{active:e.data==t.optionMain_selected},attrs:{"data-value":e.data},on:{click:t.onClickSettingMain}})])})),0)]),t._v(" "),n("hr"),t._v(" "),n("div",{staticClass:"setting-group"},[n("span",{staticClass:"setting-group-title uk-margin-bottom uk-heading-bullet"},[t._v("Fonts")]),t._v(" "),n("div",{staticClass:"setting-font pan-grid"},[n("select",{attrs:{name:"selectFont"},on:{change:t.selectFont}},t._l(t.optionFont,(function(e,o){return n("option",{key:o,domProps:{value:e.data,selected:e.data==t.fontCurrent}},[t._v("\n              "+t._s(e.title)+"\n            ")])})),0)])])])])])}),[],!1,null,null,null);e.default=component.exports}}]);