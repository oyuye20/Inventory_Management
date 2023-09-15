<template>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->

            <div class="sidebar_wrapper" :class ="{side: isSidebar}">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <i class="fas fa-warehouse fa-1x me-2"></i>JR Amador</div>
                <div class="list-group list-group-flush my-3">

                    <a class="list-group-item fs-5 list-group-item-action bg-transparent second-text active text-success">
                    <i class="bi bi-grid-fill me-2"></i>Dashboard</a>


                    <router-link :to="{name: 'products'}">
                        <a class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                    <i class="bi bi-box-seam-fill me-2"></i>Products</a>
                    </router-link>

                    <router-link :to="{name: 'transaction'}">
                        <a class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                        <i class="fas fa-receipt me-2"></i>Transactions</a>
                    </router-link>
  

                    <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                    <i class="bi bi-receipt me-2"></i>Sales History</a>

                
                    <router-link :to="{name: 'records'}">
                        <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                        <i class="bi bi-database-fill me-2"></i>Records</a>
                    </router-link>

                    
                    <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                    <i class="bi bi-stack me-2"></i>Categories</a>

                    
                    <a role="button" @click="logout" class="list-group-item fs-5 list-group-item-action text-light bg-transparent fw-bold">
                    <i class="bi bi-power me-2"></i>Logout</a>

                </div>
            </div>
     

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">

                    <a v-on:click="isSidebar =! isSidebar" role="button" id="toggle_icon"><i class="fas fa-bars me-3 fa-2x"></i></a>
                    
                    <h2 class="fs-2 m-0">Dashboard</h2>
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



                <!-- CARD FOR DASHBOARD -->
                <div class="row g-3 my-2">

                    <div class="col-xl-3 lg-10">

                        <div class="d-flex flex-column">

                            <div class="p-3 shadow-sm d-flex justify-content-around flex-column align-items-center rounded" style="height: 13rem; background-color: rgb(62, 151, 73);">

                                <div class="p-3 d-flex justify-content-around align-items-center rounded w-100">

                                    <div>
                                        <h3 class="fs-2 text-light">{{product_total}}</h3>
                                        <p class="fs-5 text-light">Products</p>
                                    </div>
                                    <i class="fas fa-layer-group fs-1 primary-text text-light p-3"></i>

                                </div>
                                
                                <span class="bg-light w-100 mb-2" style="height: 0.1rem;"></span>

                                <router-link :to="{name: 'products'}">
                                    <a role="button" class="w-100 text-light fs-5 text-center">View more</a>
                                </router-link>
                            </div>

                        </div>
             
                    </div>

         

                    <div class="col-xl-3 lg-10">

                        <div class="d-flex flex-column">

                            <div class="p-3 bg-primary shadow-sm d-flex justify-content-around flex-column align-items-center rounded" style="height: 13rem;">

                                <div class="p-3 d-flex justify-content-around align-items-center rounded w-100">

                                    <div>
                                        <h3 class="fs-2 text-light">{{num_total_stock}}</h3>
                                        <p class="fs-5 text-light">Stock on hand</p>
                                    </div>
                                    <i class="fas fa-box fs-1 secondary-bg p-3 text-light"></i>

                                </div>
                                
                                <span class="bg-light w-100 mb-2" style="height: 0.1rem;"></span>
                                <a role="button" class="w-100 text-light fs-5 text-center">View more</a>

                            </div>

                        </div>

                    </div>


                    <div class="col-xl-3 lg-10">

                        <div class="d-flex flex-column">

                            <div class="p-3 bg-danger shadow-sm d-flex justify-content-around flex-column align-items-center rounded" style="height: 13rem;">

                                <div class="p-3 d-flex justify-content-around align-items-center rounded w-100">

                                    <div>
                                        <h3 class="fs-2 text-light">{{crit_stocks1}}</h3>
                                        <p class="fs-5 text-light">Critical Stocks</p>
                                    </div>
                                    <i class="fas fs-1 fa-triangle-exclamation secondary-bg p-3 text-light"></i>

                                </div>
                                
                                <span class="bg-light w-100 mb-2" style="height: 0.1rem;"></span>


                                <router-link :to="{name: 'records'}">
                                    <a role="button" class="w-100 text-light fs-5 text-center">View more</a>
                                </router-link>

                            </div>
                        </div>
                    </div>



                    <div class="col-xl-3 lg-10">

                        <div class="d-flex flex-column">

                            <div class="p-3 shadow-sm d-flex justify-content-around flex-column align-items-center rounded" style="height: 13rem; background-color: rgb(140, 42, 42);">

                                <div class="p-3 d-flex justify-content-around align-items-center rounded w-100">

                                    <div>
                                        <h3 class="fs-2 text-light">{{ exp_list_count }}</h3>
                                        <p class="fs-5 text-light">Expired Products</p>
                                    </div>
                                    <i class=""></i>
                                    <i class="fas fs-1 far fa-calendar-xmark secondary-bg p-3 text-light"></i>

                                </div>
                                
                                <span class="bg-light w-100 mb-2" style="height: 0.1rem;"></span>


                                <router-link :to="{name: 'records'}">
                                    <a role="button" class="w-100 text-light fs-5 text-center">View more</a>
                                </router-link>

                            </div>
                        </div>
                    </div>






                </div>

                <!-- END OF CARD FOR DASHBOARD-->



                <!-- <div class="table-responsive">
                    <h4 class="mt-3">Product Lists</h4>

                    <h4 v-if="typing" class="w-100 text-center d-flex justify-content-center align-items-center loading">Loading....</h4>

                    <table v-else class="table table-hover table-borderless text-center">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Size Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Date of Production</th>
                        <th scope="col">Expiration Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody v-for="product in product_lists" :key="product.id">
                        <tr>
                            <td hidden>{{product.id}}</td>
                            <td>{{product.serial_number}}</td>
                            <td>{{product.manufacturer}}</td>
                            <td>{{product.product_name}}</td>
                            <td>{{product.description}}</td>
                            <td>{{product.size}}</td>
                            <td>{{product.stocks}}</td>
                            <td>{{product.production_date}}</td>
                            <td>{{product.expiration_date}}</td>
                            <td>hello</td>

                            <td class="m-3">
                                <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger mx-1" @click.prevent="del_prod(product.id)"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>

                    </tbody>
                    </table>
                </div> -->

            

   
            <!-- <h4 class="mb-3">Expired Product</h4>

            <div class="container" v-for="product in expired_lists" :key="product.id">

                <div class="row mb-3">
                    <div class="col-12 p-2 d-flex justify-content-center shadow bg-light">

                        <div class="col-1 d-flex justify-content-center me-2">
                            <i class="bi bi-exclamation-triangle-fill" style="font-size: 3rem; color: rgb(183, 35, 35);"></i>
                        </div>

                        <div class="col-11">
                            <p class="text-left text-dark fs-5 h-100 w-100 d-flex align-items-center">
                            The {{ product.product_name }} was already expired ({{ product.expiration_date }})</p>
                        </div>

                    </div>
                </div>

            </div> -->
     
        
            <!-- <h4 class="mb-3">Low stocks</h4>

            <div v-for="product in stock_lists" :key="product.id" class="container-fluid">
                <p class="bg-danger text-center text-light fs-5 p-2 rounded-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>
                    The {{ product.product_name }} on low stock ({{ product.stocks }})</p>
            </div> -->


            </div>
        </div>


       


    </div>
    <!-- /#page-content-wrapper -->

