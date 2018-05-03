import Vue from 'vue';
import VToolTip from 'v-tooltip';

import './pwa';

import Logo from './components/Logo';

Vue.component(Logo.name, Logo);

Vue.use(VToolTip);

const app = new Vue({
  el: '#root'
});
