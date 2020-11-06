import apiCaller from '../../utils/api';

export const state = {
    
};

export const getters = {
   
};

export const mutations = {
};

export const actions = {
    getData({commit},param) {
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

    

    deleteData({commit},id){
        return new Promise((resolve, reject) => {
            apiCaller.deleteRequest(
                '/api/delete/subject/'+id,
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

    addData({commit},param){
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

    getSubjectById({commit},id){
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/getsubjectbyid/'+id,
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

    countTaskbyId({commit},id){
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/countTask/'+id,
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
    countCoursebyId({commit},id){
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/countCourse/'+id,
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
    countUserbyId({commit},id){
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/countUser/'+id,
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
    updateData({commit},param){
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

    listCourse({commit},id){
        return new Promise((resolve, reject) => {
            apiCaller.getRequest(
                '/api/listCourse'+id,
                '',
                response => {
                    resolve(response.data);
                },
                err => {
                    reject(err.response.data);
                }
            );
        });
    }

    

   
};

