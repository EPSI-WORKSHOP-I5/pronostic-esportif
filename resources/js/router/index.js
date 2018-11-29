import Vue from 'vue';
import Router from 'vue-router';
import pages from '@/pages/module';



Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: pages.Home
        },
        {
            path: '/leaderboard',
            name: 'leaderboard',
            component: pages.Leaderboard
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