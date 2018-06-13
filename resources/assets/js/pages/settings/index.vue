<template>
  <router-view />
</template>

<script>
  export default {
    name: 'settings-index-page',
    middleware: 'auth'
  }
</script>
