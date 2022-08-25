<script>


export default {

}
</script>



<template>


    <div class=" col-lg-12">
        <hr>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">paires</th>
                <th scope="col">Taux</th>
                <th scope="col">Utilisation</th>
                <th scope="col"></th>
                <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">EUR-->USD</th>
                <td>1.5</td>
                <td>6</td>
                <td>MODIFIER</td>
                <td>X</td> 
                
                </tr>

                <tr>
                <th scope="row">USD-->EUR</th>
                <td>8.6</td>
                <td>8</td>
                <td>MODIFIER</td>
                <td>X</td>
                </tr>

                <tr>
                    <th scope="row">COP-->USD</th>
                    <td>2.5</td>
                    <td>4</td>
                    <td>MODIFIER</td>
                    <td>X</td>
                </tr>
                <tr>
                    <th scope="row">USD-->COP</th>
                    <td>4.8</td>
                    <td>6</td>
                    <td>MODIFIER</td>
                    <td>X</td>
                </tr>

            </tbody>
        </table>
    </div>
</template>



<style>

    
    .br{
        border: 1px solid red;
    }

    th{
        text-align: center;
        color: white;
    }
    
    td{
        text-align: center;
        color: white;
    }

    hr{
        background-color:white;
    }
  

</style>