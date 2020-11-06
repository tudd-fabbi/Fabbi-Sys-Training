import axios from 'axios';
import AuthToken from './token';

// const SERVER_BASE_URL = process.env.BASE_URL;

const SERVER_BASE_URL = "http://localhost:2222";

const http = axios.create({
  baseURL: "http://localhost:2222",
  headers: {
    'Content-Type': 'application/json'
  }
});
/* eslint no-param-reassign: "error" */
http.interceptors.request.use(config => {
  const token = AuthToken.getToken();
  if (token) {
    config.headers.common.Authorization = `Bearer ${token}`;
  }
  return config;
}, error => Promise.reject(error));

const postRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .post(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

const getRequest = function (url, data, resolve, reject) {
//   const requestUrl = SERVER_BASE_URL + url;
  const requestUrl = url;
  http
    .get(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

const putRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .put(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

const patchRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .patch(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

const deleteRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .delete(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

export default {
  getRequest,
  postRequest,
  putRequest,
  patchRequest,
  deleteRequest
};
