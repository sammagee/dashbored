<template>
  <div>
    <v-header>
      <template slot="title">Settings</template>
      <template slot="nav">
        <router-link
          :to="{ name: 'settings.profile' }"
          class="border-b-2 border-transparent flex font-bold items-center justify-center mr-5 no-underline text-grey-dark hover:text-grey-darker"
          exact-active-class="border-b-2 border-indigo text-indigo">
          <svg class="fill-current mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
          </svg>
          Profile
        </router-link>

        <router-link
          :to="{ name: 'settings.security' }"
          class="border-b-2 border-transparent flex font-bold items-center justify-center no-underline text-grey-dark hover:text-grey-darker"
          exact-active-class="border-b-2 border-indigo text-indigo">
          <svg class="fill-current mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
          </svg>
          Security
        </router-link>
      </template>
    </v-header>
    
    <div class="container px-5">
      <router-view />
    </div>
  </div>
</template>

<script>
  import VHeader from '~/components/Header'

  export default {
    name: 'settings-index-page',
    middleware: 'auth',

    components: { VHeader }
  }
</script>
