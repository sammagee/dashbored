import Vue from 'vue'
import Button from './Button'
import Child from './Child'
import ClickOutside from './ClickOutside'
import Clock from './Clock'
import Flash from './Flash'
import HasError from './form/HasError'
import Logo from './Logo'

[
  Button,
  Child,
  ClickOutside,
  Clock,
  Flash,
  HasError,
  Logo
].forEach(Component => {
  Vue.component(Component.name, Component)
})
