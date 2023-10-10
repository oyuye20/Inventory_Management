<template>
    <div class="container d-flex justify-content-center mt-3">

        
<form class="col-12" @submit.prevent="add_btn">

    <h4>Add new product</h4>

    <div class="mb-3">
        <label for="" class="form-label">Category</label>
        <select class="form-control" v-model="category">    
            <option selected v-for="cat in category_lists" :key="cat.id" :value="cat.id">{{cat.category}}</option>
        </select>

    </div>






    <div class="mb-3">
        <label for="" class="form-label">Serial Number</label>
        <input type="text" v-model="add_prod.serial_number" @input="filter_input" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

        <div v-if="v$.serial_number.$error">
            <p class="text-danger fw-bold mt-1">{{ "Serial number required" }}</p>
        </div>

    </div>

    <div class="mb-3">
        <label for="" class="form-label">Product name</label>
        <input type="text" v-model="add_prod.product_name" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

        <div v-if="v$.product_name.$error">
            <p class="text-danger fw-bold mt-1">{{ "Product name required" }}</p>
        </div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Manufacturer</label>
        <input type="text" v-model="add_prod.manufacturer" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

        <div v-if="v$.manufacturer.$error">
            <p class="text-danger fw-bold mt-1">{{ "Manufacturer required" }}</p>
        </div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Price</label>
        <input type="text" v-model="add_prod.price" @input="filter_input" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

        <div v-if="v$.price.$error">
            <p class="text-danger fw-bold mt-1">{{ "Manufacturer required" }}</p>
        </div>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="" v-model="add_prod.description" id="" class="form-control"></textarea>
    </div>

    

    <div class="d-flex justify-content-center col-12">

        <div class="mb-3 col-5 mx-1">
            <label for="" class="form-label">Size</label>
            <input type="text" v-model="add_prod.size" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">

            <div v-if="v$.size.$error">
                <p class="text-danger fw-bold mt-1">{{ "Size required" }}</p>
            </div>
        </div>

        <div class="mb-3 col-5 mx-1">
            <label for="" class="form-label">Stocks</label>
            <input type="text" v-model="add_prod.stocks" @input="filter_input" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        
            <div v-if="v$.stocks.$error">
                <p class="text-danger fw-bold mt-1">{{ "Stocks required" }}</p>
            </div>

            
        </div>

        

    </div>


    <div class="modal-footer">

        <button type="submit" :disabled="loading" class="btn btn-success me-2 modal-add">
            <span v-if="loading" class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span>Add product
        </button>

    </div>       

    

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
import { faker } from '@faker-js/faker';

export default {

    setup(){

    const router = useRouter();
    const loading = ref(false);
    let category_lists = ref([]);

    const category = ref([]);


    const add_prod  = reactive({
        serial_number: '',
        manufacturer: '',
        product_name: '',
        description : '',
        size : '',
        price : '',
        stocks : '',
        category: '',
    })


    function filter_input(){
        this.add_prod.serial_number = this.add_prod.serial_number.replace(/[^0-9]/g, "");
        this.add_prod.stocks = this.add_prod.stocks.replace(/[^0-9]/g, "");
        this.add_prod.price = this.add_prod.price.replace(/[^0-9]/g, "");
    }



   /*  const serial_number = ref('') */

    const rules  = {
        serial_number: {required},
        manufacturer: {required},
        product_name: {required},
        description: {required},
        size: {required},
        price: {required},
        stocks: {required},
    }

    const v$ = useVuelidate(rules, add_prod)


    function add_btn(){
        console.log(category.value)
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
            formData.append('price', this.add_prod.price);
            formData.append('category', category.value);

            let url = 'http://127.0.0.1:8000/api/add_product';
            axios_client.post(url,formData).then(response => {

            loading.value = false;
            router.push({name: 'products'})
            
            }).catch(error =>{
                loading.value = false;
                console.log(error.response)
            })
        } 

        else{
            loading.value = false;
        }
    }


    const getCat = async() => {
        axios_client.get('http://127.0.0.1:8000/api/select/category')
        .then(response=>{
            category_lists.value = response.data;
        }).catch(error =>{
            console.log(error.response.data)
        })
    }



    onMounted(()=> {
        getCat()
    })


    return {
       add_prod,add_btn,rules,v$,loading,filter_input,getCat,
       category_lists,category
    }




}

}





</script>