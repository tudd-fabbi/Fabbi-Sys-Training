import apiCaller from '../../utils/api';

export const state = {
  tasks: null,
};

export const getters = {
  tasks: state => state.tasks
};

export const mutations = {
  setTasks(state, tasks) {
    state.tasks = tasks;
  },
}

export const actions = {
  getTasks({commit}, params) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/tasks',
        params,
        response => {
          commit('setTasks', response.data.data);
          resolve(response.data.data);
        },
        err => {
          reject(err.response);
        }
      )
    });
  },
  delete({}, id) {
    return new Promise((resolve, reject) => {
      apiCaller.deleteRequest(
        '/api/tasks/' + id,
        '',
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      )
    });
  },
}
