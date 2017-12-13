import Vue from 'vue';
import vuex from 'vuex';
import auth from '../app/auth/vuex';

Vue.use(vuex);

export default new vuex.Store({
    modules: {
        auth: auth
    }
})