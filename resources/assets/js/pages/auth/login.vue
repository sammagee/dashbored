<template>
  <form @submit.prevent="login" @keydown="form.onKeydown($event)">
    <div class="bg-white mb-5 overflow-hidden rounded shadow">
      <!-- Username -->
      <div>
        <input
          name="username"
          type="text"
          class="border-b border-grey-lighter h-12 px-4 rounded-none text-grey-darker w-full"
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
          class="border-b border-grey-lighter h-12 px-4 rounded-none text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('password') }"
          placeholder="Password"
          v-model="form.password" />

        <has-error :form="form" field="password" />
      </div>

      <!-- Remember -->
      <div>
        <v-checkbox
          class="flex h-12 items-center px-4 rounded-none text-grey-darker w-full"
          toggleClass="bg-grey-lightest"
          v-model="remember"
          name="remember">
          Remember
        </v-checkbox>
      </div>
    </div>

    <div class="mb-5">
      <v-button class="block w-full" :loading="form.busy">
        Login
      </v-button>
    </div>

    <div class="flex justify-between leading-0">
      <router-link
        :to="{ name: 'auth.register' }"
        class="font-bold no-underline text-grey-dark text-xs hover:text-grey-darker focus:text-grey-darker active:text-grey-dark transition-all">
        Register
      </router-link>

      <router-link
        :to="{ name: 'auth.password.request' }"
        class="font-bold no-underline text-grey-dark text-xs hover:text-grey-darker focus:text-grey-darker active:text-grey-dark transition-all">
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
      remember: true
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

        flash('You have been logged in!')
      }
    }
  }
</script>
