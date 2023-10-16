<template>

<transition name="modalAnim">
<div v-if="modalActive" class="container-fluid d-flex justify-content-center align-items-center" 
style="width: 100%; height: 100%; position: fixed; overflow: auto; z-index: 1; background-color: rgba(0, 0, 0, 0.605); overflow: auto;">
    
    <div class="row container d-flex 
    justify-content-center align-items-center">

        <div class="col-lg-8 bg-light shadow-sm p-0">

            <div class="col-12 mb-4 text-start p-3" style="background-color: rgb(4, 180, 116);">
                <span class="fw-bold fs-5 text-white">Transaction ID: 1234678</span>
            </div>


            <div class="d-flex text-center flex-column p-0 m-0">
                <p class="fw-bold">J.R. AMADOR PET AND POULTRY SUPPLIES</p>
                <p class="fw-bold">Unit Sample Malolos KM 42</p>
                <p class="fw-bold">McArthur Hway Bulihan, Malolos City Bul</p>
                <p class="fw-bold">TEL NO : (044)1234-567</p>
            </div>

                <div class="col-12 border border-black"></div>




            <div class="div p-3 m-1 ">

                <div class="col-12 d-flex mb-2 justify-content-center ">
                    <div class="col-8 border ">
                        <span class="fw-bold">Energy Booster Conditioner</span>
                    </div>

                    <div class="col-2 border ">
                        <span class="fw-bold">X200000</span>
                    </div>    
                    
                    <div class="col-2 border">
                        <span class="fw-bold">P 150,000</span>
                    </div>    
                </div>
         
            </div>

                

            <div class="div p-3 m-1">

                <div class="col-12 d-flex mb-2 ">
                    <div class="col-10">
                        <span class="fw-bold">Sub Total</span>
                    </div>

                    
                    <div class="col-2 text-center">
                        <span class="fw-bold">350.00</span>
                    </div>    
                </div>

                <div class="col-12 d-flex mb-2 ">
                    <div class="col-10">
                        <span class="fw-bold">Vat</span>
                    </div>

                    
                    <div class="col-2 text-center">
                        <span class="fw-bold">350.00</span>
                    </div>    
                </div>


                <div class="col-12 d-flex mb-2 ">
                    <div class="col-10">
                        <span class="fw-bold">Total Amount</span>
                    </div>

                    
                    <div class="col-2 text-center">
                        <span class="fw-bold">350.00</span>
                    </div>    
                </div>

                         
            </div>

            <div class="div p-3 m-1">

                <div class="col-12 d-flex mb-2">
                    <div class="col-10">
                        <span class="fw-bold">Total Payment</span>
                    </div>
                    
                    <div class="col-2 ">
                        <span class="fw-bold">350.00</span>
                    </div>    
                </div>

               
                <div class="col-12 d-flex mb-2">
                    <div class="col-10">
                        <span class="fw-bold">Change</span>
                    </div>
                    
                    <div class="col-2 ">
                        <span class="fw-bold">350.00</span>
                    </div>    
                </div>

                         
            </div>




                

                







            <div class="d-flex justify-content-end p-3">
                <button class="btn btn-danger me-2" @click="toggleModal">Close</button>

                <form @submit.prevent="create_category()">
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
                
            </div>

        
        </div>
    </div>
