import Echo from 'laravel-echo'
import Pusher from 'pusher-js'
import Vue from 'vue'
import _ from 'lodash'

/**
 * Vue event bus
 *
 * @type {Vue}
 */
window.events = new Vue();

/**
 * Flash a message to the user
 *
 * @param  {String} message
 * @param  {String} type
 * @return {[type]}
 */
window.flash = function(message, type = 'info') {
  window.events.$emit('flash', { message, type })
}

window._ = _

/**
 * Laravel Echo
 */
window.Echo = new Echo({
  broadcaster: 'pusher',
  key: window.config.pusherKey
})
