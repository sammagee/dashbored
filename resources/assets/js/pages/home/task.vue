<template>
  <v-checkbox
    class="flex h-12 items-center px-4 rounded-none text-grey-darker w-full"
    toggleClass="bg-grey-lightest"
    :checked="task.status"
    :id="`task-${task.id}`"
    :name="`task-${task.id}`"
    v-model="task.status"
    @click="toggleTask(task)">
    {{ task.description }}
  </v-checkbox>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'

  export default {
    name: 'task',
    props: {
      task: Object
    },

    computed: {
      ...mapGetters({
        user: 'auth/user'
      })
    },

    created () {
      this.listen()
    },

    methods: {
      listen () {
        Echo.private(`App.${this.user.id}.Tasks.${this.task.id}`)
          .listen('TaskUpdated', event => {
            this.task.status = event.task.status
          })
      },

      ...mapActions({
        toggleTask: 'tasks/toggleTask'
      })
    }
  }
</script>
