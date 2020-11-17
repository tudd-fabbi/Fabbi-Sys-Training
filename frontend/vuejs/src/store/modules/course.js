import apiCaller from "../../utils/api";

export const state = {};
export const actions = {
    getData({}, param) {
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
    destroyCourse({}, id) {
        return new Promise(((resolve, reject) => {
            apiCaller.deleteRequest(
                '/api/course/' + id,
                '',
                response => {
                    resolve(response.data);
                },
                err => {
                    reject(err.response.data);
                }
            )
        }))
    }
}
