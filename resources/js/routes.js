import VueRouter from 'vue-router';
import TheHomepage from './components/pages/TheHomepage.vue';
import ClientPage from './components/pages/clients/ClientPage.vue';
import BurialPage from './components/pages/burial/BurialPage.vue';
import BaptismPage from './components/pages/baptism/BaptismPage.vue';
import MarriagePage from './components/pages/marriage/MarriagePage.vue';
import PriestsPage from './components/pages/priest/PriestPage.vue';

const routes = [
    {
        path: '/',
        component: TheHomepage,
        name: 'homepage'
    },
    {
        path: '/clients',
        component: ClientPage,
        name: 'clients'
    },
    {
        path: '/burial',
        component: BurialPage,
        name: 'burial'
    },
    {
        path: '/baptism',
        component: BaptismPage,
        name: 'baptism'
    },
    {
        path: '/marriage',
        component: MarriagePage,
        name: 'marriage'
    },
    {
        path: '/priests',
        component: PriestsPage,
        name: 'priests'
    }
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

export default router;