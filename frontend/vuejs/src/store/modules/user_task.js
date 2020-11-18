import apiCaller from '../../utils/api';

export const state = {
  user_task: [
    { id: 1, task_name: 'task1', user_name: 'abc', status: 1, report: 'báo cáo ok', comment: 'oke' },
    { id: 2, task_name: 'task2', user_name: 'abd', status: 1, report: 'báo cáo ok', comment: 'oke' },
    { id: 3, task_name: 'task3', user_name: 'abe', status: 0, report: 'báo cáo chưa làm', comment: 'oke' },
    { id: 3, task_name: 'task3', user_name: 'abe', status: 0, report: 'báo cáo chưa làm', comment: 'oke' },
    { id: 3, task_name: 'task3', user_name: 'abe', status: 0, report: 'báo cáo chưa làm', comment: 'oke' },
    { id: 3, task_name: 'task3', user_name: 'abe', status: 0, report: 'báo cáo chưa làm', comment: 'oke' },
    { id: 3, task_name: 'task3', user_name: 'abe', status: 0, report: 'báo cáo chưa làm', comment: 'oke' },
    { id: 4, task_name: 'task4', user_name: 'abf', status: 0, report: 'báo cáo chưa làm', comment: 'oke' },
    { id: 5, task_name: 'task5', user_name: 'abg', status: 1, report: 'báo cáo ok', comment: 'oke' },
    { id: 6, task_name: 'task6', user_name: 'abh', status: 0, report: 'báo cáo chưa làm', comment: 'oke' },
  ]
};

export const mutations = {
  setTasks(state, user_task) {
    state.user_task = user_task;
  },
}

export const actions = {
  getUserTask(state) {
    return state;
  }
}
