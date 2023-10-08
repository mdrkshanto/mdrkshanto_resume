import { createStore } from 'vuex'

export default createStore({
    state: {
        getHomeName:[],
    },
    getters: {
        getHomeName(state){
            return state.getHomeName;
        }
    },
    mutations: {
        getHomeName(state,payload){
            state.getHomeName = payload
        }
    },
    actions: {
        getHomeName(context){
            axios.post('/get/home/name').then((response)=>{
                context.commit('getHomeName',response.data.homeName);
            });
        }
    }
})
