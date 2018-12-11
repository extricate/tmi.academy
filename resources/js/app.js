
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import {Index, SearchBox, Results, Pagination, NoResults, Input, Highlight, PoweredBy} from 'vue-instantsearch';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('ais-index', Index);
Vue.component('ais-input', Input);
Vue.component('ais-search-box', SearchBox);
Vue.component('ais-results', Results);
Vue.component('ais-pagination', Pagination);
Vue.component('ais-no-results', NoResults);
Vue.component('ais-highlight', Highlight);
Vue.component('ais-powered-by', PoweredBy);
Vue.component('searchcomponent', require('./components/SearchComponent.vue'));

const app = new Vue({
    el: '#app'
});
