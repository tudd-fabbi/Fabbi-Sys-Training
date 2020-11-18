import apiCaller from '../../utils/api';

export const state = {

};

export const getters = {

};

export const mutations = {

};

export const actions = {
  ADD_USER: ({ } ,data) => {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        `api/user`,
        data.params,
        res => {
          resolve(res.data);
        },
        err => {
          reject(err);
        }
      );
    });
  }
};
