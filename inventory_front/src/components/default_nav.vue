<template>
    <button type='button' class="btn btn-primary" @click="logout">logout</button>
</template>



<script>

import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";

export default {
    name: 'default_nav',


    /* methods: {
    hello(){
        alert('hello world')
    }
},
 */


setup(){
    const store = useStore();
    const router = useRouter();


    function logout(){
        store.dispatch("logout").then(() =>{
            router.push({name: "login"});
        });

    }

    return {
        user: computed(() => store.state.user.data),logout,
    };





}

    
}







</script>