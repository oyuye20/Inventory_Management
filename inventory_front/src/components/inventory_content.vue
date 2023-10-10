<template>

<div class="container-fluid mt-3 table-responsive">
    <table class="table text-center mb-0 bg-white">
  <thead class="bg-success">
    <tr>
            <th class="fw-bold fs-6">Product Name</th>
            <th class="fw-bold fs-6">Price</th>
            <th class="fw-bold fs-6">Stocks</th>
            <th class="fw-bold fs-6">Production Date</th>
            <th class="fw-bold fs-6">Expiration Date</th>
    </tr>
  </thead>


  <tbody v-for="i in inv_lists.data">
    <tr>
      <td>
          <p class="fw-bold">{{i.product.product_name}}</p>
      </td>

      <td>
          <p class="fw-bold">{{i.product.price}}</p>
      </td>

      <td>
          <p class="fw-bold">{{i.stocks}}</p>
      </td>

      <td>
          <p class="fw-bold">{{i.production_date}}</p>
      </td>

      <td>
          <p class="fw-bold">{{i.expiration_date}}</p>
      </td>

    </tr>
  </tbody>
  
</table>

<div class="d-flex justify-content-end align-items-center mt-3 fw-bold" >
    <Bootstrap5Pagination :limit="1" :keepLength="true" :data="inv_lists" class="shadow-sm"  
    @pagination-change-page="getInventory"
    />
  </div>




</div>


<div class="container-fluid">

  <h4>Add new stocks</h4>

  <label for="" class="fw-bold mb-2">Category</label>
  <select class="form-control mb-3" v-model="inventory.category">    
    <option selected v-for="cat in category_lists" >{{cat.category}}</option>
  </select>

  <label for="" class="fw-bold mb-2">Product Name</label>
  <select class="form-control mb-3" v-model="inventory.product_info">
    <option v-for="prod in productinfo" :key="prod.id" :value="prod.id">{{prod.product_name}}</option>
  </select>

  <label for="" class="fw-bold mb-2">Number of Stocks</label>
  <input type="text" class="form-control mb-3" placeholder="Stocks" @input="filter_input" v-model="inventory.stocks">

  <label for="" class="fw-bold mb-2">Date of Production</label>
  <input type="date" class="form-control mb-3" placeholder="Production Date" v-model="inventory.prod_date">

  <label for="" class="fw-bold mb-2">Expiration Date</label>
  <input type="date" class="form-control" placeholder="Expiration Date" v-model="inventory.exp_date">


  <form @submit.prevent="add_inventory">
    <button type="submit" class="btn btn-success form-control mt-3">Add new stocks</button>
  </form>
  

</div>




</template>



<script>
import { useStore } from "vuex";
import { computed, toHandlers } from "vue";
import { useRouter } from "vue-router";
import {reactive, onMounted} from 'vue';
import axios_client from '../axios';
import { ref, watchEffect, defineComponent } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';


export default {

    components: {
        Bootstrap5Pagination
    },
   
    
    setup(){

        const inv_lists = ref([]);
        const category_lists = ref([]);
        const productinfo = ref([]);

        const inventory  = reactive({
          category: '',
          product_info: '',
          stocks: '',
          prod_date: '',
          exp_date: '',
        })

        
        function filter_input(){
          this.inventory.stocks = this.inventory.stocks.replace(/[^0-9]/g, "");
        }


        function add_inventory(){
          let formData = new FormData();
          formData.append('category', this.inventory.category);
          formData.append('product_info', this.inventory.product_info);
          formData.append('stocks', this.inventory.stocks);
          formData.append('prod_date', this.inventory.prod_date);
          formData.append('exp_date', this.inventory.exp_date);


          let url = 'http://127.0.0.1:8000/api/inventory/add';
          axios_client.post(url,formData).then(response => {

            console.log(response.data)
            this.getInventory();

          }).catch(error =>{
             
              console.log(error.response.data)
          })
        }


    
        /* GET PRODUCT TABLE */
        const getInventory = async(page = 1) => {
            axios_client.get('http://127.0.0.1:8000/api/inventory?page=' + page).then(response=>{
                inv_lists.value = response.data

                console.log(response.data)

            }).catch(error =>{
                console.log(error.response.data)
            })
        }




        const getCat = async() => {
            axios_client.get('http://127.0.0.1:8000/api/select/category')
            .then(response=>{
                category_lists.value = response.data;
            }).catch(error =>{
                console.log(error.response.data)
            })
        }



        const getProductInfo = async() => {
            axios_client.get('http://127.0.0.1:8000/api/select/product/info')
            .then(response=>{
                productinfo.value = response.data;
            }).catch(error =>{
                console.log(error.response.data)
            })
        }




        onMounted(()=> {
            getInventory()
            getCat()
            getProductInfo()
        })

        return {getInventory,inv_lists,category_lists,getCat,productinfo,inventory,add_inventory,filter_input}

    }



}
</script>