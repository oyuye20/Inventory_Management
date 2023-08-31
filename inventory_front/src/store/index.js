import { createStore } from "vuex";
import axios_client from "../axios";


const store = createStore ({
    state: {
        user: {
            data: {},
            token: localStorage.getItem("TOKEN"),
        }
    },
    getters: {},

    actions: 
    {
        login({commit},user){
            return axios_client.post('/auth_login',user).then(({data}) => {
                commit('setUser', data);
                return data;
            })
        },

        logout({commit}){
            return axios_client.post('/logout_user').then(response => {
                commit('logout')
                return response;
            })
        }
    },


    mutations: 
    {
        setUser: (state, userData)=> {
            state.user.token = userData.token;
            state.user.token = userData.user;
            localStorage.setItem("TOKEN",userData.token);
        },
        
        logout: (state) => {
            state.user.token = null;
            state.user.data = {};
            localStorage.removeItem("TOKEN");
        }   
    },





    modules: {},
})

export default store;