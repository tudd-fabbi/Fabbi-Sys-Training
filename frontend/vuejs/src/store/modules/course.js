import apiCaller from '../../utils/api';

export const state = {
  course: null
};

export const mutations = {
  setCourse(state, course) {
    state.course = course;
  },
}

export const actions = {
  getData({commit}, param) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/course',
        param,
        response => {
          resolve(response.data.data);
        },
        err => {
          reject(err.response.data.data);
        }
      );
    });

  },
}
