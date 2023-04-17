<template>
    <section id="banner_principal" class="container-fluid">
            <div class="col-12 banner ">
                <div class="container d-flex">
                    <h1 class=" text-color3">CrackPizza All you needa</h1>
                </div>
                <div class="container d-flex">
                    <h2 class=" text-color3 ml-4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; is love and Pizza</h2>
                </div>
                <div class="container d-flex">
                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" onclick="location.href='<?=base_url.'pizza/menu'?>'" class="btn btn-dark">Order Now</button>
                    </h2>
                </div>
            </div>
    </section>
    <section>
        <div class="container ">
            <h3>Trending Books</h3>
        </div>
    </section>
    <section>
        <div class="container ">
            <div class="row">
                <div class="card col-12 col-md-3 mt-3 showtext">
                    <img src="../../books/bookCourt.webp" class="card-img" alt="Book">
                    <div class=" overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div>

                <div class="card col-12 col-md-3 mt-3 showtext">
                    <img src="../../books/bookCourt.webp" class="card-img" alt="Book">
                    <div class=" overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div>

                <div class="card col-12 col-md-3 mt-3 showtext">
                    <img src="../../books/bookCourt.webp" class="card-img" alt="Book">
                    <div class=" overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
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
