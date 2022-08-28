<script>
import axios from 'axios'
import useVuelidate from "@vuelidate/core";
import {
    required,
    maxLength,
    helpers,
    alpha,
} from "@vuelidate/validators";
export default {
    name: "NewCurrency",
    setup() {
        return {
            v$: useVuelidate({ $autoDirty: true }),
        };
    },

    data() {
        return {
            newCurrency: "",
        }
    },

    validations() {
        return {
            newCurrency: { 
                required:helpers.withMessage('Ce champ doit être rempli', required), 
                alpha:helpers.withMessage('Ce champs accepte seulement des lettres', alpha),
                maxLength:helpers.withMessage('Une devise à 3 lettres doit être saisi', maxLength(3))  
            },
        }
    },

    methods: {

        async addNewCurrency(event) {
            console.log("hey")
            // this.v$.$validate();
            // if (this.v$.$error==true) {
            //     event.preventDefault();
            // }else{
               await axios.post("http://127.0.0.1:8000/api/currencies",
                {
                    code: this.newCurrency,
                })
                .then(response => console.log(response))
                .catch(err => console.log(error)); 
            // }
            
            
            
        }
    }
}
</script>

<template>
    <form class="mb-2 m-auto">
        <div class=" row col-lg-12">
            
            <div class=" mb-4 col-lg-8">
                <label class="text-white" for="rate">Ajouter une nouvelle devise</label>
                <input type="text" class=" form-control" placeholder="ex : EUR" v-model="newCurrency">
                <div class="error" v-if="v$.newCurrency.$error">
                    {{ v$.newCurrency.$errors[0].$message }}
                </div>
            </div>
            <div class=" col-lg-4 m-auto ">
                <button type="submit" class="col-8 btn btn-primary" @click.prevent="addNewCurrency">Ajouter</button>
            </div>

        </div>


    </form>
</template>



<style>
.error{
    color:red
}
</style>