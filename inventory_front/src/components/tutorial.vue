<template>


<div class="w-50">
    <StreamBarcodeReader @decode="onDecode"></StreamBarcodeReader>
</div>

<p class="fw-bold">{{ res }}</p>

</template>



<script>
import { ref, watchEffect } from 'vue';
import {QrcodeStream} from 'vue-qrcode-reader';
import { StreamBarcodeReader } from "vue-barcode-reader";

export default {
    name: 'tutorial',

    components: {
        QrcodeStream,
        StreamBarcodeReader
    },


    setup(){


        const res = ref([]);
 
        function onDecode(result) {

        res.value = result
        console.log(res.value)
        
        }
        

        return{
            onDecode,res
        }

    }




}

</script>