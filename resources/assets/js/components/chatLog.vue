<template>
   <div class="chat-log">
    <chat-message v-for="message in messages" :message="message" key=""></chat-message>
       
   </div>
</template>



<script>
export default{
    data() {
    return {
        messages: [
            {
                message: 'hi how are you',
                user: 'Amir'

            },
            {
                message: 'hi how are yourself',
                user: 'naser'

            },
            {
                message: 'hi how are both',
                user: 'reza'

            }

         ]
     

     }    
    }
}    

</script>

<style>
 
</style>
