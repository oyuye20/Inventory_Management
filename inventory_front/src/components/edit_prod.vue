<template>
    <div class="container d-flex justify-content-center mt-3">

        
<form class="col-12" @submit.prevent="add_btn">

    <h4>Edit Product</h4>

    <div class="mb-3">
        <label for="" class="form-label">Serial Number</label>
        <input type="text" v-model="add_prod.serial_number" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

        <div v-if="v$.serial_number.$error">
            <p class="text-danger fw-bold mt-1">{{ "Serial number required" }}</p>
        </div>

    </div>

    <div class="mb-3">
        <label for="" class="form-label">Product name</label>
        <input type="text" v-model="add_prod.product_name" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Manufacturer</label>
        <input type="text" v-model="add_prod.manufacturer" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="" v-model="add_prod.description" id="" class="form-control"></textarea>
    </div>

    <div class="d-flex justify-content-center col-12">

        <div class="mb-3 col-5 mx-1">
            <label for="" class="form-label">Size</label>
            <input type="text" v-model="add_prod.size" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        </div>

        <div class="mb-3 col-5 mx-1">
            <label for="" class="form-label">Stocks</label>
            <input type="text" v-model="add_prod.stocks" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        </div>

    </div>

    <div class="mb-3">
        <label for="" class="form-label">Production Date</label>
        <input type="date" v-model="add_prod.production_date" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Expiration Date</label>
        <input type="date" v-model="add_prod.expiration_date" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="modal-footer">

        <button type="submit" :disabled="loading" class="btn btn-success me-2 modal-add">
            <span v-if="loading" class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span>Add product
        </button>

    </div>       

    <i class="fas fa-tachometer-alt me-2"></i>

    <!-- data-bs-dismiss="modal" -->

</form>
</div>
</template>

<script>
import {reactive, onMounted} from 'vue';
import {useVuelidate} from '@vuelidate/core'
import { required, email } from '@vuelidate/validators'
import axios_client from '../axios';
import { useRouter } from "vue-router";
import { ref } from 'vue'

export default {

    setup(){

    const router = useRouter();
    const loading = ref(false);

    const add_prod  = reactive({
        serial_number:'',
        manufacturer: '',
        product_name: '',
        description : '',
        size : '',
        stocks : '',
        production_date : '',
        expiration_date : '',
    })

   /*  const serial_number = ref('') */

    const rules  = {
        serial_number: {required}
    }

    const v$ = useVuelidate(rules, add_prod)


    function add_btn(){
        loading.value = true;
        this.v$.$validate()

        if(!this.v$.$error)
        {
            let formData = new FormData();
            formData.append('serial_number', this.add_prod.serial_number);
            formData.append('manufacturer', this.add_prod.manufacturer);
            formData.append('product_name', this.add_prod.product_name);
            formData.append('description', this.add_prod.description);
            formData.append('size', this.add_prod.size);
            formData.append('stocks', this.add_prod.stocks);
            formData.append('production_date', this.add_prod.production_date);
            formData.append('expiration_date', this.add_prod.expiration_date);

            let url = 'http://127.0.0.1:8000/api/add_product';
            axios_client.post(url,formData).then(response => {

            loading.value = false;
            router.push({name: 'dashboard'})
            
            }).catch(error =>{
                loading.value = false;
                console.log(error.response)
            })
        } 

        else{
            loading.value = false;
        }
    }


    const getProduct = async() => {
        axios_client.get('http://127.0.0.1:8000/api/products').then(response=>{
            console.log(response.data.products)
            product_lists.value = response.data.products
        }).catch(error =>{

        })
    }


    onMounted(()=> {
       /*  getProduct() */
    })


    return {
       add_prod,add_btn,getProduct,rules,v$,loading
    }




}

}





</script>