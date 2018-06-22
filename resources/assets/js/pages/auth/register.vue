<template>
  <form @submit.prevent="register" @keydown="form.onKeydown($event)">
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
          class="border-b border-grey-lighter h-12 px-4 rounded-none text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('email') }"
          placeholder="Email"
          v-model="form.email" />

        <has-error :form="form" field="email" />
      </div>

      <!-- Password -->
      <div>
        <input
          name="password"
          type="password"
          class="border-b border-grey-lighter h-12 px-4 rounded-none text-grey-darker w-full"
          :class="{ 'pr-12': form.errors.has('password') }"
          placeholder="Password"
          v-model="form.password" />

        <has-error :form="form" field="password" />
      </div>

      <!-- Password -->
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

    <div class="mb-5">
      <v-button class="block w-full" :loading="form.busy">
        Register
      </v-button>
    </div>

    <div class="flex justify-center leading-0">
      <router-link
        :to="{ name: 'auth.login' }"
        class="font-bold no-underline text-grey-dark text-xs hover:text-grey-darker focus:text-grey-darker active:text-grey-dark transition-all">
        Login
      </router-link>
    </div>
  </form>
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
      })
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
