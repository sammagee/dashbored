<template>
  <div class="flex flex-col h-full items-center justify-center container">
    <a href="#" @click.prevent="logout">Logout</a>

    <clock></clock>

    <div class="flex flex-wrap justify-center w-full -mx-4">
      <div class="p-4 w-full md:w-1/2 lg:w-1/3">
        <div class="bg-white p-16 rounded-lg shadow-lg">

        </div>
      </div>

      <div class="p-4 w-full md:w-1/2 lg:w-1/3">
        <div class="bg-white p-16 rounded-lg shadow-lg">

        </div>
      </div>

      <div class="p-4 w-full md:w-1/2 lg:w-1/3">
        <div class="bg-white p-16 rounded-lg shadow-lg">

        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'home',
    middleware: 'auth',

    metaInfo () {
      return { title: 'Home' }
    },

    methods: {
      async logout () {
        // Log out the user.
        await this.$store.dispatch('auth/logout')
        // Redirect to login.
        this.$router.push({ name: 'auth.login' })
      }
    }
  }
</script>