</body>

</template>


<script>
import '../assets/dashboard.css'

import { useStore } from "vuex";
import { computed, toHandlers } from "vue";
import { useRouter } from "vue-router";
import {reactive, onMounted} from 'vue';
import axios_client from '../axios';
import { ref, watchEffect } from 'vue';


export default {
    name: 'dashboard',

  /*   components: {
        modal,
        prod_add
    }, */


    setup(){
        let product_lists = ref([]);
        let expired_lists = ref([]);
        let stock_lists = ref([]);
        let product_total = ref('');
        let num_total_stock = ref('');
        let crit_stocks1 = ref('');
        const isSidebar = ref(false);


        let exp_list_count = ref('');

        const search_box = ref('');
        const typing = ref(false);

        const store = useStore();
        const router = useRouter();

        watchEffect((onvalidate) =>{
        search_box.value

            if(search_box.value.length>0)
            {
                typing.value = true

                const typing_stats = setTimeout(()=>{
                    typing.value = false
                }, 700)

                onvalidate(()=>{
                    clearInterval(typing_stats)

                    axios_client.get('http://127.0.0.1:8000/api/search/' + search_box.value).then((res)=>{
                    product_lists.value = res.data

                
                    }).catch(error => {
                        console.log(error)
                    })
                })

            }

            else 
            {
                const typing_stats = setTimeout(()=>{
                    typing.value = false
                }, 1000)

                onvalidate(()=>{
                    clearInterval(typing_stats)
                })
            }

        })


        /* GET PRODUCT TABLE */
        const getProduct = async() => {
            axios_client.get('http://127.0.0.1:8000/api/products').then(response=>{
                product_lists.value = response.data.products
            }).catch(error =>{

            })
        }


        /* TOTAL OF PRODUCTS IN DASHBOARD */
        const total_products = async() => {
            axios_client.get('http://127.0.0.1:8000/api/stats').then(response=>{
                product_total.value = response.data.product_count
            }).catch(error =>{

            })
        }


        /* NUMBER OF STOCKS */
        const stock_total = async() => {
            axios_client.get('http://127.0.0.1:8000/api/stock_total').then(response=>{
                num_total_stock.value = response.data.stock_total
            }).catch(error =>{

            })
        }


        /* EXPIRED PRODUCT COUNT */
        const exp_count_f = async() => {
            axios_client.get('http://127.0.0.1:8000/api/exp_count').then(response=>{
                exp_list_count.value = response.data.exp_count
            }).catch(error =>{

            })
        }





        /* LISTS OF EXPIRED PRODUCT */
        const expired_prod = async() => {
            axios_client.get('http://127.0.0.1:8000/api/expiration').then(response=>{
                /* console.log(response.data.expiration_date) */

                expired_lists.value = response.data.expiration_date;

            }).catch(error =>{

            })
        }


        /* LISTS OF LOW STOCKS PRODUCT */
        const low_stocks = async() => {
            axios_client.get('http://127.0.0.1:8000/api/stocks').then(response=>{
                /* console.log(response.data.stocks) */
                stock_lists.value = response.data.stocks
            }).catch(error =>{

            })
        }


        /* CRITICAL STOCKS IN DASHBOARD */
        const crit_stocks = async() => {
            axios_client.get('http://127.0.0.1:8000/api/crit_stocks').then(response=>{
                /* console.log(response.data.stocks) */
                crit_stocks1.value = response.data.crit
            }).catch(error =>{

            })
        }

    
        onMounted(()=> {
            getProduct()
            expired_prod()
            low_stocks()
            total_products()
            stock_total()
            crit_stocks()
            exp_count_f()
        })

        function logout(){
            store.commit('logout');
            router.push({name: 'login'})
        }



        return {
            user: computed(() => store.state.user.data)
            ,product_lists,getProduct,close,expired_prod,expired_lists,low_stocks
            ,stock_lists,search_box,typing,product_total,low_stocks,total_products,stock_total
            ,num_total_stock,crit_stocks1,crit_stocks,logout,exp_count_f,exp_list_count,isSidebar
        }



    }
}




</script>
