import Vue from 'vue';
import Router from 'vue-router';
import pages from '@/pages/module';



Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/page',
            name: 'page',
            component: pages.Page
        },

        {
            path: '/list-matchs',
            name: 'list-matchs',
            component: pages.MatchesList
        },
        {
            path: '/list-pronostics',
            name: 'list-pronostics',
            component: pages.PronosticsList
        }
    ]
});