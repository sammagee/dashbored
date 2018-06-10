<template>
  <form @submit.prevent="login" @keydown="form.onKeydown($event)">
    <div class="bg-white mb-4 overflow-hidden rounded shadow">
      <!-- Username -->
      <div>
        <input
          name="username"
          type="text"
          class="border-b border-grey-lighter h-12 px-4 text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('username') }"
          placeholder="Username"
          v-model="form.username"
          autofocus />
        
        <has-error :form="form" field="username" />
      </div>

      <!-- Password -->
      <div>
        <input
          name="password"
          type="password"
          class="h-12 px-4 text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('password') }"
          placeholder="Password"
          v-model="form.password" />

        <has-error :form="form" field="password" />
      </div>
    </div>

    <div class="mb-2">
      <v-button class="block w-full" :loading="form.busy">
        Login
      </v-button>
    </div>

    <div class="text-center">
      <router-link
        :to="{ name: 'auth.password.request' }"
        class="font-bold no-underline text-black text-xs hover:text-grey-darker focus:text-grey-darker active:text-grey-darkest transition-all">
        Forgot your info?
      </router-link>
    </div>
  </form>
</template>

<script>
  import Form from 'vform'

  export default {
    name: 'login-page',
    layout: 'basic',
    middleware: 'guest',

    metaInfo () {
      return { title: 'Login' }
    },

    data: () => ({
      form: new Form({
        username: '',
        password: ''
      }),
      remember: false
    }),

    methods: {
      async login () {
        // Submit the data.
        const { data } = await this.form.post('/api/login')

        // Save the token
        this.$store.dispatch('auth/saveToken', {
          token: data.token,
          remember: this.remember
        })

        // Fetch the user.
        await this.$store.dispatch('auth/fetchUser')

        // Redirect home.
        this.$router.push({ name: 'home' })
      }
    }
  }
</script>
