<template>
  <div class="w-full md:w-1/2">
    <header class="flex items-center justify-center py-4">
      <router-link :to="{ name: 'home' }" class="leading-0">
        <logo class="mr-2 w-8"></logo>
      </router-link>
      <h1 class="text-grey-darkest text-xl">{{ title }}</h1>
    </header>

    <form class="rounded shadow-lg" @submit.prevent="register" @keydown="form.onKeydown($event)">
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
        <div class="md:flex">
          <!-- Name -->
          <div class="form-input md:mr-4 md:w-1/2">
            <label for="name">
              Name
              <has-error :form="form" field="name" />
            </label>

            <p id="name-hint" class="hint">Some go by their first name, some by their full.</p>

            <input
              aria-describedby="name-hint"
              id="name"
              name="name"
              type="text"
              v-model="form.name"
              placeholder="John Doe"
              autofocus />
          </div>

          <!-- Username -->
          <div class="form-input md:w-1/2">
            <label for="username">
              Username
              <has-error :form="form" field="username" />
            </label>

            <p id="username-hint" class="hint">Any mix of letters/numbers you want - must be between 3 and 20 characters.</p>

            <input
              aria-describedby="username-hint"
              id="username"
              name="username"
              type="text"
              v-model="form.username"
              placeholder="johndoe" />
          </div>
        </div>

        <!-- Email -->
        <div class="form-input">
          <label for="email">
            Email
            <has-error :form="form" field="email" />
          </label>

          <p id="email-hint" class="hint">The email you'd like to receive emails on. (Almost never)</p>

          <input
            aria-describedby="email-hint"
            id="email"
            name="email"
            type="email"
            v-model="form.email"
            placeholder="john@example.com" />
        </div>

        <div class="md:flex">
          <!-- Password -->
          <div class="form-input md:mr-4 md:w-1/2">
            <label for="password">
              Password
              <has-error :form="form" field="password" />
            </label>

            <p id="password-hint" class="hint">Must be at least 6 characters. You should probably make it pretty safe.</p>

            <input
              aria-describedby="password-hint"
              id="password"
              name="password"
              type="password"
              v-model="form.password"
              placeholder="********" />
          </div>

          <!-- Password Confirmation -->
          <div class="form-input md:w-1/2">
            <label for="password_confirmation">
              Confirm Password
              <has-error :form="form" field="password_confirmation" />
            </label>

            <p id="password-confirmation-hint" class="hint">Confirm that the password you typed before this is the one you want.</p>

            <input
              aria-describedby="password-confirmation-hint"
              id="password_confirmation"
              name="password_confirmation"
              type="password"
              v-model="form.password_confirmation"
              placeholder="********" />
          </div>
        </div>

        <!-- Submit -->
        <div>
          <v-button class="w-full" :loading="form.busy">
            Register
          </v-button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  import Form from 'vform'

  export default {
    name: 'register-page',
    layout: 'basic',
    middleware: 'guest',

    metaInfo () {
      return { title: 'Register' }
    },

    data: () => ({
      form: new Form({
        name: '',
        username: '',
        email: '',
        password: '',
        password_confirmation: ''
      }),
      title: window.config.appName
    }),

    methods: {
      async register () {
        // Register the user.
        const { data } = await this.form.post('/api/register')

        // Log in the user.
        const { data: { token } } = await this.form.post('/api/login')

        // Save the token.
        this.$store.dispatch('auth/saveToken', { token })

        // Update the user.
        await this.$store.dispatch('auth/updateUser', { user: data })

        // Redirect home.
        this.$router.push({ name: 'home' })

        flash('You have registered and been logged in!')
      }
    }
  }
</script>
