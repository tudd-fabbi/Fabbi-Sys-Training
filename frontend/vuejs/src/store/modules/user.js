import apiCaller from '../../utils/api';

export const state = {
  errors: []
};

export const getters = {
  errors: state => state.errors
};

export const mutations = {
  getNotify(state,data)
  {
    state.errors = data;
  }
};

export const actions = {
  ADD_USER: ({ commit } ,data) => {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        `api/user`,
        data.params,
        res => {
          commit("getNotify", res.data);
          resolve(res.data);
        },
        err => {
          reject(err);
        }
      );
    });
  },
  GET_USER: ({ } ,params) => {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        `api/user`,
        params,
        res => {
          resolve(res.data);
        },
        err => {
          reject(err);
        }
      );
    });
  },
  DELETE_USER: ({}, id) => {
    return new Promise((resolve, reject) => {
      apiCaller.deleteRequest(
        '/api/user/' + id,
        null,
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      )
    });
  }
};
