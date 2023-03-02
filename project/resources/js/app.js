
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('contoh-vue', require('./components/Contoh.vue').default);
Vue.component('admin-read', require('./components/admin/Read.vue').default);
Vue.component('admin-create', require('./components/admin/Create.vue').default);
Vue.component('admin-change-password', require('./components/admin/ChangePassword.vue').default);
Vue.component('admin-change-data', require('./components/admin/ChangeData.vue').default);

Vue.component('peserta-read', require('./components/peserta/Read.vue').default);
Vue.component('peserta-create', require('./components/peserta/Create.vue').default);

Vue.component('vac-center-read', require('./components/vacCenter/Read.vue').default);
Vue.component('vac-center-create', require('./components/vacCenter/Create.vue').default);
Vue.component('vac-center-update', require('./components/vacCenter/Update.vue').default);

const app = new Vue({
    el: '#app',
});
