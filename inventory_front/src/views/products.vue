<template>

<transition name="modalAnim">
    <div v-if="modalActive" class="container-fluid d-flex justify-content-center align-items-center" 
style="width: 100%; height: 100%; position: fixed; overflow: auto; z-index: 1; background-color: rgba(0, 0, 0, 0.605); overflow: auto;">
    
    <div class="row container d-flex 
    justify-content-center align-items-center">

        <div class="col-lg-5 bg-light shadow-sm rounded-5 p-0">

            <div class="col-12 mb-4 text-start rounded-top-3 p-3" style="background-color: rgb(4, 180, 116);">
                <span class="fw-bold fs-3 text-white"><i class="fas fa-circle-plus me-3">
                </i>Add new category</span>
            </div>

            <div class="div p-4">          

                <div class="col-12 mb-4">
                    <input type="text" class="form-control" v-model="category.name" placeholder="Enter category name">
                </div>

                <div class="col-12">
                    <input type="text" class="form-control" v-model="category.desc" placeholder="Description">
                </div>

            </div>


            <div class="col-12 border border-black px-3">
                
            </div>

            <div class="d-flex justify-content-end p-3">
                <button class="btn btn-danger me-2" @click="toggleModal">Close</button>

                <form @submit.prevent="create_category()">
                    <button class="btn btn-success">Save</button>
                </form>
                
            </div>

        
        </div>
    </div>
</div>
</transition>



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

                        <div id="sidebtn" class="list-group-item fs-5 list-group-item-action d-flex justify-content-center rounded-5" >

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="bi bi-grid-fill me-3"></i>
                        </div>
                           
                        <div class="div w-100">
                            <span class="fs-4">Dashboard</span>
                        </div>

                    </div>
                        
                    </router-link>



                    <router-link :to="{name: 'products'}">
                        
                        <div id="sidebtn" class="list-group-item fs-5 list-group-item-action d-flex justify-content-center rounded-5 mt-2" style="background-color: rgb(185, 232, 206); color: rgb(57, 164, 59);">

                        <div class="div d-flex justify-content-center align-items-center">
                            <i class="bi bi-box-seam-fill me-3"></i>
                        </div>
                           
                        <div class="div w-100">
                            <span class="fs-4">Products</span>
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



                    <a id="sidebtn" role="button" @click="logout"  class="list-group-item fs-5 list-group-item-action d-flex justify-content-center rounded-5 mt-2" >

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

                
                <div class="d-flex justify-content-between w-100">

                    <a v-on:click="isSidebar =! isSidebar" role="button" id="toggle_icon"><i class="fas fa-bars me-3 fa-2x"></i></a>
                    

                    <h2 class="fs-5 fw-bold">Products</h2>
                    

                    <div class="div">
    
                        <span class="fs-5 h-100 me-3">{{ dateTime }}</span>   
                        <a role="button" class="fw-bold text-dark fs-5"><i class="bi bi-power me-2"></i>Logout</a>
                    </div>

                    
                </div>


            </nav>

            <div class="container-fluid px-4">

                <router-link :to="{name: 'add_product'}">
                    <button type="button" class="btn btn-dark mt-3 modal-add">
                        Add new product
                    </button>
                </router-link>

                <button class="btn btn-dark mt-3" @click="toggleModal">Add new category</button>


                <div v-if="loading" class="p-3 d-flex justify-content-center align-items-center container-fluid h-100 mt-3">
                    <span class="spinner-border spinner-border-lg  p-3" aria-hidden="true" style="font-size: ;"></span>
                 </div>  
                

                <div v-else class="table-responsive">
                    <h4 class="mt-3 mb-3 w-100 bg-light p-3"><i class="fas fa-box-open me-2"></i>Product Info Lists</h4>

                    <!-- <div class="container-fluid d-flex mb-3 mt-3">
                        <input type="text" role="searchbox" class="form-control me-3" placeholder="search a product">
                        <button  class="btn btn-sm btn-primary"><i class="fas fa-magnifying-glass"></i></button>
                    </div> -->


                    <h4 v-if="typing" class="w-100 text-center d-flex justify-content-center align-items-center loading">Loading....</h4>

                    <table v-else class="table table-hover table-borderless text-center w-100">


                        <thead style="background-color: rgb(4, 180, 116);">
                            <tr>
                                <th scope="col" class="fs-6 fw-bold">Serial Number</th>
                                <th scope="col" class="fs-6 fw-bold">Manufacturer</th>
                                <th scope="col" class="fs-6 fw-bold">Product Name</th>
                                <th scope="col" class="fs-6 fw-bold">Description</th>
                                <th scope="col" class="fs-6 fw-bold">Size Name</th>
                                <th class="fs-6 fw-bold" >Status</th>
                                <th class="fs-6 fw-bold" >Actions</th>
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
                            <td class="fs-5">hello</td>

                            <td class="m-3">

                                <RouterLink :to="{name: 'edit_product', params:{id:product.id} }">
                                    <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                </RouterLink>
                                
                                <button type="button" class="btn btn-danger mx-1 mt-2" @click.prevent="del_prod(product.id)"><i class="bi bi-trash3-fill"></i></button>

                            </td>
                        </tr>

                    </tbody>
                    </table>


                    <div class="d-flex justify-content-end align-items-center" >
                        <Bootstrap5Pagination :limit="1" :keepLength="true" :data="product_lists" class="shadow-sm"  
                        @pagination-change-page="getProduct"
                        />
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
import { RouterLink, useRouter } from "vue-router";
import {reactive, onMounted} from 'vue';
import axios_client from '../axios';
import { ref, watchEffect } from 'vue';
import {useVuelidate} from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'

export default {
    name: 'products',

    components: {
    Bootstrap5Pagination,
    RouterLink
},



    setup(){
        let product_lists = ref([]);


        const category = ref([]);

        const search_box = ref('');
        const typing = ref(false);
        const isSidebar = ref(false);

        const loading = ref(true);
        const modalActive = ref(false);

        const toggleModal = ()=>{
            modalActive.value = !modalActive.value;
        }


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
            axios_client.put(url).then(response => {
                this.getProduct()
            })
        }


        /* GET PRODUCT TABLE */
        const getProduct = async(page = 1) => {
            axios_client.get('http://127.0.0.1:8000/api/products?page=' + page).then(response=>{
                product_lists.value = response.data;
                loading.value = false;
            }).catch(error =>{

            })
        }


        /* CREATE CATEGORY */

        function create_category(){
            axios_client.post(`http://127.0.0.1:8000/api/update_product/`, category.value).then(response=>{


                
            }).catch(error =>{
                console.log(error.response.data)
            })
        }
    
        onMounted(()=> {
            getProduct()
        })


        return {
            user: computed(() => store.state.user.data)
            ,product_lists,del_prod,getProduct,typing,loading,isSidebar,modalActive,toggleModal,create_category,category
        }



    }
}

</script>

<style scoped>
.modalAnim-leave-to,
.modalAnim-enter-from{
    opacity: 0;
}

.modalAnim-leave-from,
.modalAnim-enter-to{
    opacity: 1;
}

.modalAnim-leave-active,
.modalAnim-enter-active{
    transition: opacity 0.3s;
}
    
</style>
