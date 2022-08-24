<script>
export default {

}
</script>

<template>
<div class=" text-center">
    <div class="  formBackground">
        <form>
            <h1 class=" text-center font-monospace pb-4">MoneyValue</h1>
            <div class=" row m-auto col-lg-12">

                <div class="m-auto col-lg-6">
                    <input type="email" placeholder="Somme" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class=" col-lg-6">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>EUR --> USD</option>
                        <option value="1">USD --> EUR</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        
            <div class="mb-3 pt-4 m-auto col-lg-6">
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class=" py-2 text-center">
                <button type="submit" class="btn font-monospace btn-primary col-lg-4">Convertir</button>
            </div>

        
            
        </form>
</div>
    
</div>

  
</template>



<style>

    
    .br{
        border: 1px solid red;
    }

  

</style>