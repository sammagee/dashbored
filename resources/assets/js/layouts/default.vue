<template>
  <div class="bg-black h-full overflow-hidden">
    <v-menu></v-menu>

    <div class="page-wrap" ref="content">
      <div class="page">
        <transition name="fade" mode="out-in" appear>
          <child />
        </transition>
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
