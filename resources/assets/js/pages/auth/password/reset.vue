<template>
  <form @submit.prevent="reset" @keydown="form.onKeydown($event)">
    <div class="bg-white mb-4 overflow-hidden rounded shadow">
      <!-- Email -->
      <div>
        <input
          name="email"
          type="email"
          class="border-b border-grey-lighter h-12 px-4 text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('username') }"
          placeholder="Email"
          readonly
          v-model="form.email" />

        <has-error :form="form" field="email" />
      </div>

      <!-- Password -->
      <div>
        <input
          name="password"
          type="password"
          class="border-b border-grey-lighter h-12 px-4 text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('password') }"
          placeholder="Password"
          v-model="form.password"
          autofocus />

        <has-error :form="form" field="password" />
      </div>

      <!-- Password Confirmation -->
      <div>
        <input
          name="password_confirmation"
          type="password"
          class="h-12 px-4 text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('password_confirmation') }"
          placeholder="Confirm Password"
          v-model="form.password_confirmation" />

        <has-error :form="form" field="password_confirmation" />
      </div>
    </div>

    <div>
      <v-button class="block w-full" :loading="form.busy">
        Reset
      </v-button>
    </div>
  </form>
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
      })
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

