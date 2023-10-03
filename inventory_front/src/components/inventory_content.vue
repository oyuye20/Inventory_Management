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


  <tbody v-for="inv in inv_lists.data">
    <tr>

      <td>
          <p class="fw-bold">{{inv.product_name}}</p>
      </td>

      <td>
          <p class="fw-bold">{{inv.price}}</p>
      </td>

      <td>
          <p class="fw-bold">{{inv.stocks}}</p>
      </td>

      <td>
          <p class="fw-bold">{{inv.production_date}}</p>
      </td>

      <td>
          <p class="fw-bold">{{inv.expiration_date}}</p>
      </td>

     <!--  <td>
        <p class="fw-normal mb-1">Software engineer</p>
        <p class="text-muted mb-0">IT department</p>
      </td>
      <td>
        <span class="badge badge-success rounded-pill d-inline">Active</span>
      </td>
      <td>Senior</td>
      <td>
        <button type="button" class="btn btn-link btn-sm btn-rounded">
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/6.jpg"
              class="rounded-circle"
              alt=""
              style="width: 45px; height: 45px"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">Alex Ray</p>
            <p class="text-muted mb-0">alex.ray@gmail.com</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Consultant</p>
        <p class="text-muted mb-0">Finance</p>
      </td>
      <td>
        <span class="badge badge-primary rounded-pill d-inline"
              >Onboarding</span
          >
      </td>
      <td>Junior</td>
      <td>
        <button
                type="button"
                class="btn btn-link btn-rounded btn-sm fw-bold"
                data-mdb-ripple-color="dark"
                >
          Edit
        </button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="https://mdbootstrap.com/img/new/avatars/7.jpg"
              class="rounded-circle"
              alt=""
              style="width: 45px; height: 45px"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1">Kate Hunington</p>
            <p class="text-muted mb-0">kate.hunington@gmail.com</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">Designer</p>
        <p class="text-muted mb-0">UI/UX</p>
      </td>
      <td>
        <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
      </td>
      <td>Senior</td>
      <td>
        <button
                type="button"
                class="btn btn-link btn-rounded btn-sm fw-bold"
                data-mdb-ripple-color="dark"
                >
          Edit
        </button>
      </td> -->

      
    </tr>
  </tbody>
  
</table>

<div class="d-flex justify-content-end align-items-center mt-3 fw-bold" >
    <Bootstrap5Pagination :limit="1" :keepLength="true" :data="inv_lists" class="shadow-sm"  
    @pagination-change-page="getInventory"
    />
  </div>




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

        const inv_lists = ref([])
    
        /* GET PRODUCT TABLE */
        const getInventory = async(page = 1) => {
            axios_client.get('http://127.0.0.1:8000/api/inventory?page=' + page).then(response=>{
                inv_lists.value = response.data.inv

            }).catch(error =>{
                console.log(error.response.data)
            })
        }

        onMounted(()=> {
            getInventory()
        })

        return {getInventory,inv_lists}

    }



}
</script>