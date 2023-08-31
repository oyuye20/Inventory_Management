<template>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->

            <div class="" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">

                <i class="fas fa-warehouse me-2"></i>JR Amador</div>

                <div class="list-group list-group-flush my-3">


                    <router-link :to="{name: 'dashboard'}">
                        <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                        <i class="bi bi-grid-fill me-2"></i>Dashboard</a>
                    </router-link>

                    <router-link :to="{name: 'products'}">
                        <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                        <i class="bi bi-box-seam-fill me-2"></i>Products</a>
                    </router-link>
                    

                    <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                    <i class="bi bi-receipt me-2"></i>Sales History</a>

                    <a class="list-group-item fs-5 list-group-item-action bg-transparent second-text active text-success">
                    <i class="bi bi-database-fill me-2"></i>Records</a>

                    <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                    <i class="bi bi-stack me-2"></i>Categories</a>

                    
                    <a  @click="logout" class="list-group-item fs-5 list-group-item-action bg-transparent text-light fw-bold">
                    <i class="bi bi-power me-2"></i>Logout</a>

                </div>
            </div>
     

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <!-- <button class="btn btn-primary" @click="toggle_sidebar = !toggle_sidebar">close</button> -->
                    <a role="button" @click="toggle_sidebar = !toggle_sidebar"><i class="fas fa-bars me-3 fa-2x"></i></a>
                    <h2 class="fs-2 m-0">Records</h2>
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

                <records_content />
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
import records_content from '../components/records_content.vue'

export default {
    name: 'records',

    components: {
        Bootstrap5Pagination,
        records_content
    },


    setup(){

        const store = useStore();
        const router = useRouter();

    
        onMounted(()=> {

        })


        function logout(){
            store.commit('logout');
            router.push({name: 'login'})
        }

        return {
            user: computed(() => store.state.user.data),logout
        }


    }
}
</script>
