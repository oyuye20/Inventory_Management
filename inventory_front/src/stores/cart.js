import {defineStore} from 'pinia'
import { ref } from 'vue';
import axios_client from '../axios';
import { computed, toHandlers } from "vue";

export const useCartStore = defineStore('CartStore', () =>{

    const list_product = ref([]);

    const prod = computed(() => list_product.value)


    const cart = ref([]);
    const message_stock = ref("");



    const message2 = computed(() => message_stock.value)
    const deplete2 = computed(() => deplete.value)


    const deplete = ref(false);


    const add_cart = (product_id, product_name, stocks, price) => {
        const data_cart = {
            product_id,
            product_name,
            quantity: 1,
            price,
            total: price,
            stocks
        }

        const find_id = cart.value.find(e => e.product_id === data_cart.product_id)


        if(find_id)
        {
            if(find_id.quantity >= stocks)
            {
                deplete.value = true
                message_stock.value =  "The " + find_id.product_name + " is out of stock"
            }

            else 
            {
                find_id.quantity += 1
                find_id.total = (find_id.price * find_id.quantity);
            }
        }

        else 
        {
            cart.value.push(data_cart)     
        }

        
    }



    const getProduct = async(page = 1) => {
        axios_client.get('http://127.0.0.1:8000/api/inventory?page=' + page).then(response=>{
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
        deplete.value = false
        message_stock.value = ''
    }


    const clear_cart = () => {
        cart.value = [];
        deplete.value = false
        message_stock.value = ''
    }


    const close_msg_stock = () => {
        deplete.value = false
        message_stock.value = ''
    }







    const increment = (i,stocks,price,product_id) => {

        const find_id = cart.value.find(e => e.product_id === product_id)

        if(cart.value[i].quantity >= stocks){
            deplete.value = true
            message_stock.value =  "The " + find_id.product_name + " is out of stock"
        }

        else {
            cart.value[i].quantity += 1
            find_id.total = (find_id.price * find_id.quantity);

        }
      
    }





    
    const decrement = (i,product_id) => {
        const find_id = cart.value.find(e => e.product_id === product_id)
        
        cart.value[i].quantity -= 1
        find_id.total -= (find_id.price * 1);
        
        deplete.value = false
        message_stock.value = ''

        if(cart.value[i].quantity == 0) {
            cart.value.splice(i, 1)
            deplete.value = false
            message_stock.value = ''
        }
    }

    return {getProduct,prod,add_cart,cart,grand_total,remove_cart,increment,decrement,clear_cart,message_stock,message2,close_msg_stock}


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