import apiCaller from '../../utils/api';

export const state = {
  info: [
    {
      id: 1,
      name: "Phan Vinh Khanh",
      phoneNumber: "0382877861",
      email: "Khanh161297@gmail.com"
    },
    {
      id: 2,
      name: "Phan Vinh Khanh",
      phoneNumber: "0382877861",
      email: "Khanh161297@gmail.com"
    },
    {
      id: 3,
      name: "Phan Vinh Khanh",
      phoneNumber: "0382877861",
      email: "Khanh161297@gmail.com"
    },
    {
      id: 4,
      name: "Phan Vinh Khanh",
      phoneNumber: "0382877861",
      email: "Khanh161297@gmail.com"
    },
    {
      id: 16,
      name: "Phan Vinh Khanh",
      phoneNumber: "0382877861",
      email: "Khanh161297@gmail.com"
    },
    {
      id: 15,
      name: "Phan Vinh Khanh",
      phoneNumber: "0382877861",
      email: "Khanh161297@gmail.com"
    },
    {
      id: 9,
      name: "Phan Vinh Khanh",
      phoneNumber: "0382877861",
      email: "Khanh161297@gmail.com"
    },
    {
      id: 8,
      name: "Phan Vinh Khanh",
      phoneNumber: "0382877861",
      email: "Khanh161297@gmail.com"
    },
  ]
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
  },
  GEN_FAKEDATA: ({ state }) => {
    return state;
  }
};
