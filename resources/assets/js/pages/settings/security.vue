<template>
  <div>
    <div class="mx-auto w-full md:w-1/3 px-4">
      <form class="rounded shadow-lg" @submit.prevent="update" @keydown="form.onKeydown($event)">
        <div class="bg-white overflow-hidden p-4 rounded">
          <!-- Password -->
          <div class="form-input">
            <label for="password">
              New Password
              <has-error :form="form" field="password" />
            </label>

            <p id="password-hint" class="hint">Change your password.</p>

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
          <div class="form-input">
            <label for="password_confirmation">
              Confirm Password
              <has-error :form="form" field="password_confirmation" />
            </label>

            <p id="password-confirmation-hint" class="hint">Confirm your new password.</p>

            <input
              aria-describedby="password-confirmation-hint"
              id="password_confirmation"
              name="password_confirmation"
              type="password"
              v-model="form.password_confirmation"
              placeholder="********" />
          </div>

          <!-- Submit -->
          <div>
            <v-button class="w-full" :loading="form.busy">
              Update
            </v-button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import Form from 'vform'

  export default {
    name: 'settings-security-page',
    scrollToTop: false,

    metaInfo () {
      return { title: 'Security Settings' }
    },

    data: () => ({
      form: new Form({
        password: '',
        password_confirmation: ''
      })
    }),

    methods: {
      async update () {
        await this.form.patch('/api/settings/security')

        this.form.reset()

        flash('Your security settings have been updated.')
      }
    }
  }
</script>
