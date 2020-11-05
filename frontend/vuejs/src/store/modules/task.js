import apiCaller from '../../utils/api';

export const state = {
    tasks: null
};

export const getters = {
    tasks: state => state.tasks
};

export const mutations = {
    setTasks(state, tasks) {
        state.tasks = tasks;
    }
}
export const actions = {
    getTasks({commit}, page) {
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/auth/list-task',
                page,
                response => {
                    commit('setTasks', response.data);
                    // console.log(response.data)
                    resolve(response.data);
                },
                err => {
                    reject(err.response);
                }
            )
        });
    },
    delete({commit}, id) {
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/auth/delete-task/' + id,
                '',
                response => {
                    commit('setTasks', response.data);
                    resolve(response.data);
                },
                err => {
                    reject(err.response.data);
                }
            )
        });
    },
    search({commit}, key) {
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/auth/search/' + key,
                '',
                response => {
                    commit('setTasks', response.data);
                    resolve(response.data);
                },
                err => {
                    reject(err.response.data);
                }
            )
        })
    }
}
