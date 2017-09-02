import Vue from 'vue'
import App from './App'
import store from './store'
import router from './router'

import VueResource from 'vue-resource'

Vue.use(VueResource);


import './assets/lib/flexible.js'


//store和router尽量小写
var vm=new Vue({
	el:"#app",
	store,
	router,
	render:h=>h(App)
})