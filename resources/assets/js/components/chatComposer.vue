<template>
  <div class="chat-composer">
      <input type="text" placeholder="Type your message ...">
      <button class="btn btn-primary">Send</button>
  </div>
</template>



<script>
export default{
    data() {
     return {
       
     }    
    }
}    

</script>

<style>
 .chat-composer {display: flex; }
 .chat-composer input {flex: 1 auto;}
 .chat-composer button {border-radius: 0;}
</style>
 