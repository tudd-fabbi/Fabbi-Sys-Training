import Vue from 'vue';
import App from './App.vue';
import router from './router/index';
import './registerServiceWorker';
import ArgonDashboard from './plugins/argon-dashboard';
import axios from 'axios';
import VueAxios from 'vue-axios';
import store from './store';
import authToken from './utils/token'
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css';
import i18n from './utils/i18n';

Vue.config.productionTip = false
Vue.use(VueAxios, axios);
Vue.use(ArgonDashboard);
Vue.use(VueIziToast);

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresVisitor)) {
        if (authToken.getToken()) {
            next({
                path: '/'
            });
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!authToken.getToken()) {
            next({
                path: '/login'
            });
        } else {
            store.dispatch('auth/getAuth')
                .then(() => {
                    next();
                })
                .catch(() => {
                    next('/login');
                });
        }
    } else {
        next();
    }
});

new Vue({
  router,
  store,
  i18n,
  render: h => h(App)
}).$mount('#app')
