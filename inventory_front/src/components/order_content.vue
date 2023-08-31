<template>
    <div class="row gx-2 mt-3">

        <div class="col-xl-7 mt-3">
            
            <div class="bg-light w-100">
                <h4 class="p-3 bg-dark text-light"><i class="fas fa-cash-register me-2"></i>Transaction</h4>


                <div class="d-flex justify-content-between p-3">
                    <!-- <h4 class="">Total</h4>
                    <h4 class="text-success fw-bold">1,000 Pesos</h4> -->
                    <h5>Transaction ID: 123213123123</h5>
                    <h5>Transaction Date: Saturday, July 22, 2023</h5>
                </div>



            </div>

            
        </div>


            <div class="col-xl-5 mt-3">


                <div class="bg-light w-100">
                    <h4 class="p-3 bg-dark text-light"><i class="fas fa-box me-2"></i>Products</h4>



                    <!-- PRODUCT LISTS -->
                    <div class="row g-1">

                        <div class="col-xl-6 p-2" v-for="product in product_lists.data" :key="product.id">
                            <div class="p-3">


                                <div class="d-flex justify-content-center flex-column align-items-center">


                                    <p>{{product.serial_number}}</p>
                                    <p>{{product.product_name}}</p>
                                    <p>{{product.stocks}}</p>
                                </div>
                                
                                <!-- BUTTON OPTION -->
                                <button class="btn btn-primary w-100 mt-3">add</button>
                                
                            </div>
                        </div>
                        
                    </div>


                    <div class="w-100 d-flex justify-content-center mt-3">
                        <Bootstrap5Pagination :data="product_lists" @pagination-change-page="getProduct"/>
                    </div>
                    


                </div>
        </div>
</div>


</template>


<script>

import {reactive, onMounted} from 'vue';
import axios_client from '../axios';
import { ref, watchEffect } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

export default{
    name: 'order_content',

    components: {
        Bootstrap5Pagination
    },


    setup(){
        let product_lists = ref([]);

        /* GET PRODUCT TABLE */
        const getProduct = async(page = 1) => {
            axios_client.get('http://127.0.0.1:8000/api/products?page=' + page).then(response=>{
                product_lists.value = response.data;
            }).catch(error =>{

            })
        }


        onMounted(()=> {
            getProduct()
        })

        return {
            getProduct,product_lists
        }
    }


    


}









</script>