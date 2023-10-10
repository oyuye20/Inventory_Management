<template>
    <div class="container d-flex justify-content-center mt-3">

        
<form class="col-12 p-1 mb-3" @submit.prevent="update_Product()">

    <h4>Edit Product</h4>

    <div class="mb-3">
        <label for="" class="form-label">Serial Number</label>
        <input type="text" @input="filter_input" v-model="edit_prod_val.serial_number" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

        <!-- <div v-if="v$.serial_number.$error">
            <p class="text-danger fw-bold mt-1">{{ "Serial number required" }}</p>
        </div> -->

    </div>

    <div class="mb-3">
        <label for="" class="form-label">Product name</label>
        <input type="text" v-model="edit_prod_val.product_name" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Manufacturer</label>
        <input type="text" inputmode="numeric" v-model="edit_prod_val.manufacturer" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="" v-model="edit_prod_val.description" id="" class="form-control"></textarea>
    </div>

    <div class="d-flex justify-content-center col-12">

        <div class="mb-3 col-5 mx-1">
            <label for="" class="form-label">Size</label>
            <input type="text" v-model="edit_prod_val.size" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        </div>


    </div>


    <div class="modal-footer">

        <button type="submit" :disabled="loading" 
        class="btn btn-success me-2 modal-add ">
        
        <span v-if="loading" class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span>Update Product
        </button>

    </div>       

    <!-- data-bs-dismiss="modal" -->

</form>
</div>
</template>

<script>
import {reactive, onMounted} from 'vue';
import {useVuelidate} from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'
import axios_client from '../axios';
import { useRouter, useRoute } from "vue-router";
import { ref } from 'vue'
import { defineProps } from "vue";

export default {

    setup(){

    const router = useRouter();
    const route = useRoute();
    const loading = ref(false);


    const edit_prod_val = ref([]);
    


    const rules  = {
        serial_number: {required}
    }

    const v$ = useVuelidate(rules)

    

    /* GET PRODUCT TABLE */
    const getProduct = async() => {
        axios_client.get(`http://127.0.0.1:8000/api/product/edit/` 
        + route.params.id).then(response=>{
            edit_prod_val.value = response.data.edit_prod;

        }).catch(error =>{
            console.log(error)
        })
    }



    /* UPDATE A PRODUCT */
    function update_Product (){
        loading.value = true;

        /* console.log(edit_prod_val.value) */

        axios_client.put(`http://127.0.0.1:8000/api/update_product/`
         + route.params.id, edit_prod_val.value).then(response=>{
            loading.value = true;
            router.push({name: 'products'})
        }).catch(error =>{
            console.log(error)
        })
    }



    /* PREVENT ALPHANUMERIC CHARACTERS INPUT */
    function filter_input(){
        this.edit_prod_val.serial_number = 
        this.edit_prod_val.serial_number.replace(/[^0-9]/g, "");
    }


    onMounted(()=> {
        getProduct()
    })


    return {
       rules,v$,loading,getProduct,route,edit_prod_val,update_Product,filter_input
    }




}

}





</script>