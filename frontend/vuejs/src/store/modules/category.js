import apiCaller from '../../utils/api';

export const state = {
  test: 1
};

export const getters = {
  GET_TEST_STATE: state => state.test
};

export const mutations = {

};

export const actions = {
  getData({ }) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/categories',
        '',
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },
  deleteData({ }, id) {
    return new Promise((resolve, reject) => {
      apiCaller.deleteRequest(
        '/api/category/' + id,
        '',
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },
  updateData({ }, params) {
    return new Promise((resolve, reject) => {
      apiCaller.putRequest(
        '/api/category/' + params.id,
        params.name,
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },
  addChildrenData({ }, params) {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        '/api/categories/add/children',
        params,
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },
  addAllParentData({ }, params) {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        '/api/categories/add/all/parent/' + params.id,
        params.data,
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },
  addOneParentData({ }, params) {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        '/api/categories/add/one/parent/' + params.id,
        params.data,
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },
  
};
