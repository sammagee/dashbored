<template>
  <form @submit.prevent="request" @keydown="form.onKeydown($event)">
    <div class="bg-white mb-4 overflow-hidden rounded shadow">
      <!-- Email -->
      <div>
        <input
          name="email"
          type="email"
          class="h-12 px-4 rounded-none text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('username') }"
          placeholder="Email"
          v-model="form.email"
          autofocus />

        <has-error :form="form" field="email" />
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
    name: 'password-reset-request-page',
    layout: 'basic',
    middleware: 'guest',

    metaInfo () {
      return { title: 'Reset Password' }
    },

    data: () => ({
      form: new Form({
        email: ''
      })
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

