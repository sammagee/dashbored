<template>
  <div class="container flex flex-col h-full items-center justify-center py-16">
    <clock></clock>

    <div class="flex flex-wrap justify-center max-h-full w-full -mx-4">
      <div class="max-h-full p-4 w-full md:w-1/2 lg:w-1/3">
        <tasks></tasks>
      </div>
    </div>
  </div>
</template>

<script>
  import Tasks from './tasks'

  export default {
    name: 'home',
    middleware: 'auth',
    components: { Tasks },

    metaInfo () {
      return { titleTemplate: 'Dash' }
    }
  }
</script>
