<template>



<input type="text" class="form-control mb-3" v-model="add_new">
<button @click="new_function" class="btn btn-primary form-control mb-3">Add new</button>


<div class="div" v-for="carts in CartStore.cart">
<p>{{ carts.id }}</p>
<p>{{ carts.product_name }}</p>
</div>


<p>Price {{ CartStore.total }}</p>

</template>



<script>
import {useCartStore} from '../stores/cart'
import { ref, watchEffect } from 'vue';

export default {
    name: 'tutorial',


    setup(){
        const CartStore = useCartStore()
        const add_new = ref('');

        const new_function = () => {
            if(add_new.value.length > 0){
                CartStore.addCart({
                    id: Math.floor(Math.random() * 1000),
                    quantity: 10,
                    product_name: add_new.value,
                    price: 1000
                })
                add_new.value = ''
            }
        }


        return {CartStore,new_function,add_new}



    }




}

</script>