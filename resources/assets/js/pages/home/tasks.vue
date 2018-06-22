<template>
  <div>
    <div class="bg-white overflow-hidden rounded-lg shadow-lg z-20">
      <header
        class="bg-white p-4 transition-all z-10"
        :class="{ 'rounded-b-lg': tasks.length == 0 }">
        <input
          class="bg-grey-lightest focus:bg-white border border-grey-lightest h-12 px-4 rounded-lg text-grey-darker transition-all w-full"
          type="text"
          name="task"
          placeholder="What do you want to do?"
          v-model="newTask"
          autofocus
          @keyup.enter="addTask" />
      </header>

      <div class="max-h-64 overflow-x-hidden overflow-y-auto">
        <task
          v-for="task in filteredTasks"
          :key="task.id"
          :task="task"></task>
      </div>
    </div>

    <footer class="px-4 py-2">
      <a class="font-bold no-underline text-grey-dark text-xs hover:text-grey-darker focus:text-grey-darker active:text-grey-dark transition-all" href="#" @click.prevent="showCompleted = !showCompleted">
        {{ showCompleted ? 'Hide Completed' : 'Show Completed' }}
      </a>
    </footer>
  </div>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'
  import Task from './task'

  export default {
    name: 'tasks',
    components: { Task },

    data: () => ({
      newTask: '',
      showCompleted: true
    }),

    computed: {
      ...mapGetters({
        tasks: 'tasks/tasks',
        user: 'auth/user'
      }),

      filteredTasks () {
        if (!this.showCompleted) return this.tasks.filter(task => !task.status)
        return this.tasks
      }
    },

    created () {
      this.listen();

      this.fetchTasks()
    },

    methods: {
      listen () {
        Echo.private(`App.${this.user.id}.Tasks`)
          .listen('TaskAdded', event => {
            this.$store.tasks.push(event.task)
          })
          .listen('TaskUpdated', event => {
            let originalTask = _.find(this.$store.tasks, {
              'id': event.task.id
            })

            console.log(event.task.id)
          })
      },

      ...mapActions({
        fetchTasks: 'tasks/fetchTasks'
      }),

      addTask (e) {
        if (this.newTask.trim()) {
          this.$store.dispatch('tasks/addTask', {
            user_id: this.user.id,
            description: this.newTask
          })

          this.newTask = ''
        }
      }
    }
  }
</script>
