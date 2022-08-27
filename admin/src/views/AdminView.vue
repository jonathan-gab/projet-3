<script>
import AdminBoard from '../components/admin/AdminBoard.vue';
import axios from 'axios';
import NewCurrency from '../components/admin/NewCurrency.vue';
export default {
    components: { AdminBoard, NewCurrency },
    data() {
        return {
            pairs: [],
            currencies: [],
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

    <NewCurrency/>
    <AdminBoard :pairs="this.pairs"/>

</div>
   
</template>



<style>

</style>