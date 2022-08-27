<script>
import AdminBoard from '../components/admin/AdminBoard.vue';
import axios from 'axios';
export default {
    components: { AdminBoard },
    data() {
        return {
            pairs: [],
        }
    },
    mounted() {
    axios.get('http://127.0.0.1:8000/api/pairs')
      .then((response) => {
        
        this.pairs = response.data;
      })
      .catch(err => console.log(err))
    }
}

</script>


<template>
<div>

    <AdminBoard :pairs="this.pairs"/>

</div>
   
</template>



<style>

</style>