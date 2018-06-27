<template>
  <div class="w-full md:w-1/3">
    <header class="flex items-center justify-center py-4">
      <router-link :to="{ name: 'home' }" class="leading-0">
        <logo class="mr-2 w-8"></logo>
      </router-link>
      <h1 class="text-grey-darkest text-xl">{{ title }}</h1>
    </header>

    <form class="rounded shadow-lg" @submit.prevent="request" @keydown="form.onKeydown($event)">
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
            v-model="form.email"
            placeholder="john@example.com"
            autofocus />
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
    name: 'password-reset-request-page',
    layout: 'basic',
    middleware: 'guest',

    metaInfo () {
      return { title: 'Reset Password' }
    },

    data: () => ({
      form: new Form({
        email: ''
      }),
      title: window.config.appName
    }),

    methods: {
      async request () {
        const { data } = await this.form.post('/api/password/email')

        this.status = data.status

        this.form.reset()

        flash(this.status)
      }
    }
  }
</script>