</div>
</transition>


    <div class="row gx-2 mt-3">

            <div v-if="show_alert" class="alert alert-success alert-dismissible fade show" role="alert">
                Ordered Successfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div v-if="msg" class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-circle-exclamation me-2"></i><span class="fs-6 fw-bold">{{ msg }}</span>
                <button type="button" class="btn-close" @click="CartStore.close_msg_stock()"></button>
            </div>



            <div class="col-xl-7 mt-3">
                <div class="bg-light w-100">
                    <h4 class="p-3 text-light" style="background-color: rgb(4, 180, 116);"><i class="fas fa-cash-register me-2"></i>Transaction</h4>


                    <div class="d-flex justify-content-between p-3">
                        <!-- <h4 class="">Total</h4>
                        <h4 class="text-success fw-bold">1,000 Pesos</h4> -->
                        <h5>Transaction ID: 123213123123</h5>
                        <h5>Transaction Date: Saturday, July 22, 2023</h5>

        
                    </div>


                    <div class="div mt-3 p-3">
                        <input type="text" class="form-control mb-3" v-model="customer_name" placeholder="Customer Name">
                    </div>

                
                    


                
                    <div class="table-responsive mt-3 mb-3" style="overflow: auto; height: 20rem; ">
                        <table class="table table-hover table-borderless text-center" >

                            <thead style="background-color: rgb(4, 180, 116);">
                                <tr c>
                                <th scope="col" class="fw-bold">Product Name</th>
                                <th scope="col" class="fw-bold">Quantity</th>
                                <th scope="col" class="fw-bold">Price</th>
                                <th scope="col" class="fw-bold">Total</th>
                                <th scope="col" class="fw-bold">Action</th>
                                </tr>
                            </thead>

                        <tbody v-for="(list, i) in cart_lists" :key="list.product_id">
                            <tr>
                                <td class="fw-bold">{{list.product_name}}</td>
                                <td class="fw-bold">{{list.quantity}}</td>
                                <td class="fw-bold">{{list.price}}</td>
        
                                <td class="fw-bold d-flex justify-content-center align-items-center">                    
                                    <button :disabled="deplete1" @click="CartStore.increment(i,list.stocks,list.price,list.product_id)" 
                                    class="btn btn-sm btn-success">+</button>

                                    <span class="mx-2">{{list.total.toLocaleString('en-US')}}</span>

                                    <button @click="CartStore.decrement(i,list.product_id)" class="btn btn-sm btn-danger">-</button>
                            
                                </td>


                                <td class="fw-bold"><button @click="CartStore.remove_cart(index)" 
                                    role="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            
                            </tr>

                        </tbody>
                        </table>
                    </div>


                    <form @submit.prevent="checkout()">
                        <div class="p-3 mt-3" style="background-color: rgb(176, 230, 209);">

                            <h4 class="text-dark"><i class="fas fa-coins me-2 m-2 text-success"></i>
                                Sub Total: {{Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(CartStore.grand_total)}}
                            </h4>

                            <h4 class="text-dark"><i class="fas fa-coins me-2 m-2 text-success"></i>
                                VAT(12%): {{
                                    Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format((CartStore.grand_total * 0.12))                           
                                }}
                            </h4>

                            <h4 class="text-dark"><i class="fas fa-coins me-2 m-2 text-success"></i>
                                Grand Total: {{
                                    Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format((CartStore.grand_total + (CartStore.grand_total * .12)))                                                    
                                    }}
                            </h4>

                            
                            
                            <button type="submit" class="btn btn-success" :disabled="submit_btn">         
                                <span role="status" class="mx-1">Check Out</span>
                                <span v-if="submit_btn" class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            </button>

                        </div>
                    </form>
            
                    


                
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
                            

                        
                            <div class="col-xl-6 p-2" v-for="p in lists.data" :key="p.id">
                    
                                <div class="p-3">
                                

                                    <div  class="d-flex justify-content-center flex-column align-items-center">
                                        <p>{{p.product.product_name}}</p>
                                        <p>{{p.stocks}}</p>
                                        <p>{{p.product.price}}</p>
                                    </div>



                                    <div v-if="p.stocks == 0" class="div">
                                        <button disabled class="btn btn-danger w-100 mt-3 fw-bold">Sold out</button>
                                    </div>

                                    <div v-else class="div">
                                        <button :disabled="deplete1" 
                                        @click="cart_add.add_cart(p.product_id,p.product.product_name,p.stocks,p.product.price,)" 
                                        class="btn btn-primary w-100 mt-3">add</button>
                                    </div>


                                </div>

                            </div>

                            
                        </div>

                        

                        
                        <div class="w-100 d-flex justify-content-center mt-3">
                            <Bootstrap5Pagination :data="lists" :limit="1" @pagination-change-page="CartStore.getProduct"/>
                        </div>
                        

                    </div>
            </div>
    </div>



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


        const customer_name = ref("");






        const cart_order = CartStore.cart
        const show_alert = ref(false);
        const submit_btn = ref(false);


        const lists = computed(()=> CartStore.prod)
        const cart_lists = computed(()=> CartStore.cart)
        const msg = computed(()=> CartStore.message2)
        const deplete1 = computed(()=> CartStore.deplete2)



    
        onMounted(()=> {
         CartStore.getProduct()
        })


        function checkout(){

            console.log('hello')
            
   
            /* if(CartStore.cart.length == 0){  
                alert('Please add items')
            }

            else if (customer_name.value == null){
                alert('Please Enter Name')
            }

            else{
                submit_btn.value = true
                const today = new Date();
                const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                const dateTime = date +' '+ time;


                
                let form = new FormData();
                form.append('sub_total', Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format((CartStore.grand_total)))
                form.append('customer_name', customer_name.value)
                form.append('vat', Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(CartStore.grand_total * 0.12))


                form.append('grand_total',  
                Intl.NumberFormat('en-PH', 
                { style: 'currency', currency: 'PHP' }).format((CartStore.grand_total + (CartStore.grand_total * .12))))



                form.append('cart', JSON.stringify(cart_lists.value))
                form.append('purchase_date', dateTime)


                axios_client.post("http://127.0.0.1:8000/api/checkout", form).then(response=>{
                    console.log(response.data)     
                    customer_name.value = ''
                    show_alert.value = true
                    CartStore.clear_cart()
                    CartStore.getProduct()
                    submit_btn.value = false

                }).catch(error =>{
                    console.log(error.response)
                    submit_btn.value = false
                })
               
            }     */       
        }


        function btn_search(search_data){

            /* console.log(search_data) */
            axios_client.get('http://127.0.0.1:8000/api/search/' + search_data).then(response=>{
                console.log(response.data);
            }).catch(error =>{

            })

        }
           
        
        return {
            msg,product_lists,lists,cart_add,cart_lists,CartStore,
            deplete1,btn_search,search_data,checkout,customer_name,
            show_alert,cart_order,submit_btn
        }
    }
}
</script>