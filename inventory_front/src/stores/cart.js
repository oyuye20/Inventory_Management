import {defineStore} from 'pinia'


export const useCartStore = defineStore('CartStore', {
    state: () => ({
        cart: [],
        /* customer_name: 'Juan Dela Cruz',
        price: 300,
        quantity: 10, */
    }),

    actions: {
        addCart(carts1){
            this.cart.push(carts1)
        }
    },

    getters: {
        /* total(){
            let tot = 0;
            tot = this.cart[quantity] * 10;
            return tot;
        } */

    }
})