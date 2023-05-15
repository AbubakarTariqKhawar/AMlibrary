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
                            <router-link :to="{ name: 'readinterface', query: { book: JSON.stringify(book.BooId) } }">
                                <img :src="`/img/books/${book.BooPicture}`" width="282.13" height="400" >
                            </router-link>

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
                    <router-link :to="{ name: 'readinterface', query: { book: JSON.stringify(book.BooId) } }"><button type="button" class="btn ">Read Now</button></router-link>
                    <button type="button" class="btn ml-2" v-if="!logedin" data-bs-toggle="modal" data-bs-target="#borrrowLog" style="background-color: #e0e0e0; color: #EEEEEE;">Borrow</button>
                    <button type="button" class="btn ml-2" v-if="logedin" @click="saveBookIncart(book)">Borrow</button>
                </div>

            </div>
        </div>
    </div>

    </div>

        <!----------------------------Borrorw -------------------------------------------->

        <div class="modal fade " id="borrrowLog" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <div style="text-align: center;">
                            You need to be loged in. To Borrow.
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <!----------------------------Borrorw already exits-------------------------------------------->

        <div class="modal fade " id="bookExCart" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <!---<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->

                    <div class="lgoinbdiv mt-1" style="padding: 4%; border: none;">
                        <div style="text-align: center;">
                            You can only borrow one copy of each book and This Book Already Exists in cart.
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
            logedin: false,
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

            this.logedin = window.Laravel.isLoggedin;

        },
        methods: {
            saveBookIncart(book){
                // Remove the "book" value from local storage
                //localStorage.removeItem('books');

                let books = JSON.parse(localStorage.getItem('books'));

                if (books) {

                    const isBookExists = books.some(item => item.BooId === book.BooId);

                    if (isBookExists) {
                        console.log('A book with the same ID already exists in storage');
                        const modal = new bootstrap.Modal(document.getElementById('bookExCart'));
                        modal.show();
                    } else {
                        console.log('There are books in storage, but not with the same ID');

                        books.push(book);
                        localStorage.setItem('books', JSON.stringify(books));
                    }
                } else {
                    console.log('There are no books in storage');

                    localStorage.setItem('books', JSON.stringify([book]));
                }

            },
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
