import {defineStore} from 'pinia'
import { ref } from 'vue';
import axios_client from '../axios';
import { computed, toHandlers } from "vue";

export const useCartStore = defineStore('CartStore', () =>{

    const list_product = ref([]);

    const prod = computed(() => list_product.value)

    const cart = ref([]);


    const deplete = ref(false);






    const add_cart = (id, product_name, stocks, price) => {
        const data_cart = {
            id,
            product_name,
            quantity: 1,
            price,
            total: price,
            stocks
        }

        const find_id = cart.value.find(e => e.id === data_cart.id)


        if(find_id)
        {
            if(find_id.quantity >= stocks)
            {
                deplete.value = true
            }

            else 
            {
                find_id.quantity += 1
                find_id.total = (find_id.price * find_id.quantity)
                
                /* let grand_total = (find_id.total +=find_id.total)

                console.log(grand_total) */
            }
        }

        else 
        {
            cart.value.push(data_cart)
        }

        
    }



    const getProduct = async(page = 1) => {
        axios_client.get('http://127.0.0.1:8000/api/products?page=' + page).then(response=>{
            list_product.value = response.data;

            /* console.log(response.data) */
        }).catch(error =>{

        })
    }


    const grand_total = computed(() => {
        return cart.value.reduce((num, prd) => (num + prd.price * prd.quantity) ,0)
    })


    const remove_cart = (i) => {
        cart.value.splice(i, 1)
    }




    const increment = (i,stocks) => {

        if(cart.value[i].quantity >= stocks){
            deplete.value = true
        }

        else {
            cart.value[i].quantity += 1
        }
      
    }



    
    const decrement = (i) => {
        cart.value[i].quantity -= 1

        if(cart.value[i].quantity == 0) {
            cart.value.splice(i, 1)
        }
    }

    return {getProduct,prod,add_cart,cart,grand_total,remove_cart,increment,decrement}


    /* state: () => ({
        cart: [],
        
    }),

    actions: {
        cart_add(item){
            this.cart.push(item)
        }
    },

    getters: {
    

    } */
})