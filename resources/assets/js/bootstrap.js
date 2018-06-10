import Vue from 'vue'

window.events = new Vue();

window.flash = function(message, type = 'info') {
  window.events.$emit('flash', { message, type })
}
