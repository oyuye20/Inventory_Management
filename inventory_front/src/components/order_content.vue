<template>
    <div class="row gx-2 mt-3">

        <div class="col-xl-7 mt-3">
            
            <div class="bg-light w-100">
                <h4 class="p-3 text-light" style="background-color: rgb(69, 115, 26);"><i class="fas fa-cash-register me-2"></i>Transaction</h4>


                <div class="d-flex justify-content-between p-3">
                    <!-- <h4 class="">Total</h4>
                    <h4 class="text-success fw-bold">1,000 Pesos</h4> -->
                    <h5>Transaction ID: 123213123123</h5>
                    <h5>Transaction Date: Saturday, July 22, 2023</h5>
                </div>


             
                <div class="table-responsive mt-3 mb-3" style="overflow: auto; height: 20rem;">
                    <table class="table table-hover table-borderless text-center" >
                        <thead class="table-dark" style="position: sticky;">
                            <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>

                    <tbody v-for="(list, index) in cart_lists" :key="index">
                        <tr>
                            <td class="fw-bold">{{list.product_name}}</td>
                            <td class="fw-bold">{{list.quantity}}</td>
                            <td class="fw-bold">{{list.price}}</td>
                           

                            <td class="fw-bold d-flex justify-content-center align-items-center">
                                
                            <button :disabled="deplete1" @click="CartStore.increment(index,list.stocks)" class="btn btn-sm btn-success">+</button>
                            <span class="mx-2">{{list.total}}</span>
                            <button @click="CartStore.decrement(index)" class="btn btn-sm btn-danger">-</button>
                        
                        
                            </td>
                            <td class="fw-bold"><button @click="CartStore.remove_cart(index)" role="button" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                        </tr>

                    </tbody>
                    </table>
                </div>

                <div class="p-3 bg-dark mt-3">
                    <h4 class="text-light"><i class="fas fa-coins me-2 m-2"></i>Sub Total: ₱ {{CartStore.grand_total.toFixed(2)}}</h4>
                    <h4 class="text-light"><i class="fas fa-coins me-2 m-2"></i>VAT(12%): ₱ {{ (CartStore.grand_total * 0.12).toFixed(2) }}</h4>
                    <h4 class="text-light"><i class="fas fa-coins me-2 m-2"></i>Grand Total: ₱ {{((CartStore.grand_total * 0.12) + CartStore.grand_total).toFixed(2)}}</h4>
                    <button class="btn btn-success me-2 m-2">Check Out</button>
                </div>

                

                

            </div>

            
        </div>


            <div class="col-xl-5 mt-3">


                <div class="bg-light w-100">
                    <h4 class="p-3 bg-dark text-light"><i class="fas fa-box me-2"></i>Products</h4>



                    <!-- PRODUCT LISTS -->
                    <div class="row g-1">

                        <div class="container d-flex mb-3 mt-3">
                            <input type="text" v-model="search_data" role="searchbox" class="form-control me-2" placeholder="search a product">
                            <button @click="btn_search(search_data)" class="btn btn-sm btn-primary"><i class="fas fa-magnifying-glass"></i></button>
                        </div>
                        


                        <div class="col-xl-6 p-2" v-for="product in lists.data" :key="product.id">

                           
                            <div class="p-3">


                                <div  class="d-flex justify-content-center flex-column align-items-center">
                                    <p>{{product.serial_number}}</p>
                                    <p>{{product.product_name}}</p>
                                    <p>{{product.stocks}}</p>
                                    <p>{{product.price}}</p>
                                </div>

                                
                                
                                <button :disabled="deplete1" 
                                @click="cart_add.add_cart(product.id,product.product_name,product.stocks,product.price)" 
                                class="btn btn-primary w-100 mt-3">add</button>
                               
                                
                            </div>
                        </div>

                        
                    </div>

                    


                    <div class="w-100 d-flex justify-content-center mt-3">
                        <Bootstrap5Pagination :data="lists" :limit="2" @pagination-change-page="CartStore.getProduct"/>
                    </div>
                    

                </div>
        </div>
</div>

<p>hello</p>

</template>


<script>

import {reactive, onMounted} from 'vue';
import axios_client from '../axios';
import { ref } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import {useCartStore} from '../stores/cart'
import { computed, toHandlers } from "vue";
import { faker } from '@faker-js/faker';

export default{
    name: 'order_content',

    components: {
        Bootstrap5Pagination
    },


    setup(){
        let product_lists = ref([]);
        let search_data = ref([]);


        const CartStore = useCartStore()
        const cart_add = useCartStore()
        const lists = computed(()=> CartStore.prod)
        const cart_lists = CartStore.cart

        const deplete1 = CartStore.deplete
        

        onMounted(()=> {
            /* getProduct() */
        })



        function btn_search(search_data){

            /* console.log(search_data) */
            axios_client.get('http://127.0.0.1:8000/api/search/' + search_data).then(response=>{
                console.log(response.data);
            }).catch(error =>{

            })

        }
           
        

        return {
            product_lists,lists,cart_add,cart_lists,CartStore,deplete1,btn_search,search_data
        }
    }


    


}









</script>