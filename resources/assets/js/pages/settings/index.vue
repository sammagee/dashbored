<template>
  <div>
    <v-header>
      <template slot="title">Settings</template>
      <template slot="nav">
        <router-link
          :to="{ name: 'settings.account' }"
          class="flex font-bold items-center justify-center mr-5 no-underline text-grey-dark hover:text-grey-darker focus:text-grey-darker transition-all"
          exact-active-class="text-indigo hover:text-indigo focus:text-indigo">
          <svg class="fill-current mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
          </svg>
          Account
        </router-link>

        <router-link
          :to="{ name: 'settings.security' }"
          class="flex font-bold items-center justify-center no-underline text-grey-dark hover:text-grey-darker focus:text-grey-darker transition-all"
          exact-active-class="text-indigo hover:text-indigo focus:text-indigo">
          <svg class="fill-current mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
          </svg>
          Security
        </router-link>
      </template>

      <template slot="nav-mobile">
        <router-link
          :to="{ name: 'settings.account' }"
          class="border-b-2 border-transparent flex font-bold items-center justify-center mr-5 no-underline text-grey-dark hover:text-grey-darker focus:text-grey-darker"
          exact-active-class="border-b-2 border-indigo text-indigo hover:text-indigo focus:text-indigo">
          <svg class="fill-current mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
          </svg>
          Account
        </router-link>

        <router-link
          :to="{ name: 'settings.security' }"
          class="border-b-2 border-transparent flex font-bold items-center justify-center no-underline text-grey-dark hover:text-grey-darker focus:text-grey-darker"
          exact-active-class="border-b-2 border-indigo text-indigo hover:text-indigo focus:text-indigo">
          <svg class="fill-current mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
          </svg>
          Security
        </router-link>
      </template>
    </v-header>

    <div class="container px-5">
      <child />
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
