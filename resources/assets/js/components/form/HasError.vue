<template>
  <transition name="fade" mode="out-in" appear>
    <div
      class="error"
      v-if="form.errors.has(field)"
      v-text="form.errors.get(field)">
    </div>
  </transition>
</template>

<script>
  export default {
    name: 'has-error',
    props: {
      form: {
        type: Object,
        required: true
      },
      field: {
        type: String,
        required: true
      }
    }
  }
</script>
