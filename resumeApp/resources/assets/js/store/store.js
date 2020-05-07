window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex);


export const store = new Vuex.Store({
    state: {
        user: {},
    },
    mutations: {
        updateActivity(state) {
            console.log('update-activity');
            // axios.post('/api/user/update-last-activity',{user_id: state.user.id}).then((response) => {
            //     console.log(response.data);
            // }).catch((error) => {
            //     console.log('Error - last activity');
            // });
        },
        showFlyingNotification: (state, data) => {
          console.log('notification');
            store.commit('updateActivity');

        },
    },
    actions: {
        flyingNotification(store, payload = {}) {
            store.commit('showFlyingNotification', payload);
        },
        updateLastActivity(store) {
            store.commit('updateActivity');
        },
    }
});
