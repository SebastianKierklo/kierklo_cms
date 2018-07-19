require('./bootstrap');
import 'babel-polyfill';

window.Vue = require('vue');
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.use(Vuetify,{
    theme:{
        primary: "#424242",
        secondary: "#616161",
        accent: "#448AFF",
        error: "#C62828",
        warning: "#FDD835",
        info: "#2196f3",
        success: "#4caf50"
      }
});

// Components
Vue.component('base-component', require('./components/Base-component.vue'));
Vue.component('side-nav',require('./components/includes/SideNav.vue'));

const DashboardScoop = Vue.component('DashboardComponent',require('./components/pages/dashboard/Dashboard.vue'));
const FilesScoop = Vue.component('FilesComponent',require('./components/pages/files/Files.vue'));
const PagesScoop = Vue.component('PagesComponent',require('./components/pages/pages/Pages.vue'));
const PermissionsScoop = Vue.component('PermissionsComponent',require('./components/pages/permissions/Permissions.vue'));
const SettingsScoop = Vue.component('SettingsComponent',require('./components/pages/settings/Settings.vue'));
const UsersScoop = Vue.component('UsersComponent',require('./components/pages/users/Users.vue'));
const CreatorScoop = Vue.component('CreatorComponent',require('./components/pages/creator/Creator.vue'));

// Routes
const routes = [
  { path: '/', component: DashboardScoop, bread: 'Dashboard' },
  { path: '/files', component: FilesScoop },
  { path: '/pages', component: PagesScoop },
  { path: '/permissions', component: PermissionsScoop },
  { path: '/settings', component: SettingsScoop },
  { path: '/users', component: UsersScoop },
  { path: '/creator', component: CreatorScoop },
];

const router = new VueRouter({
  routes,
  mode: 'history'
});

const app = new Vue({
    router: router,
    el: '#app',
    template: '<base-component></base-component>'
});
