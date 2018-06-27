<template>
  <click-outside :do="close">
    <div @keyup.ctrl.49="toggle" v-if="user">
      <button
        class="open-button absolute leading-0 mr-5 mt-5 pin-r pin-t text-grey focus:text-grey-dark hover:text-grey-dark z-40"
        type="button"
        @click="open">
        <svg class="fill-current h-6 text-inherit w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M0 0h24v24H0z" fill="none"/>
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
        </svg>
      </button>

      <div class="menu-wrap pb-5 min-w-48">
        <header class="flex h-16 items-center justify-between px-5">
          <div class="flex items-center justify-center">
            <img :src="user.photo_url" class="rounded-full mr-3 w-10">
            <span class="font-bold text-grey">{{ user.name }}</span>
          </div>

          <button
            class="close-button leading-0 ml-5 text-grey focus:text-grey-dark hover:text-grey-dark"
            ref="closeButton"
            @click="close">
            <svg class="fill-current h-4 text-inherit w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
              <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
          </button>
        </header>

        <div>
          <router-link
            :to="{ name: 'home' }"
            class="focus:bg-grey-darker hover:bg-grey-darker flex items-center no-underline px-5 py-3 text-grey-dark"
            exact-active-class="bg-grey-darker">
            <svg class="fill-current h-4 mr-2 text-inherit w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
              <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
            Home
          </router-link>

          <router-link
            :to="{ name: 'settings.account' }"
            class="focus:bg-grey-darker hover:bg-grey-darker flex items-center no-underline px-5 py-3 text-grey-dark"
            exact-active-class="bg-grey-darker">
            <svg class="fill-current h-4 mr-2 text-inherit w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M0 0h24v24H0z" fill="none"/>
              <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
            </svg>
            Settings
          </router-link>

          <a class="focus:bg-grey-darker hover:bg-grey-darker flex items-center no-underline px-5 py-3 text-grey-dark" href="#" @click.prevent="logout">
            <svg class="fill-current h-4 mr-2 text-inherit w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M0 0h24v24H0z" fill="none"/>
              <path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
            </svg>
            Logout
          </a>
        </div>
      </div>
    </div>
  </click-outside>
</template>

<script>
  import { mapGetters } from 'vuex'
  import Hammer from 'hammerjs'
  import Mousetrap from 'mousetrap'

  export default {
    name: 'v-menu',

    data: () => ({
      isOpen: false
    }),

    computed: mapGetters({
      user: 'auth/user'
    }),

    watch: {
      $route (to, from) {
        this.close()
      }
    },

    mounted () {
      Mousetrap
        .bind('esc', () => {
          if (this.isOpen) this.close()
        })
        .bind('ctrl+b', () => {
          this.toggle()
        })
    },

    destroyed () {
      this.close()
    },

    methods: {
      toggle () {
        this.isOpen = ! this.isOpen
        document.body.classList.toggle('show-menu')
      },

      open () {
        this.isOpen = true
        document.body.classList.add('show-menu')
      },

      close () {
        this.isOpen = false
        document.body.classList.remove('show-menu')
      },

      async logout () {
        // Log out the user.
        await this.$store.dispatch('auth/logout')
        // Redirect to login.
        this.$router.push({ name: 'auth.login' })

        flash('You have been logged out!')
      }
    }
  }
</script>
