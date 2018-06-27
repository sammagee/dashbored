<template>
  <div class="w-full md:w-1/3">
    <header class="flex items-center justify-center py-4">
      <router-link :to="{ name: 'home' }" class="leading-0">
        <logo class="mr-2 w-8"></logo>
      </router-link>
      <h1 class="text-grey-darkest text-xl">{{ title }}</h1>
    </header>

    <form class="rounded shadow-lg" @submit.prevent="login" @keydown="form.onKeydown($event)">
      <div class="bg-grey-lightest flex overflow-hidden rounded-t">
        <router-link
          :to="{ name: 'auth.login' }"
          class="flex font-bold h-12 items-center justify-center no-underline text-grey-darker text-sm w-1/2"
          active-class="bg-white">
          Login
        </router-link>

        <router-link
          :to="{ name: 'auth.register' }"
          class="flex font-bold h-12 items-center justify-center no-underline text-grey-darker text-sm w-1/2"
          active-class="bg-white">
          Register
        </router-link>
      </div>

      <div class="bg-white overflow-hidden p-4 rounded-b">
        <!-- Username -->
        <div class="form-input">
          <label for="username">
            Username
            <has-error :form="form" field="username" />
          </label>

          <p id="username-hint" class="hint">The username you picked when you signed up.</p>

          <input
            aria-describedby="username-hint"
            id="username"
            name="username"
            type="text"
            v-model="form.username"
            placeholder="johndoe"
            autofocus />
        </div>

        <!-- Password -->
        <div class="form-input">
          <label for="password">
            Password
            <has-error :form="form" field="password" />
          </label>

          <p id="password-hint" class="hint">
            The password you signed up with. You should know it right? If you can't remember, <router-link :to="{ name: 'auth.password.request' }" class="font-bold no-underline hover:underline text-inherit">click here</router-link>.
          </p>

          <input
            aria-describedby="password-hint"
            id="password"
            name="password"
            type="password"
            v-model="form.password"
            placeholder="********" />
        </div>

        <!-- Remember -->
        <div class="form-input checkbox">
          <label class="flex justify-between mb-0 w-full" for="remember">
            <div>
              Remember
              <p id="remember-hint" class="hint">Do you want to be remembered?</p>
            </div>

            <input
              aria-describedby="remember-hint"
              id="remember"
              name="remember"
              type="checkbox"
              v-model="remember" />

            <span class="box ml-2"></span>
          </label>
        </div>

        <!-- Submit -->
        <div class="w-full">
          <v-button class="w-full" :loading="form.busy">
            Login
          </v-button>
        </div>
      </div>
    </form>
  </div>
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
      remember: true,
      title: window.config.appName
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
