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
    TEST_ACTION: ({ }) => {
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                `api/test`,
                null,
                res => {
                    console.log('res');
                    resolve(res);
                },
                err => {
                    reject(err);
                }
            );
        });
    }
};
