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
                '/api/auth/list-task',
                params,
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
                    commit('setTask', response.data);
                    resolve(response.data);
                },
                err => {
                    reject(err.response.data);
                }
            )
        });
    },
    update({commit}, task) {
        return new Promise((resolve, reject) => {
            apiCaller.postRequest(
                '/api/auth/update-task/' + task.id,
                task,
                response => {
                    commit('setTasks', response);
                    resolve(response);
                },
                err => {
                    reject(err.response.data);
                }
            )
        });
    },
    create({commit}, task) {
        return new Promise((resolve, reject) => {
            apiCaller.postRequest(
                '/api/auth/create-task',
                task,
                response => {
                    commit('setTasks', response);
                    // console.log(task);
                    resolve(response);
                },
                err => {
                    reject(err.response.data);
                }
            )
        });
    },
    getTaskById({commit}, id) {
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/auth/task/' + id,
                '',
                response => {
                    commit('setTasks', response.data);
                    resolve(response.data);
                },
                err => {
                    reject(err.response);
                }
            )
        });
    }
}
