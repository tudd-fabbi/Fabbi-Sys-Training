import apiCaller from '../../utils/api';

export const state = {
  info: {
    name: "Phan Vinh Khanh",
    courseParticipated: ["Course1","Course2"],
    courseCompleted: "Course1",
    numberSubjectParticipated: 100,
    numberTaskParticipated: 400,
    numberSubjectCompleted: 60,
    numberTaskCompleted: 200
  }
};

export const getters = {

};

export const mutations = {

};

export const actions = {
  GEN_FAKEDATA({ state }) {
    return state;
  }
};
