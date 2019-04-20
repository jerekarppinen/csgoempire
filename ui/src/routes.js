import LoginToSteam from './components/LoginToSteam.vue';
import User from './components/User.vue';

export default [
  {
    path: '/',
    redirect: '/steam-login'
  },
  {
    path: '/steam-login',
    component: LoginToSteam
  },
  {
    path: '/user/:id',
    component: User
  }
];