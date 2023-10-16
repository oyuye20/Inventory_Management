<template>

<body>
    
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->

        <div class="sidebar_wrapper" :class ="{side: isSidebar}">

            <div class="sidebar-heading text-center py-4 fs-4 fw-bold d-flex justify-content-center">

                <div class="div d-flex justify-content-center align-items-center me-2">
                    <i class="fas fa-circle-user fa-2x"></i>
                </div>
                
                <div class="div d-flex flex-column justify-content-end">
                    Admin
                    <span class="text-secondary fs-6">Administrator</span>
                </div>

            </div>

            


            <div class="list-group list-group-flush my-3 w-100 p-3">

                <div id="sidebtn" class="list-group-item fs-5 list-group-item-action 
                d-flex justify-content-center rounded-5" style="background-color: rgb(185, 232, 206); 
                color: rgb(57, 164, 59);">

                    <div class="div d-flex justify-content-center align-items-center">
                        <i class="bi bi-grid-fill me-3"></i>
                    </div>
                        
                    <div class="div w-100">
                        <span class="fs-4">Dashboard</span>
                    </div>

                </div>



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
                        d-flex justify-content-center rounded-5 mt-2" >

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="fas fa-boxes-stacked me-3"></i>
                        </div>
                            
                        <div class="div w-100">
                            <span class="fs-4">Inventory</span>
                        </div>

                    </div>
                </router-link>

                
                
                <router-link :to="{name: 'transaction'}">
                    <div id="sidebtn" class="list-group-item fs-5 list-group-item-action d-flex justify-content-center rounded-5 mt-2" >

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="fas fa-receipt me-3 fa-lg"></i>
                        </div>
                            
                        <div class="div w-100">
                            <span class="fs-4">Transactions</span>
                        </div>

                    </div>
                </router-link>


                <div id="sidebtn" class="list-group-item fs-5 list-group-item-action d-flex justify-content-center rounded-5 mt-2" >
                    <div class="div d-flex justify-content-center align-items-center">
                        <i class="bi bi-receipt me-2"></i>
                    </div>
                        
                    <div class="div w-100">
                        <span class="fs-4">Sales History</span>
                    </div>
                </div>


                

            
                <router-link :to="{name: 'records'}">
                    <div id="sidebtn" class="list-group-item fs-5 list-group-item-action d-flex justify-content-center rounded-5 mt-2" >

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="bi bi-database-fill me-2"></i>
                        </div>
                        
                        <div class="div w-100">
                            <span class="fs-4">Records</span>
                        </div>

                    </div>
                </router-link>



                <div id="sidebtn" class="list-group-item fs-5 list-group-item-action d-flex justify-content-center rounded-5 mt-2" >
                    <div class="div d-flex justify-content-center align-items-center">
                        <i class="bi bi-stack me-2"></i>
                    </div>
                        
                    <div class="div w-100">
                        <span class="fs-4">Categories</span>
                    </div>
                </div>



                <a id="sidebtn" role="button" @click="logout"  
                class="list-group-item fs-5 list-group-item-action d-flex justify-content-center rounded-5 mt-2">
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

        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 d-flex" >

            <div class="d-flex justify-content-between w-100">
                <a v-on:click="isSidebar =! isSidebar" role="button" id="toggle_icon"><i class="fas fa-bars me-3 fa-2x"></i></a>
                <h2 class="fs-5 fw-bold">Welcome to Inventory Management</h2>
                
                <div class="div">
                    <span class="fs-5 h-100 me-3">{{ dateTime }}</span>   
                    <a role="button" class="fw-bold text-dark fs-5"><i class="bi bi-power me-2"></i>Logout</a>
                </div> 
            </div>

            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
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
            </div> -->
        </nav>

        <div class="container-fluid px-4">

            <!-- CARD FOR DASHBOARD -->
            <div class="row g-3 my-2 d-flex justify-content-center">

                <div class="col-xxl-3 col-xl-4">
                <div class="d-flex flex-column">
                    <div class="p-3 shadow-sm d-flex justify-content-around flex-column align-items-center rounded-5" style="height: 12rem; background-color: rgb(237, 106, 219);">

                    <div class="p-3 d-flex rounded-5 w-100">
                        <div>
                            <h3 class="fs-5 text-light mb-3">Products</h3>
                            <p class="fs-2 text-light fw-bold">{{ product_total }}</p>
                        </div>
                    </div>

                    </div>
                </div>
                </div>



            <div class="col-xxl-3 col-xl-4">
                <div class="d-flex flex-column">
                    <div class="p-3 shadow-sm d-flex justify-content-around 
                    flex-column align-items-center rounded-5" style="height: 12rem; 
                    background-color: rgb(192, 64, 207);">

                        <div class="p-3 d-flex rounded-5 w-100">
                            <div>
                                <h3 class="fs-5 text-light mb-3">Total of Sales</h3>
                                <p class="fs-2 text-light fw-bold">{{Intl.NumberFormat
                                ('en-PH', { style: 'currency', currency: 'PHP' }).format((sale_total))}}</p>
                                
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>


                
                <div class="col-xxl-3 col-xl-4">
                    <div class="d-flex flex-column">

                        <div class="p-3 shadow-sm d-flex justify-content-around 
                        flex-column align-items-center rounded-5" style="height: 12rem; background-color: rgb(55, 161, 197);">

                            <div class="p-3 d-flex rounded-5 w-100">
                                <div>
                                    <h3 class="fs-5 text-light mb-3">Stocks on hand</h3>
                                    <p class="fs-2 text-light fw-bold">{{ num_total_stock }}</p>
                                    
                                </div>
                            </div>
            

                        </div>
                    </div>
                </div>




                <div class="col-xxl-3 col-xl-4">
                    <div class="d-flex flex-column">
                        <div class="p-3 shadow-sm d-flex justify-content-around 
                        flex-column align-items-center rounded-5" style="height: 12rem; background-color: rgb(47, 165, 151);">
                            <div class="p-3 d-flex rounded-5 w-100">
                                <div>
                                    <h3 class="fs-5 text-light mb-3">Critical Stocks</h3>
                                    <p class="fs-2 text-light fw-bold">{{ crit_stocks1 }}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xxl-3 col-xl-4">
                    <div class="d-flex flex-column">
                        <div class="p-3 shadow-sm d-flex justify-content-around flex-column 
                        align-items-center rounded-5" style="height: 12rem; background-color: rgb(215, 184, 82);">
                            <div class="p-3 d-flex rounded-5 w-100">

                                <div>
                                    <h3 class="fs-5 text-light mb-3">Expired Products</h3>
                                    <p class="fs-2 text-light fw-bold">{{ exp_list_count }}</p>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <BarChart v-if="isloaded" v-bind="barChartProps" />
            </div>           
        </div>
    </div>
