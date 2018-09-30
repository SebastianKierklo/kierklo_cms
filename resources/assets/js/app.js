require('./bootstrap');
import 'babel-polyfill';

window.Vue = require('vue');
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import Toasted from 'vue-toasted';

import VuejsDialog from 'vuejs-dialog';
import VueQuillEditor from 'vue-quill-editor'

// require styles
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

// include the default style
import 'vuejs-dialog/dist/vuejs-dialog.min.css';

// Tell Vue to install the plugin.
Vue.use(VuejsDialog);

Vue.use(VueQuillEditor, {
    modules: {
        toolbar: [
            [{ 'size': ['small', false, 'large'] }],
            ['bold', 'italic'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ]
    }
});

Vue.use(Toasted, {
    theme: "primary",
    position: "top-right",
    duration : 2000
});
Vue.use(VueRouter);
Vue.use(Vuetify,{
    theme:{
        primary: "#315892",
        secondary: "#616161",
        accent: "#0B65AD",
        error: "#bb3c3c",
        warning: "#ffdd4a",
        info: "#3e9fec",
        success: "#59bb5d",
        tabs: '#333C54',
      }
});

// Components
Vue.component('base-component', require('./components/Base-component.vue'));
Vue.component('login-component', require('./components/Login-component.vue'));
Vue.component('side-nav',require('./components/includes/SideNav.vue'));
Vue.component('loader',require('./components/includes/Loader-component.vue'));

const DashboardScoop = Vue.component('DashboardComponent',require('./components/pages/dashboard/Dashboard.vue'));
const FilesScoop = Vue.component('FilesComponent',require('./components/pages/files/Files.vue'));
const PagesScoop = Vue.component('PagesComponent',require('./components/pages/pages/Pages.vue'));
const PagesEditScoop = Vue.component('PagesEditComponent',require('./components/pages/pages/Pages-edit.vue'));
const PermissionsScoop = Vue.component('PermissionsComponent',require('./components/pages/permissions/Permissions.vue'));
const SettingsScoop = Vue.component('SettingsComponent',require('./components/pages/settings/Settings.vue'));
const UsersScoop = Vue.component('UsersComponent',require('./components/pages/users/Users.vue'));
const CreatorScoop = Vue.component('CreatorComponent',require('./components/pages/creator/Creator.vue'));
const CreatorEditScoop = Vue.component('CreatorEditComponent',require('./components/pages/creator/Creator-edit.vue'));
const DevelopmentScoop = Vue.component('DevelopmentComponent', require('./components/pages/development/Development.vue'))

// Routes
const routes = [
    { path: '/admin', redirect: '/admin/dashboard'},

    { path: '/admin/dashboard', name: 'dashboard', component: DashboardScoop},

    { path: '/admin/files', component: FilesScoop },

    { path: '/admin/pages', component: PagesScoop, name: 'pages'},
    { path: '/admin/pages/edit/:id', component: PagesEditScoop, name: 'pages-edit' },

    { path: '/admin/permissions', component: PermissionsScoop },

    { path: '/admin/settings', component: SettingsScoop },

    { path: '/admin/users', component: UsersScoop },

    { path: '/admin/creator', component: CreatorScoop },
    { path: '/admin/creator/edit/:id', component: CreatorEditScoop },

    { path: '/admin/development', component: DevelopmentScoop}
];

const router = new VueRouter({
  routes,
  mode: 'history'
});

if($("#app").length != 0) {
  const app = new Vue({
      router: router,
      el: '#app',
      template: '<base-component></base-component>'
  });
}

if($("#login").length != 0) {
  const app2 = new Vue({
    el: '#login',
    template: '<login-component></login-component>'
  });
}

