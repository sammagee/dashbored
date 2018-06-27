<template>
  <div class="w-full md:w-1/2 px-4">
    <header class="flex items-center justify-center py-4">
      <router-link :to="{ name: 'home' }" class="leading-0">
        <logo class="mr-2 w-8"></logo>
      </router-link>
      <h1 class="text-grey-darkest text-xl">{{ title }}</h1>
    </header>

    <form class="rounded shadow-lg" @submit.prevent="reset" @keydown="form.onKeydown($event)">
      <div class="bg-white overflow-hidden p-4 rounded">
        <!-- Email -->
        <div class="form-input">
          <label for="email">
            Email
            <has-error :form="form" field="email" />
          </label>

          <p id="email-hint" class="hint">The email associated with your account.</p>

          <input
            aria-describedby="email-hint"
            id="email"
            name="email"
            type="email"
            readonly
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

            <p id="password-hint" class="hint">Choose a new password. Must be at least 6 characters. You should probably make it pretty safe, but something you can remember this time.</p>

            <input
              aria-describedby="password-hint"
              id="password"
              name="password"
              type="password"
              v-model="form.password"
              placeholder="********"
              autofocus />
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
            Reset
          </v-button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
  import Form from 'vform'

  export default {
    name: 'reset-password-page',
    layout: 'basic',
    middleware: 'guest',

    metaInfo () {
      return { title: 'Reset Password' }
    },

    data: () => ({
      status: '',
      form: new Form({
        token: '',
        email: '',
        password: '',
        password_confirmation: ''
      }),
      title: window.config.appName
    }),

    created () {
      this.form.email = this.$route.query.email
      this.form.token = this.$route.params.token
    },

    methods: {
      async reset () {
        const { data } = await this.form.post('/api/password/reset')

        this.status = data.status

        this.$router.push({ name: 'auth.login' })

        flash(this.status)
      }
    }
  }
</script>

