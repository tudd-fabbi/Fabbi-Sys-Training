import apiCaller from '../../utils/api';

export const state = {
  test: [
    {
      id: '1',
      name: "PHP cơ bản",
      description: "Hướng dẫn bạn học PHP cơ bản nhất",
      time: "30",
      is_active: "1",
    },
    {
      id: '2',
      name: "PHP nâng cao",
      description: "Hướng dẫn bạn học các kiến thức PHP nâng cao",
      time: "30",
      is_active: "0",
    },
    {
      id: '3',
      name: "Vuejs cơ bản",
      description: "Hướng dẫn bạn học Vuejs cơ bản nhất",
      time: "30",
      is_active: "1",
    },
    {
      name: "Vuejs nâng cao",
      description: "Hướng dẫn bạn học các kiến thức vuejs nâng cao",
      time: "30",
      is_active: "0",
    },
    {
      id: '4',
      name: "OOP",
      description: "Hướng dẫn bạn học các kiến thức vế OOP",
      time: "20",
      is_active: "1",
    },
    {
      id: '5',
      name: "ReactNative cơ bản",
      description: "Hướng dẫn bạn học ReactNative cơ bản nhất",
      time: "40",
      is_active: "1",
    },
    {
      id: '6',
      name: "ReactJs cơ bản ",
      description: "Hướng dẫn bạn học ReactJs cơ bản nhất",
      time: "30",
      is_active: "1",
    },
    {
      id: '7',
      name: "Laravel cơ bản",
      description: "Hướng dẫn bạn học Laravel cơ bản nhất",
      time: "30",
      is_active: "1",
    },
    {
      id: '8',
      name: "SQL cơ bản",
      description: "Hướng dẫn bạn học SQL cơ bản nhất",
      time: "30",
      is_active: "0",
    },
    {
      id: '9',
      name: "Javascript cơ bản",
      description: "Hướng dẫn bạn học Javascript cơ bản nhất",
      time: "30",
      is_active: "0",
    },
    {
      id: '10',
      name: "Java cơ bản",
      description: "Hướng dẫn bạn học Java cơ bản nhất",
      time: "30",
      is_active: "1",
    },
  ],

  Course: [
    {
      id: '1',
      name: 'Khoa hoc PHP',
      description: "Hoc PHP tu co ban den nang cao"
    },
    {
      id: '2',
      name: 'Khoa hoc VueJs',
      description: "Hoc VueJs tu co ban den nang cao"
    },
    {
      id: '3',
      name: 'Khoa hoc Java',
      description: "Hoc Java tu co ban den nang cao"
    },
    {
      id: '4',
      name: 'Khoa hoc Laravel',
      description: "Hoc Laravel tu co ban den nang cao"
    },
    {
      id: '5',
      name: 'Khoa hoc Javascript',
      description: "Hoc Javascript tu co ban den nang cao"
    },
    {
      id: '6',
      name: 'Khoa hoc ReactJs',
      description: "Hoc ReactJs tu co ban den nang cao"
    },
    {
      id: '7',
      name: 'Khoa hoc SQL',
      description: "Hoc SQL tu co ban den nang cao"
    },
    {
      id: '8',
      name: 'Khoa hoc ReactNative',
      description: "Hoc ReactNative tu co ban den nang cao"
    },

  ]
};

export const getters = {
  listSubject: state => state.test
};


export const mutations = {};

export const actions = {
  getSubject({state}) {
    return state;
  },
  getDataById({state}, id) {
    return state.test[id - 1];
  },
  getData({commit}, param) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/subject/list',
        param,
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },
  deleteData({commit}, id) {
    return new Promise((resolve, reject) => {
      apiCaller.deleteRequest(
        '/api/delete/subject/' + id,
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

  addData({commit}, param) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/subject/add',
        param,
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },

  getSubjectById({commit}, id) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/getsubjectbyid/' + id,
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

  countTaskbyId({commit}, id) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/countTask/' + id,
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
  countCoursebyId({commit}, id) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/countCourse/' + id,
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
  countUserbyId({commit}, id) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/countUser/' + id,
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
  updateData({commit}, param) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/updateSubject',
        param,
        response => {
          resolve(response.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  },
  listCourse({commit}, id) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/listCourse/' + id,
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
  getAllSubject({}) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        '/api/subject/all',
        '',
        response => {
          resolve(response.data.data);
        },
        err => {
          reject(err.response.data);
        }
      );
    });
  }
};

