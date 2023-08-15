import { createRouter, createWebHistory } from 'vue-router';
import AddressPage from '@/views/AddressPage.vue';
import NewAddressPage from '@/views/NewAddressPage.vue';
import AddressListPage from '@/views/AddressListPage.vue';
import EditAddressPage from '@/views/EditAddressPage.vue';

const routes = [
  { path: '/', component: AddressPage },
  { path: '/addresses/new', component: NewAddressPage },
  { path: '/addresses', component: AddressListPage },
  { path: '/addresses/:id/edit', component: EditAddressPage }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;

