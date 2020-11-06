import apiCaller from '../../utils/api';

export const state = {
    lists: [],
    totalBorrow: 0,
    currentPage: 1
}

export const getters = {
    GET_LIST_USER_STATE: state => state.lists,
    GET_TOTAL_BORROW_STATE: state => state.totalBorrow
}

export const mutations = {
    getUser(state,data){
        if (!data.error) {
            state.lists = data.data;
            state.totalBorrow = data.data.total;
            state.currentPage = data.data.current_page;
        }
        else{
            state.lists = data.error;
        }
    }
}

export const actions = {
    getListUser: ({ commit },params) => {
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                `api/user/list`,
                params,
                res => {
                    commit("getUser",res.data);
                },
                err => {
                    reject(err);
                }
            );
        });
    },

}
