<template>
    <div class="container d-flex justify-content-center " >
        <div class="card  d-flex  " >

        <div class="row g-0 d-flex  justify-content-center">

            <!--
            <div class="col-md-4">
            <img src="../../books/rickRiordan.webp" class="img-fluid rounded" alt="rick Riordan picture" height="200px">
            </div>-->
            <div class="book  justify-content-center">
                    <div class="front ">
                        <div class="cover">
                            <img :src="`/img/books/${book.BooPicture}`" width="282.13" height="400" >

                        </div>
                    </div>
                    <div class="left-side" >
                        <img :src="`/img/books/${book.BooPicture}`" height="399.9" width="42.29"><!--:src="mivariable"-->
                    </div>
            </div>
            <div class="col-md-8 justify-content-center ">
                <div class="card-body text-center   mt-3" >
                    <h5 class="card-title "><b>{{ book.BooName }}</b></h5>
                    <p class="card-text text-justify ">{{ book.BooDescription }}</p>
                    <p class="card-text text-left"><small class="text-body-secondary ">Category: {{ book.BooCatId }}, Price: {{ book.BooPrice }}</small></p>
                </div>
            </div>
        </div>
    </div>

    </div>

</template>

<script>
    export default {
        name: "bookdetail",
        data() {
            return {
            book: [],
            };
        },
        mounted() {
            const bookParam = this.$route.query.book;
            if (bookParam) {
                this.book = JSON.parse(bookParam);
                console.log('received book');
                console.log(this.book);
                this.fetchOneBooks();
            }

        },
        methods: {
            fetchOneBooks() {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/pickoneBook', {
                        id: this.book,
                    })
                    .then(response => {
                        this.book = response.data.book;
                        console.log('checking book ');
                        console.log(this.book);
                    })
                    .catch(error => {
                        console.error(error);
                    });
                })
            },
        },
    };
</script>

<style scoped>
.col-md-8{
    height: 100%;
    margin-bottom: 2%;
    margin-top: 2%;
}

@media (min-width:992px){

    .row{
        margin-right: 0px !important;
    margin-left: 0px !important;
    width: 1159px;
    height: 428px;
        height: auto;
    }


    .card-title{
        text-align: left;
    }
    .text-body-secondary{
        text-align: left;
    }
}
.card{
        margin: 3%;
        width: 1010px;
        height: auto;
        cursor:default;


    }



.container .book {
  position: relative;
  display: block;
  width: 282.13px;
  height: 400px;

  border-radius: 2px 4px 4px 2px;
  background: linear-gradient(45deg,  #DAD5DC 0%, #f2ebf4 100%);
  font-family: acumin-pro, sans-serif;
  -webkit-box-shadow: 13px 13px 8px 0px rgba(151, 146, 153,0.6);
-moz-box-shadow: 13px 13px 8px 0px rgba(151, 146, 153,0.6);
box-shadow: 13px 13px 8px 0px rgba(151, 146, 153,0.6);
  font-weight: 400;
  color: #2b2b2b;
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transition: -webkit-transform .5s;
  -moz-transition: -moz-transform .5s;
  transition: transform .5s;
  padding-left: 0%;
}

.container .book:hover {
  -webkit-transform: rotate3d(0,1,0,35deg);
  -moz-transform: rotate3d(0,1,0,35deg);
  transform: rotate3d(0,1,0,35deg);
  cursor: pointer;
}

.container .book > div,
.container .front > div {
  display: block;
  position: absolute;
}


.container .front {
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transform-origin: 0% 50%;
  -moz-transform-origin: 0% 50%;
  transform-origin: 0% 50%;
  -webkit-transition: -webkit-transform .5s;
  -moz-transition: -moz-transform .5s;
  transition: transform .5s;
  -webkit-transform: translate3d(0,0,20px);
  -moz-transform: translate3d(0,0,20px);
  transform: translate3d(0,0,20px);
  z-index: 10;
}

.container .front > div {
  width: 146px;
  height: 207px;
}

.container .left-side{
  width: 40px;
  left: -20px;
  height: 207px;
  background-color: rgba(232,229,234);
  -webkit-transform: rotate3d(0,1,0,-90deg);
  -moz-transform: rotate3d(0,1,0,-90deg);
  transform: rotate3d(0,1,0,-90deg);

}

/*
.cover {
    background-image: url("../../books/bookCourt.webp");
    background-size: 146px 207px;
}
*/

@media (max-width:768px) {
    .container .book {
        margin: 6%;
    }
}

.row{
    margin-right: -15px !important;
    margin-left: -29px !important;
}

@media (max-width:500px) {
    .row{
        margin-right: -15px !important;
        margin-left: -17px !important;
    }
}

</style>
