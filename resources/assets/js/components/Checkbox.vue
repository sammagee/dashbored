<template>
  <label class="cursor-pointer flex" :class="[ internalValue ? toggleClass : '', { 'justify-between': internalValue } ]">
    <input
      class="hidden"
      :name="name"
      :checked="internalValue"
      :id="id || name"
      type="checkbox"
      @change="handleChange">

    <slot></slot>

    <svg class="fill-current items-center text-inherit w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" v-if="internalValue">
      <path d="M0 0h24v24H0z" fill="none"/>
      <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
    </svg>
  </label>
</template>

<script>
  export default {
    name: 'v-checkbox',

    props: {
      id: { type: String, default: null },
      name: { type: String, default: 'checkbox' },
      toggleClass: { type: String, default: null },
      value: { type: Boolean, default: false },
      checked: { type: Boolean, default: false }
    },

    data: () => ({
      internalValue: false
    }),

    watch: {
      value (val) {
        this.internalValue = val
      },

      checked (val) {
        this.internalValue = val
      },

      internalValue (val, oldVal) {
        if (val !== oldVal) {
          this.$emit('input', val)
        }
      }
    },

    created () {
      this.internalValue = this.value

      if ('checked' in this.$options.propsData) {
        this.internalValue = this.checked
      }
    },

    methods: {
      handleChange (e) {
        this.$emit('click', e)

        if (! e.isPropagationStopped) {
          this.internalValue = e.target.checked
        }
      }
    }
  }
</script>
