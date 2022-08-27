<script>
import axios from 'axios'
import useVuelidate from "@vuelidate/core";
import {
    required,
    maxLength,
    minValue,
    helpers,
    decimal,
} from "@vuelidate/validators";
export default {
    name: "newPairsForm",
    setup() {
        return {
            v$: useVuelidate({ $autoDirty: true }),
        };
    },
    props: {
        currencies: {
            type: Array,
            default: () => []
        }
    },

    data() {
        return {
            idFromCurrency: "",
            idToCurrency: "",
            rateCurrency: "",
        }
    },

    validations() {
        return {
            idFromCurrency: { 
                required:helpers.withMessage('Veuillez sélectionner une devise', required), 
            },
            idToCurrency: { 
                required:helpers.withMessage('Veuillez sélectionner une devise', required), 
            },
            rateCurrency: { 
                required:helpers.withMessage('Veuillez saisir un taux de change', required), 
                minValue:helpers.withMessage('Veuillez saisir un taux de change au dessus de 0',  minValue(0)) ,
                decimal:helpers.withMessage('Veuillez saisir un nombre',  decimal)
            }
        }
    },

    methods: {

        async newPairs(event) {
           
            this.v$.$validate();
            if (this.v$.$error==true) {
                event.preventDefault();
            }else{
               await axios.post("http://127.0.0.1:8000/api/pairs",
                {
                    currency_from_id: this.idFromCurrency,
                    currency_to_id: this.idToCurrency,
                    rate: this.rateCurrency
                })
                .then(response => console.log(response))
                .catch(err => console.log(error)); 
            }
            
            
            
        }
    }




}
</script>

<template>
    <form class="mb-2 m-auto">
        <div class="  row col-lg-12">
            <div class="mb-3 col-lg-3">
                <label for="currencyEntry">Devise d'entrée</label>
                <select class="form-select" v-model="idFromCurrency">
                    <option v-for="currency in currencies" :key="currency.id" :value="currency.id">
                        {{ currency.code }}
                    </option>
                </select>
                <div class="error" v-if="v$.idFromCurrency.$error">
                    {{ v$.idFromCurrency.$errors[0].$message }}
                </div>
            </div>
            <div class="mb-3 col-lg-3">
                <label for="currencyExit">Devise de sortie</label>
                <select class="form-select" v-model="idToCurrency">
                    <option v-for="currency in currencies" :key="currency.id" :value="currency.id">
                        {{ currency.code }}
                    </option>
                </select>
                <div class="error" v-if="v$.idToCurrency.$error">
                    {{ v$.idToCurrency.$errors[0].$message }}
                </div>
          </div>
            <div class="mb-3 col-lg-3">
                <label for="rate">Taux de change</label>
                <input type="text" class="form-control" placeholder="ex : 0.2" v-model="rateCurrency">
                <div class="error" v-if="v$.rateCurrency.$error">
                    {{ v$.rateCurrency.$errors[0].$message }}
                </div>
            </div>
            <div class="col-lg-3 m-auto">
                <button type="submit" class="btn btn-primary" @click="newPairs">Ajouter</button>
            </div>

        </div>


    </form>
</template>



<style>
.error{
    color:red
}
</style>