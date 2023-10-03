<template>

    <div>


        <div class="row container-fluid main d-flex" @submit.prevent="login"  >

            <div class="row m-0 p-0">

                <div class="col-6 " style="height: 100vh;">
                    
                </div>


                <div class="col-6 border border-light bg-light rounded-start-5  
                d-flex justify-content-center align-items-center p-3 flex-column" style="height: 100vh;">

                    <div class="d-flex justify-content-center" style="width: 100%;">
                        
                        <span class="fs-1 fw-bold">LOGIN</span>

                        
                    </div>    

                    <span class="fs-1 fw-bold border border-dark" 
                    style="width: 60%; margin-top: 50px; margin-bottom: 50px;">
                    </span>

                    <form style="width: 50%;">

                        <div v-if="errorMsg" class="alert alert-danger text-center" role="alert">
                        {{errorMsg}}
                        </div>

                        <input type="text" placeholder="Enter Username" v-model="user.email" class="form-control p-2 mb-3" style="border-radius: 10px;">

                        <input type="password" placeholder="Enter Password" v-model="user.password" class="form-control p-2" style="border-radius: 10px;">

                        <button class="btn btn-success w-100" type="submit" :disabled="loading" style="width: 60%; margin-top: 50px;">
                            <span v-if="loading" class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status" class="mx-1">Login</span>
                        </button>

   
                    </form>   
                </div>


            </div>
          
            <!-- <form class="col-xxl-3 col-lg-6 col-md-8 col-sm-9 form">

                <div v-if="errorMsg" class="alert alert-danger text-center" role="alert">
                    {{errorMsg}}
                </div>


                <p class="text-center fs-2 title fw-bold"><i class="bi bi-key-fill mx-1"></i>Login to JR Amador</p>
                <div class="col-sm-12 border border-dark"></div>

            <div class="mb-3 username field">
              <input type="text" name="email"  v-model="user.email" id="email" class="form-control" placeholder="Username">
        
            </div>

                
            <div class="mb-3 field">
              <input type="password" name="password" v-model="user.password" id="password" class="form-control" placeholder="Password" aria-describedby="helpId">
          
            </div>

            <button type="submit" :disabled="loading" class="btn btn-dark w-100 mb-3 submit-log">
                
                <span v-if="loading"  class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status" class="mx-1">Login</span>
            
            </button>


            </form> -->

 
        </div>

 

        <!-- <form class="container mt-3" @submit="login">
            <h4>Login Form</h4>

            <div v-if="errorMsg" class="alert alert-danger" role="alert">
             {{errorMsg}}
            </div>       

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" v-model="user.email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" v-model="user.password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3 form-check">
                <router-link :to="{name: 'register'}">Not yet registered?</router-link>
            </div>


            
            <button class="btn btn-primary w-100" type="submit" :disabled="loading">
                <span v-if="loading" class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status" class="mx-1">Login</span>
            </button>



        </form> -->
    </div>




</template>

<script>
import '../assets/style.css'

import store from '../store'
import {useRouter} from 'vue-router'
import { ref } from 'vue'
import { computed } from "vue";
import useVulidate from '@vuelidate/core'
import {required} from '@vuelidate/validators'



export default {

    setup(){

    const loading = ref(false);
    const router = useRouter();

    const user = {
        email: '',
        password: ''
    }

    const email = ref('');
    const password = ref('');
    

    const rules  = {
        email: {required},
        password: {required}
    }

    const v$ = useVulidate(rules, {
        email,password
    });

    let errorMsg = ref('');


    function login(){
        /* console.log('login')
  
        if(v$.value.$invalid){
            v$.value.$touch();
            return
        } */

        loading.value = true;
        store.dispatch('login', user).then(() => {
            loading.value = false;
            router.push({
                name: 'dashboard'
            })
        }).catch(error => {
            loading.value = false;

            if(error.response.status === 422){
                errorMsg.value  = error.response.data.errorMsg
            }


            errorMsg.value = error.response.data
        })

    }

    return {
        user: computed(() => store.state.user.data),
        login,errorMsg,loading,user
    }

    },


}


/* const router = useRouter();

const loading = ref(false);

const user = {
    email: '',
    password: ''
}


let errorMsg = ref('');


function login(ev){
    ev.preventDefault();
    loading.value = true;
    store.dispatch('login', user).then(() => {
        loading.value = false;
        router.push({
            name: 'dashboard'
        })
    }).catch(error => {
        loading.value = false;
        errorMsg.value = error.response.data
    })

} */




</script>