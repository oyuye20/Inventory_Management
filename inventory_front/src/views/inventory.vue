<template>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->

            <div class="sidebar_wrapper" :class ="{side: isSidebar}">
                
                <div class="sidebar-heading text-center py-4 fs-4 fw-bold d-flex justify-content-center ">

                    <div class="div d-flex justify-content-center align-items-center me-2">
                        <i class="fas fa-circle-user fa-2x"></i>
                    </div>
                   

                    <div class="div d-flex flex-column justify-content-end">
                        Admin

                        <span class="text-secondary fs-6">Administrator</span>
                    </div>

                </div>


                <div class="list-group list-group-flush my-3 w-100 p-3">

                
                    <router-link :to="{name: 'dashboard'}">

                        <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                        d-flex justify-content-center rounded-5" >

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="bi bi-grid-fill me-3"></i>
                        </div>
                           
                        <div class="div w-100">
                            <span class="fs-4">Dashboard</span>
                        </div>

                    </div>
                        
                    </router-link>



                    <router-link :to="{name: 'products'}">               
                        <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                            d-flex justify-content-center rounded-5 mt-2" >

                            <div class="div d-flex justify-content-center align-items-center">
                                <i class="bi bi-box-seam-fill me-3"></i>
                            </div>
                            
                            <div class="div w-100">
                                <span class="fs-4">Products</span>
                            </div>

                        </div>
                    </router-link>



                    <router-link :to="{name: 'inventory'}">          
                        <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                            d-flex justify-content-center rounded-5 mt-2" 
                            style="background-color: rgb(185, 232, 206); color: rgb(57, 164, 59);">

                            <div class="div d-flex justify-content-center align-items-center">
                                <i class="fas fa-boxes-stacked me-3"></i>
                            </div>
                            
                            <div class="div w-100">
                                <span class="fs-4">Inventory</span>
                            </div>

                        </div>
                    </router-link>

                    
                    

                    <router-link :to="{name: 'transaction'}">
                        <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                        d-flex justify-content-center rounded-5 mt-2">

                            <div class="div d-flex justify-content-center align-items-center">
                                <i class="fas fa-receipt me-3 fa-lg"></i>
                            </div>
                            
                            <div class="div w-100">
                                <span class="fs-4">Transactions</span>
                            </div>

                        </div>
                    </router-link>




                    <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                    d-flex justify-content-center rounded-5 mt-2" >

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="bi bi-receipt me-2"></i>
                        </div>
                           
                        <div class="div w-100">
                            <span class="fs-4">Sales History</span>
                        </div>

                    </div>


                    

                
                    <router-link :to="{name: 'records'}">
                        <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                        d-flex justify-content-center rounded-5 mt-2" >

                            <div class="div d-flex justify-content-center align-items-center">
                                <i class="bi bi-database-fill me-2"></i>
                            </div>
                            
                            <div class="div w-100">
                                <span class="fs-4">Records</span>
                            </div>

                        </div>
                    </router-link>



                    <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                    d-flex justify-content-center rounded-5 mt-2" >

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="bi bi-stack me-2"></i>
                        </div>
                           
                        <div class="div w-100">
                            <span class="fs-4">Categories</span>
                        </div>

                    </div>



                    <a id="sidebtn" role="button" @click="logout"  class="list-group-item fs-5 list-group-item-action 
                    d-flex justify-content-center rounded-5 mt-2" >

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="bi bi-power me-2"></i>
                        </div>
                           
                        <div class="div w-100">
                            <span class="fs-4">Logout</span>
                        </div>

                    </a>

              
                </div>
                

            </div>
     

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <!-- <button class="btn btn-primary" @click="toggle_sidebar = !toggle_sidebar">close</button> -->
                    <a v-on:click="isSidebar =! isSidebar" role="button" id="toggle_icon"><i class="fas fa-bars me-3 fa-2x"></i></a>
                    <h2 class="fs-2 m-0">Inventory</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-2"></i>Welcome Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">

                <!-- <tutorial/> -->
                
                <inventory_content/>
                
            </div>


        </div>



    </div>
    <!-- /#page-content-wrapper -->

</body>

</template>


<script>
import '../assets/dashboard.css'
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import { useStore } from "vuex";
import { computed, toHandlers } from "vue";
import { useRouter } from "vue-router";
import {reactive, onMounted} from 'vue';
import inventory_content from '../components/inventory_content.vue';
import tutorial from '../components/tutorial.vue'
import { ref } from 'vue'

export default {
    name: 'inventory',

    components: {
        Bootstrap5Pagination,
        inventory_content,
        tutorial
    },


    setup(){

        const store = useStore();
        const router = useRouter();

        const isSidebar = ref(false);

    
        onMounted(()=> {

        })


        function logout(){
            store.commit('logout');
            router.push({name: 'login'})
        }

        return {
            user: computed(() => store.state.user.data),logout,isSidebar
        }


    }
}
</script>
