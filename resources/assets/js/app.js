
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    'example-component',
    require('./components/ExampleComponent.vue')
);
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);
Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);
Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);
Vue.component(
    'list-properties',
    require('./components/ListProperties.vue')
);
Vue.component(
    'featured-ads',
    require('./components/FeaturedAds.vue')
);
Vue.component(
    'admin-list-agencies',
    require('./components/AdminListAgencies.vue')
);
Vue.component(
    'admin-list-properties',
    require('./components/AdminListProperties.vue')
);
const app = new Vue({
    el: '#app'
});
