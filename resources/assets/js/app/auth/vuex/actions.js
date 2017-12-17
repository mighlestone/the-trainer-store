import { isEmpty } from 'lodash';
import { setHttpToken } from '../../../helpers';
import localforage from 'localforage';

/**
 * Register action
 *
 * @param dispatch
 * @param payload
 * @param context
 * @returns {Promise.<TResult>}
 */
export const register = ({ dispatch }, { payload, context }) => {
    return axios.post('/api/register', payload).then((response) => {
        dispatch('setToken', response.data.meta.token).then(() => {
            dispatch('fetchUser')
        });
    }).catch((error) => {
        context.errors.record(error.response.data.errors)
    });
};

/**
 * Login action
 *
 * @param dispatch
 * @param payload
 * @param context
 * @returns {Promise.<TResult>}
 */
export const login = ({ dispatch }, { payload, context }) => {
    return axios.post('/api/login', payload).then((response) => {
        dispatch('setToken', response.data.meta.token).then(() => {
            dispatch('fetchUser')
        });
    }).catch((error) => {
        context.errors.record(error.response.data.errors)
    });
};

export const logout = ({ dispatch }) => {
    return axios.post('api/logout').then((response) => {
        dispatch('clearAuth');
    })
};

/**
 * Sets authentication token to local storage and attaches to http promise
 *
 * @param commit
 * @param dispatch
 * @param token
 */
export const setToken = ({ commit, dispatch }, token) => {
    if (isEmpty(token)) {
        return dispatch('checkTokenExists').then((token) => {
            setHttpToken(token)
        })
    }

    commit('setToken', token);
    setHttpToken(token);
};

/**
 * Fetches user once authenticated and then set the response into state
 *
 * @param commit
 */
export const fetchUser = ({ commit }) => {
    return axios.get('api/me').then((response) => {
        commit('setAuthenticated', true);
        commit('setUserData', response.data.data)
    })
};

/**
 * Check if authentication token exists in local storage
 *
 * @param commit
 * @param dispatch
 * @param token
 */
export const checkTokenExists = ({ commit, dispatch }, token) => {
    return localforage.getItem('authtoken').then((token) => {
        if (isEmpty(token)) {
            return Promise.reject('NO_AUTHENTICATION_TOKEN');
        }

        return Promise.resolve(token)
    })
};

/**
 * Clear authentication data
 *
 * @param commit
 * @param token
 */
export const clearAuth = ({ commit }, token) => {
    commit('setAuthenticated', false);
    commit('setUserData', null);
    commit('setToken', null);
    setHttpToken(null);
};