<script>
import axios from 'axios';
export default {
props: {
        pairs: {
            type: Array,
            default: () => []
        }
    },
}
</script>


<template>
    <table class="text-center table table-bordered col-lg-12">
    <thead>
      <tr>
        <th scope="col">Paires</th>
        <th scope="col">Taux</th>
        <th scope="col">Nb</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="pair in this.pairs" :key="pair.id">

        <td>{{ pair.get_currency_from.code }} => {{ pair.get_currency_to.code }} </td>
        <td>{{ pair.rate }}</td>
        
        <td>0</td>
        <td>
          <button  type="button" class="btn btn-primary">Modifier</button>

          <button type="button"  class="btn btn-danger">Supprimer</button>
        </td>
      </tr>
      
    </tbody>
  </table>


</template>


<style>
</style>