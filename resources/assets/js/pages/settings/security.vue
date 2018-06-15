<template>
  <div>
    <div class="mx-auto w-full md:w-64">
      <form @submit.prevent="update" @keydown="form.onKeydown($event)">
        <div class="bg-white mb-4 overflow-hidden rounded shadow">
          <!-- Password -->
          <div>
            <input
              name="password"
              type="password"
              class="border-b border-grey-lighter h-12 px-4 rounded-none text-grey-darker w-full"
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
              class="h-12 px-4 rounded-none text-grey-darker w-full"
              :class="{ 'pr-12': form.errors.has('password_confirmation') }"
              placeholder="Confirm Password"
              v-model="form.password_confirmation" />

            <has-error :form="form" field="password_confirmation" />
          </div>
        </div>

        <div class="mb-2">
          <v-button class="block w-full" :loading="form.busy">
            Update
          </v-button>
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
