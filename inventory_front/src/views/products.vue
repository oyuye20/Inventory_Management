<template>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->

            <div class="" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <i class="fas fa-warehouse fa-1x me-2"></i>JR Amador</div>
                <div class="list-group list-group-flush my-3">


                    <router-link :to="{name: 'dashboard'}">
                        <a class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                        <i class="bi bi-grid-fill me-2"></i>Dashboard</a>
                    </router-link>

                    
                    <a class="list-group-item fs-5 list-group-item-action bg-transparent second-text active text-success">
                    <i class="bi bi-box-seam-fill me-2"></i>Products</a>

                    <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                    <i class="bi bi-receipt me-2"></i>Sales History</a>



                    <router-link :to="{name: 'records'}">
                        <a class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                        <i class="bi bi-database-fill me-2"></i>Records</a>
                    </router-link>

                    

                    <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent second-text active">
                    <i class="bi bi-stack me-2"></i>Categories</a>

                    
                    <a href="#" class="list-group-item fs-5 list-group-item-action bg-transparent text-light fw-bold">
                    <i class="bi bi-power me-2"></i>Logout</a>

                </div>
            </div>
     

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <a role="button" @click="toggle_sidebar = !toggle_sidebar"><i class="fas fa-bars me-3 fa-2x"></i></a>
                    <h2 class="fs-2 m-0">Products</h2>
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

                <router-link :to="{name: 'add_product'}">
                    <button type="button" class="btn btn-dark mt-3 modal-add">
                        Add new product
                    </button>
                </router-link>
                

                <div class="table-responsive">
                    <h4 class="mt-3 mb-3 w-100 bg-light p-3"><i class="fas fa-box-open me-2"></i>Product Lists</h4>

                    <h4 v-if="typing" class="w-100 text-center d-flex justify-content-center align-items-center loading">Loading....</h4>

                    <table v-else class="table table-hover table-borderless text-center">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col" class="fs-6">Serial Number</th>
                        <th scope="col" class="fs-6">Manufacturer</th>
                        <th scope="col" class="fs-6">Product Name</th>
                        <th scope="col" class="fs-6">Description</th>
                        <th scope="col" class="fs-6">Size Name</th>
                        <th scope="col" class="fs-6">Stock</th>
                        <th scope="col" class="fs-6">Date of Production</th>
                        <th scope="col" class="fs-6">Expiration Date</th>
                        <th class="fs-6" >Status</th>
                        <th class="fs-6" >Actions</th>
                        </tr>
                    </thead>

                    <tbody v-for="product in product_lists.data" :key="product.id">
                        <tr>
                            <td hidden>{{product.id}}</td>
                            <td class="fs-5">{{product.serial_number}}</td>
                            <td class="fs-5">{{product.manufacturer}}</td>
                            <td class="fs-5">{{product.product_name}}</td>
                            <td class="fs-5">{{product.description}}</td>
                            <td class="fs-5">{{product.size}}</td>
                            <td class="fs-5">{{product.stocks}}</td>
                            <td class="fs-5">{{product.production_date}}</td>
                            <td class="fs-5">{{product.expiration_date}}</td>
                            <td class="fs-5">hello</td>

                            <td class="m-3">
                                <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger mx-1 mt-2" @click.prevent="del_prod(product.id)"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>

                    </tbody>
                    </table>


                    <div class="d-flex justify-content-end align-items-center">
                        <Bootstrap5Pagination :data="product_lists" @pagination-change-page="getProduct"/>
                    </div>
                    
                </div>

            
 

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
import axios_client from '../axios';
import { ref, watchEffect } from 'vue';
import {useVuelidate} from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

export default {
    name: 'products',

    components: {
        Bootstrap5Pagination
    },



    setup(){
        let product_lists = ref([]);
        let expired_lists = ref([]);
        let stock_lists = ref([]);
        let product_total = ref('');
        let num_total_stock = ref('');
        let crit_stocks1 = ref('');

        const search_box = ref('');
        const typing = ref(false);

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



        /* DELETE A PRODUCT */
        function del_prod(id){
            let url = 'http://127.0.0.1:8000/api/delete/' + id;
            axios_client.delete(url).then(response => {
                this.getProduct()
                this.total_products()
                this.expired_prod()
                this.low_stocks()
                this.stock_total()
            })
        }




        /* GET PRODUCT TABLE */
        const getProduct = async(page = 1) => {
            axios_client.get('http://127.0.0.1:8000/api/products?page=' + page).then(response=>{
                product_lists.value = response.data;
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
        })



        return {
            user: computed(() => store.state.user.data)
            ,product_lists,del_prod,getProduct,close,expired_prod,expired_lists,low_stocks
            ,stock_lists,search_box,typing,product_total,low_stocks,total_products,stock_total
            ,num_total_stock,crit_stocks1,crit_stocks
        }



    }
}




</script>
