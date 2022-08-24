<script>
export default {

}
</script>

<template>
<div class=" text-center">
    <div class="formBackground">
        <form>
            <h1 class=" text-center font-monospace pb-4">MoneyValue</h1>
            <div class=" row m-auto col-lg-12">

                <div class="m-auto search_box col-lg-6">
                    <input type="text" placeholder="Somme" class="form-control formBg" id="" aria-describedby="">
                </div>

                <div class=" col-lg-6">
                    <select class="form-select converterSelect" aria-label="Default select example">
                        <option selected>EUR --> USD</option>
                        <option value="1">USD --> EUR</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        
            <div class="search_box mb-3 pt-4 m-auto col-lg-6">
                <input type="text" class="form-control" id="">
            </div>
            <div class=" py-2 text-center">
                <button type="submit" class="btn font-monospace btnConverter col-lg-4">Convertir</button>
            </div>

        
            
        </form>
</div>
    
</div>

  
</template>



<style>

    
    .br{
        border: 1px solid red;
    }

    .btnConverter{
        opacity: 70%;
        background: rgb(2, 116, 215); 
        color: white;
   
    }

    .btnConverter:hover{
        opacity: 80%;
        background: none;
        color : black;
    }

    .search_box input[type="text"]{
        
        backdrop-filter: blur(10%);
        color: black;
    }

    .converterSelect{
        
        
        backdrop-filter: blur(10%);
        }

  

</style>