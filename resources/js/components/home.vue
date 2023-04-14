<template>
    <section id="banner_principal" class="container-fluid">
            <div class="col-12 banner">
            <div class="container-lg d-flex">
                <h1 class=" text-color3">CrackPizza All you needa</h1>
            </div>
            <div class="container-lg d-flex">
                <h2 class=" text-color3 ml-4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; is love and Pizza</h2>
            </div>
            <div class="container-lg d-flex">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" onclick="location.href='<?=base_url.'pizza/menu'?>'" class="btn btn-dark">Order Now</button>
                </h2>
            </div>
            </div>
    </section>
    <section>
        <div class="container-lg ">
            <h3>Trending Books</h3>
        </div>
    </section>
</template>

<script>
export default {
    name: "Home"
}
</script>

<style scoped>

</style>
