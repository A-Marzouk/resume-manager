window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex);


export const store = new Vuex.Store({
    state:{
        user:{}
    },
    mutations:{
      getCurrentUser: (state,data)=>{
          state.user = data ;
      }
    },
    actions:{
        getCurrentUser: (store) => {
            axios.get('/agent/current').then( (response) => {
                store.commit('getCurrentUser',response.data);
            });
        }
    }
});
