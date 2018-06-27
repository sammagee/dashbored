<template>
  <div>
    <div class="mb-6 mx-auto w-full md:w-1/3 px-4">
      <form class="rounded shadow-lg" @submit.prevent="update" @keydown="form.onKeydown($event)">
        <div class="bg-white overflow-hidden p-4 rounded">
          <!-- Name -->
          <div class="form-input">
            <label for="name">
              Name
              <has-error :form="form" field="name" />
            </label>

            <p id="name-hint" class="hint">The easiest way to change your name.</p>

            <input
              aria-describedby="name-hint"
              id="name"
              name="name"
              type="text"
              v-model="form.name"
              :placeholder="form.name"
              autofocus />
          </div>

          <!-- Username -->
          <div class="form-input">
            <label for="username">
              Username
              <has-error :form="form" field="username" />
            </label>

            <p id="username-hint" class="hint">Changing your username is cool, but make sure you remember it so you can login. (Also remember that you can't get it back if someone else takes it.)</p>

            <input
              aria-describedby="username-hint"
              id="username"
              name="username"
              type="text"
              v-model="form.username"
              :placeholder="form.username" />
          </div>

          <!-- Email -->
          <div class="form-input">
            <label for="email">
              Email
              <has-error :form="form" field="email" />
            </label>

            <p id="email-hint" class="hint">You can change your email here, but remember the email you change it to, so you can recover your account.</p>

            <input
              aria-describedby="email-hint"
              name="email"
              type="email"
              v-model="form.email"
              :placeholder="form.email" />
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
  import { mapGetters } from 'vuex'

  export default {
    name: 'settings-profile-page',
    scrollToTop: false,

    metaInfo () {
      return { title: 'Profile Settings' }
    },

    data: () => ({
      form: new Form({
        name: '',
        username: '',
        email: '',
      })
    }),

    computed: mapGetters({
      user: 'auth/user'
    }),

    created () {
      // Fill the form with user data.
      this.form.keys().forEach(key => {
        this.form[key] = this.user[key]
      })
    },

    methods: {
      async update () {
        const { data } = await this.form.patch('/api/settings/profile')

        this.$store.dispatch('auth/updateUser', { user: data })

        flash('Your account settings have been updated.')
      }
    }
  }
</script>

