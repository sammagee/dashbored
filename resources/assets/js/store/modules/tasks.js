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
}
