<template>
  <button :type="nativeType" :disabled="loading"
    class="button"
    :class="{
      [`button-${type}`]: true,
      'is-loading': loading
    }">
    <slot />
  </button>
</template>

<script>
  export default {
    name: 'v-button',

    props: {
      type: {
        type: String,
        default: 'primary'
      },
      nativeType: {
        type: String,
        default: 'submit'
      },
      loading: {
        type: Boolean,
        default: false
      },
      block: {
        type: Boolean,
        default: false
      }
    }
  }
</script>
