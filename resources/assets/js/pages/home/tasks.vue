<template>
  <div>
    <div class="bg-white max-h-64 overflow-x-hidden overflow-y-auto rounded-lg shadow-lg">
      <v-checkbox
        class="flex h-12 items-center px-4 rounded-none text-grey-darker w-full"
        toggleClass="bg-grey-lightest"
        v-for="task in tasks"
        :key="task.id"
        :checked="task.status"
        :id="`task-${task.id}`"
        :name="`task-${task.id}`">
        {{ task.description }}
      </v-checkbox>
    </div>

    <footer class="p-2">
      <a class="font-bold no-underline text-grey-dark text-xs hover:text-grey-darker focus:text-grey-darker active:text-grey-dark transition-all" href="#">Show Completed Items</a>
    </footer>
  </div>
</template>

<script>
  import { mapActions, mapGetters } from 'vuex'

  export default {
    name: 'tasks',

    computed: mapGetters({
      tasks: 'tasks/tasks'
    }),

    created () {
      this.fetchTasks()
    },

    methods: {
      ...mapActions({
        fetchTasks: 'tasks/fetchTasks'
      })
    }
  }
</script>
