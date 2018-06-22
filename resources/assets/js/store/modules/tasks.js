import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  tasks: []
}

// getters
export const getters = {
  tasks: state => state.tasks
}

// mutations
export const mutations = {
  [types.FETCH_TASKS_SUCCESS] (state, { tasks }) {
    state.tasks = tasks.data
  },

  [types.FETCH_TASKS_FAILURE] (state) {
    state.tasks = []
  },

  [types.ADD_TASK] (state, { task }) {
    state.tasks.push(task.data)
  },

  [types.UPDATE_TASK] (state, { task, description = task.description, status = task.status }) {
    task.description = description
    task.status = status
  }
}

// actions
export const actions = {
  async fetchTasks ({ commit }) {
    try {
      const { data } = await axios.get('/api/tasks')

      commit(types.FETCH_TASKS_SUCCESS, { tasks: data })
    } catch (e) {
      commit(types.FETCH_TASKS_FAILURE)
    }
  },

  async addTask ({ commit }, newTask) {
    const task = {
      user_id: newTask.user_id,
      description: newTask.description,
      status: false
    }

    const { data } = await axios.post('/api/tasks', task)

    commit(types.ADD_TASK, { task: data })
  },

  async toggleTask ({ commit }, task) {
    const { data } = await axios.patch(`/api/tasks/${task.id}`, { status: ! task.status })

    commit(types.UPDATE_TASK, { task: data })
  }
}