</div>
    <!-- /#page-content-wrapper -->

</body>

</template>


<script>
import '../assets/dashboard.css'

/* import { shuffle } from 'lodash'; */

import { useStore } from "vuex";
import { computed, toHandlers } from "vue";
import { useRouter } from "vue-router";
import {reactive, onMounted} from 'vue';
import axios_client from '../axios';
import { ref, watchEffect, defineComponent } from 'vue';

import { Chart, registerables } from 'chart.js';
import { BarChart, useBarChart } from 'vue-chart-3';

Chart.register(...registerables);



/* export default {
    name: 'dashboard',

    components: {
        Bar,
    },
 */

 export default defineComponent({
    name: 'Dashboard',
    components: {BarChart},

    setup(){


        let product_lists = ref([]);
        let expired_lists = ref([]);
        let stock_lists = ref([]);
        const product_total = ref();
        let num_total_stock = ref();
        let crit_stocks1 = ref('');
        let sale_total = ref('');
        const isSidebar = ref(true);
        

        const isloaded = ref(false)

        const total_prod = computed(() => product_total.value)

        console.log(total_prod.value)


        
    const chartData = computed(() => ({
      labels: ['Products'],
      datasets: [
        {
          data: [product_total.value],
          backgroundColor: ['#77CEFF', '#0079AF', '#123E6B', '#97B0C4', '#A5C8ED'],
        },
      ],
    }));

    const { barChartProps, barChartRef } = useBarChart({
      chartData,
    });

   



       



        let exp_list_count = ref('');

        const search_box = ref('');
        const typing = ref(false);

        const store = useStore();
        const router = useRouter();

        const timestamp = ref();



        const today = new Date();
        const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        const dateTime = date +' '+ time;





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
        const total_products = () => {
            axios_client.get('http://127.0.0.1:8000/api/stats').then(response=>{
                product_total.value = response.data.product_count

                console.log(product_total.value)    
                isloaded.value = true
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


        /* TOTAL SALES */
        const total_sales = async() => {
            axios_client.get('http://127.0.0.1:8000/api/sales').then(response=>{
                sale_total.value = response.data.total_sales
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
            total_sales()
        })

        function logout(){
            store.commit('logout');
            router.push({name: 'login'})
        }



        return {
            user: computed(() => store.state.user.data)
            ,product_lists,getProduct,close,expired_prod,expired_lists,low_stocks
            ,stock_lists,search_box,typing,product_total,total_products,stock_total
            ,num_total_stock,crit_stocks1,crit_stocks,logout,exp_count_f,exp_list_count,isSidebar,dateTime,sale_total,total_sales

            , barChartProps, barChartRef,isloaded
        }



    }
  
});


</script>
