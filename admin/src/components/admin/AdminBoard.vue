<script>
import axios from 'axios';
import EditPairsModal from './EditPairsModal.vue';
export default {
    props: {
        pairs: {
            type: Array,
            default: () => []
        }
    },
    components: { EditPairsModal },
    data() {
        return {
            show: false,
            editPairs:[]
        };
    },
    methods: {
        async pairsDelete(id) {
            await axios.delete(`http://127.0.0.1:8000/api/pairs/${id}`)
                .then((response) => {
                window.location.reload();
            })
                .catch((error) => {
                console.log(error);
            });
        },
        showModal() {
            this.show = !this.show;
        },
        getPairsToEdit(pairs){
            this.editPairs=pairs;
            console.log(this.editPairs)
        }
    },
    
}
</script>



<template>
<div>
    <table class="text-center table table-bordered col-lg-12">
        <thead>
            <tr>
                <th scope="col">Paires</th>
                <th scope="col">Taux</th>
                <th scope="col">Compteur</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="pair in this.pairs" :key="pair.id">

                <td>{{ pair.get_currency_from.code }} => {{ pair.get_currency_to.code }} </td>
                <td>{{ pair.rate }}</td>

                <td>0</td>
                <td>
                    <button type="button" @click="showModal(); getPairsToEdit(pair)" class="btn btn-primary mx-2 ">Modifier</button>

                    <button type="button" @click="pairsDelete(pair.id)" class="btn btn-danger">Supprimer</button>
                </td>
            </tr>

        </tbody>
    </table>

<div v-if="show">
<EditPairsModal :show="this.show" :showModal="this.showModal" :editPairs="this.editPairs"/>

</div>
</div>
</template>


<style>
td{
    color: white;
}
tr{
    color: white;
}
    
</style>