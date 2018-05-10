import Vue from 'vue'
import VToolTip from 'v-tooltip'

import './pwa'

import ClickOutside from './components/ClickOutside'
import Dropdown from './components/Dropdown'
import Flash from './components/Flash'
import Logo from './components/Logo'
import SiteStatus from './components/SiteStatus'

Vue.component(ClickOutside.name, ClickOutside)
Vue.component(Dropdown.name, Dropdown)
Vue.component(Flash.name, Flash)
Vue.component(Logo.name, Logo)
Vue.component(SiteStatus.name, SiteStatus)

Vue.use(VToolTip)

const app = new Vue({
  el: '#root'
})
