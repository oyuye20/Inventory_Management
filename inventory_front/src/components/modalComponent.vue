<template>


<transition name="modalAnim1">
    <div class="div" v-show="open">
        <div class="container-fluid d-flex justify-content-center align-items-center" 
        style="width: 100%; height: 100%; position: fixed; overflow: auto;  background-color: rgba(0, 0, 0, 0.605)">
                <div class="row container d-flex 
                justify-content-center align-items-center">

                    <div class="col-lg-5 bg-light shadow-sm p-0">
             
                            <slot></slot>


                    </div>
                </div>  
                
                
        </div>
    </div>
</transition>






    



    
   <!--  <div class="vue-modal" v-show="open">
        <div class="vue-modal-inner">
            <div class="vue-modal-content">
                <slot></slot>
              	<button type="button" @click="$emit('close')">Close</button>
            </div>
        </div>
    </div> -->
</template>


<script>

export default {
    name: 'modalComponent',

    props: {
    open: {
      type: Boolean,
      default: true,
    },
  },
}


</script>

<style scoped>
.modalAnim1-leave-to,
.modalAnim1-enter-from{
    opacity: 0;
}

.modalAnim1-leave-from,
.modalAnim1-enter-to{
    opacity: 1;

}

.modalAnim1-leave-active,
.modalAnim1-enter-active{
    transition: opacity 0.3s;
}
    
</style>