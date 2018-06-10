<template>
  <div
    class="absolute cursor-pointer flex font-bold h-12 items-center justify-center leading-none pin-r pin-t px-4 text-red text-xs"
    v-if="form.errors.has(field)"
    v-tooltip.right="form.errors.get(field)">
    <span>!</span>
  </div>
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
