<template>
  <div>
    <div class="mx-auto w-full md:w-64">
      <form @submit.prevent="update" @keydown="form.onKeydown($event)">
        <div class="bg-white mb-5 overflow-hidden rounded shadow">
          <!-- Name -->
          <div>
            <input
              name="name"
              type="text"
              class="border-b border-grey-lighter h-12 px-4 rounded-none text-grey-darker w-full"
              :class="{ 'pr-12': form.errors.has('name') }"
              placeholder="Name"
              v-model="form.name"
              autofocus />
            
            <has-error :form="form" field="name" />
          </div>

          <!-- Username -->
          <div>
            <input
              name="username"
              type="text"
              class="border-b border-grey-lighter h-12 px-4 rounded-none text-grey-darker w-full"
              :class="{ 'pr-12': form.errors.has('username') }"
              placeholder="Username"
              v-model="form.username" />
            
            <has-error :form="form" field="username" />
          </div>

          <!-- Email -->
          <div>
            <input
              name="email"
              type="email"
              class="h-12 px-4 rounded-none text-grey-darker w-full"
              :class="{ 'pr-12': form.errors.has('email') }"
              placeholder="Email"
              v-model="form.email" />

            <has-error :form="form" field="email" />
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

        flash('Your profile settings have been updated.')
      }
    }
  }
</script>

