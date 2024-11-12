import { createRouter, createWebHistory } from 'vue-router';
import AnniversaireCard from './Pages/Email/AnniversaireCard.vue';

const routes = [
  {
    path: '/mail',
    name: 'Mail',
    component: AnniversaireCard,
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
