<template>
  <div class="bg-black h-full">
    <v-menu></v-menu>

    <div class="page-wrap" ref="content">
      <div class="page">
        <child />
      </div>
    </div>
  </div>
</template>

<script>
  import VMenu from '~/components/Menu'

  export default {
    name: 'default-layout',

    components: { VMenu },
  }
</script>
