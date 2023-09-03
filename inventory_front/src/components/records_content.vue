<template>


    <div v-if="loading" class="div p-3 flex-column d-flex justify-content-center align-items-center container-fluid" style="height: 100vh;">
        <p class="fw-bold fs-3">Loading...</p>
        <span class="spinner-border spinner-border-sm  p-3" aria-hidden="true" style="font-size: ;"></span>
    </div>  


<div v-else class="div">

    <!-- CHOICES TAB -->
    <ul class="nav nav-underline mb-3 d-flex justify-content-center mt-3" id="pills-tab" role="tablist">

        <li class="nav-item col-2" role="presentation">

            <button class="nav-link active w-100 fs-5" id="pills-sold-tab" 
            data-bs-toggle="pill" data-bs-target="#pills-sold" type="button" 
            role="tab" aria-controls="pills-sold" aria-selected="true"><i class="fas fa-file-invoice-dollar me-2"></i>Sold Items</button>

        </li>


        <li class="nav-item col-2" role="presentation">

            <button class="nav-link w-100 fs-5" id="pills-critical-tab" 
            data-bs-toggle="pill" data-bs-target="#pills-critical" type="button" 
            role="tab" aria-controls="pills-critical" aria-selected="true"><i class="fas fa-triangle-exclamation me-2"></i>
            Critical Stocks</button>

        </li>



        <li class="nav-item col-2" role="presentation">

            <button class="nav-link w-100 fs-5" id="pills-inventory-tab" 
            data-bs-toggle="pill" data-bs-target="#pills-inventory" type="button" 
            role="tab" aria-controls="pills-inventory" aria-selected="false">
            <i class="fas fa-box me-2"></i>
            Inventory Lists</button>

        </li>


        <li class="nav-item col-2" role="presentation">

            <button class="nav-link w-100 fs-5" id="pills-cancel-tab" 
            data-bs-toggle="pill" data-bs-target="#pills-cancel" type="button" 
            role="tab" aria-controls="pills-cancel" aria-selected="false">
            <i class="fas fa-ban me-2"></i>
            Cancelled Order</button>

        </li>


        <li class="nav-item col-2" role="presentation">

            <button class="nav-link w-100 fs-5" id="pills-stock-tab" 
            data-bs-toggle="pill" data-bs-target="#pills-stock" type="button" 
            role="tab" aria-controls="pills-stock" aria-selected="false">
            <i class="far fa-clock me-2"></i>
            Stock History</button>

        </li>


        </ul>

          

            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-sold" role="tabpanel" aria-labelledby="pills-sold-tab" tabindex="0">
                    
                Sold Items
                </div>



                <div class="tab-pane fade show" id="pills-stock" role="tabpanel" aria-labelledby="pills-stock-tab" tabindex="0">Stock</div>

                <div class="tab-pane fade show" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab" tabindex="0">Cancelled Order</div>




                <!-- INVENTORY TAB -->
                <div class="tab-pane fade" id="pills-inventory" role="tabpanel" aria-labelledby="pills-inventory-tab" tabindex="0">


                <h4 class="mt-3 w-100 bg-light p-3"><i class="fas fa-database me-2"></i>Product Lists</h4>
                <div class="table-responsive">
                    

                    <table class="table table-hover table-borderless text-center">
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
                            <!-- <th>Actions</th> -->
                            </tr>
                        </thead>

                    <tbody v-for="product in product_lists.data" :key="product.id" class="">
                        <tr>
                            <td hidden>{{product.id}}</td>
                            <td class="fs-5" >{{product.serial_number}}</td>
                            <td class="fs-5" >{{product.manufacturer}}</td>
                            <td class="fs-5" >{{product.product_name}}</td>
                            <td class="fs-5" >{{product.description}}</td>
                            <td class="fs-5" >{{product.size}}</td>
                            <td class="fs-5" >{{product.stocks}}</td>
                            <td class="fs-5" >{{product.production_date}}</td>
                            <td class="fs-5" >{{product.expiration_date}}</td>
                            <td class="fs-5" >hello</td>

                            <!-- <td class="m-3">
                                <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                <button type="button" class="btn btn-danger mx-1 mt-2" @click.prevent="del_prod(product.id)"><i class="bi bi-trash3-fill"></i></button>
                            </td> -->
                        </tr>

                    </tbody>
                    </table>


                    <div class="d-flex justify-content-end align-items-center">
                        <Bootstrap5Pagination :data="product_lists" @pagination-change-page="getProduct"/>
                    </div>

                </div>


                </div>
                <!-- END OF INVENTORY TAB -->




                <!-- CRITICAL TAB -->
                <div class="tab-pane fade" id="pills-critical" role="tabpanel" aria-labelledby="pills-critical-tab" tabindex="0">

                    <h4 class="mt-3 w-100 bg-light p-3"><i class="fas fa-exclamation-triangle me-2 text-danger"></i><span class="text-danger fw-bold">Critical Stocks</span></h4>

                    <div class="table-responsive">
                    

                    <table class="table table-hover table-borderless text-center">
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
                            <!-- <th>Actions</th> -->
                            </tr>
                        </thead>

                        <tbody v-for="stock in stock_lists" :key="stock.id" class="">
                            <tr>
                                <td hidden>{{stock.id}}</td>
                                <td class="fs-5" >{{stock.serial_number}}</td>
                                <td class="fs-5" >{{stock.manufacturer}}</td>
                                <td class="fs-5" >{{stock.product_name}}</td>
                                <td class="fs-5 text-center" style="word-break: break-all;" >{{stock.description}}</td>
                                <td class="fs-5" >{{stock.size}}</td>
                                <td class="fs-5 text-danger fw-bold" >{{stock.stocks}}</td>
                                <td class="fs-5" >{{stock.production_date}}</td>
                                <td class="fs-5" >{{stock.expiration_date}}</td>
                                <td class="fs-5" >hello</td>

                                <!-- <td class="m-3">
                                    <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger mx-1 mt-2" @click.prevent="del_prod(product.id)"><i class="bi bi-trash3-fill"></i></button>
                                </td> -->
                            </tr>

                        </tbody>
                    </table>
                </div>
                    
                </div>
                <!-- END OF CRITICAL TAB -->


            </div>


</div>





</template>


<script>
import { Bootstrap5Pagination } from 'laravel-vue-pagination';
import {reactive, onMounted} from 'vue';
import axios_client from '../axios';
import { ref, watchEffect } from 'vue';

export default {
    name: 'records_content',

    components: {
        Bootstrap5Pagination
    },

    setup(){
        let product_lists = ref([]);
        let stock_lists = ref([]);


        const loading = ref(true);


        /* GET PRODUCT TABLE */
        const getProduct = async(page = 1) => {

            axios_client.get('http://127.0.0.1:8000/api/products?page=' + page).then(response=>{
                product_lists.value = response.data;
                loading.value = false;
            }).catch(error =>{

            })
        }

        /* LISTS OF LOW STOCKS PRODUCT */
        const low_stocks = async() => {
            axios_client.get('http://127.0.0.1:8000/api/stocks').then(response=>{
                /* console.log(response.data.stocks) */
                stock_lists.value = response.data.stocks
                loading.value = false;
            }).catch(error =>{

            })
        }

        function del_prod(id){
            let url = 'http://127.0.0.1:8000/api/delete/' + id;
            axios_client.delete(url).then(response => {
                this.getProduct()
            })
        }


        onMounted(()=> {
            getProduct()
            low_stocks()
        })

        return {
            product_lists,stock_lists,getProduct,low_stocks,del_prod,loading
        }


    }
}
</script>