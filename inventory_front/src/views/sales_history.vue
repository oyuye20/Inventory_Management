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
                            d-flex justify-content-center rounded-5 mt-2">

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
                    d-flex justify-content-center rounded-5 mt-2" style="background-color: rgb(185, 232, 206); 
                    color: rgb(57, 164, 59);">

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


                    <router-link :to="{}">
                        <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                        d-flex justify-content-center rounded-5 mt-2" >

                            <div class="div d-flex justify-content-center align-items-center">
                                <i class="fas fa-gear me-2"></i>
                            </div>
                            
                            <div class="div w-100">
                                <span class="fs-4">Settings</span>
                            </div>

                        </div>
                    </router-link>



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
        <!-- sidebar-wrapper -->

        <!-- Page Content -->

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <!-- <button class="btn btn-primary" @click="toggle_sidebar = !toggle_sidebar">close</button> -->
                    <a v-on:click="isSidebar =! isSidebar" role="button" id="toggle_icon"><i class="fas fa-bars me-3 fa-2x"></i></a>
                    <h2 class="fs-2 m-0">Sales Report</h2>
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

                <ul class="nav nav-underline mb-3 d-flex justify-content-center mt-3" id="pills-tab" role="tablist">

                    <li class="nav-item col-2" role="presentation">

                        <button class="nav-link active fs-5" id="pills-sold-tab" 
                        data-bs-toggle="pill" data-bs-target="#pills-sold" type="button" 
                        role="tab" aria-controls="pills-sold" aria-selected="true"><i class="fas fa-file-invoice-dollar me-2"></i>Daily</button>

                    </li>


                    <li class="nav-item col-2" role="presentation">

                        <button class="nav-link fs-5" id="pills-critical-tab" 
                        data-bs-toggle="pill" data-bs-target="#pills-critical" type="button" 
                        role="tab" aria-controls="pills-critical" aria-selected="true"><i class="fas fa-triangle-exclamation me-2"></i>
                        Monthly</button>

                    </li>

                    <li class="nav-item col-2" role="presentation">

                        <button class="nav-link fs-5" id="pills-critical-tab" 
                        data-bs-toggle="pill" data-bs-target="#pills-expired" type="button" 
                        role="tab" aria-controls="#pills-expired" aria-selected="true"><i class="fas fa-triangle-exclamation me-2"></i>
                        Yearly</button>

                    </li>

                </ul>

  

    <div class="tab-content" id="pills-tabContent">


        <div class="tab-pane fade show active" id="pills-daily" role="tabpanel" aria-labelledby="pills-daily-tab" tabindex="0">  
            <h4 class="mt-3 w-100 bg-light p-3"><i class="fas fa-database me-2"></i>Daily Sales</h4>
      
            <div class="table-responsive">     
                <table class="table table-hover table-borderless text-center">
                    <thead class="" style="background-color: rgb(4, 180, 116);">
                        <tr>
                        <th scope="col" class="fw-bold text-light">Product Name</th>
                        <th scope="col" class="fw-bold text-light">Total of sold items</th>
                        <th scope="col" class="fw-bold text-light">Total Income</th>

                        <!-- <th>Actions</th> -->
                        </tr>
                    </thead>

                <tbody>
                    <tr>
                        



                    </tr>

                </tbody>
                </table>


                <div class="d-flex justify-content-end align-items-center" >
                    <!-- <Bootstrap5Pagination :limit="1" :keepLength="true" :data="product_lists" class="shadow-sm"  
                    @pagination-change-page="getProduct"
                    /> -->
                </div>

            </div>
        </div>












        <div class="tab-pane fade show" id="pills-stock" role="tabpanel" aria-labelledby="pills-stock-tab" tabindex="0">Stock</div>

        <div class="tab-pane fade show" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab" tabindex="0">Cancelled Order</div>








    
            
        </div>
        <!-- END OF CRITICAL TAB -->




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
