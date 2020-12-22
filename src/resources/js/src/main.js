import Vue from "vue";
import App from "./App.vue";
import router from "./router/index.js";
import axios from "axios";
import store from "./store";

import BootstrapVue from 'bootstrap-vue/dist/bootstrap-vue.esm';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret, faSpinner, faUserAlt, faHome, faCheckCircle, faHeart, faClock, faFunnelDollar, faCheck, faDollarSign } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faUserSecret, faSpinner, faUserAlt, faHome, faCheckCircle, faHeart, faClock, faFunnelDollar, faCheck, faDollarSign)
 
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.use(BootstrapVue);

axios.defaults.withCredentials = true;
// axios.defaults.baseURL = "http://localhost:8000";

var token = sessionStorage.getItem("token");
if (token)
{
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

store.dispatch('auth/me').then(res => {
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount("#app");
})