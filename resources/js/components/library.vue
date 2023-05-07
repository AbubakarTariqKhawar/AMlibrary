<template>
    <div class="container">
        <label class="mt-3" style="font-size: 25px; ">
            <b>Categories:</b>
            <div class="categoriesS">


                <select v-model="selectedCategory" style="margin-top: 2px; float: left; cursor: pointer;" class="form-select  cartselect arder" name="arder">
                    <option value="allc">All Books</option>
                    <option v-for="category in categories" :key="category.CatId" :value="category.CatId">{{ category.CatName }}</option>
                </select>

                <div class=" rounded rounded-pill searchabu">
                    <div class="input-group">
                    <input type="search" v-model="searchQuery" @keyup.enter="performSearch" placeholder="which Book you searching?" aria-describedby="button-addon1" class="form-control border-0 bg-light" style="color: white !important;">
                    <div class="input-group-append">
                        <button id="button-addon1" @click="performSearch" type="button" class="btn btn-link "><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                </div>

            </div>

        </label>
        <label>



        </label>


    </div>

    <div>
        <div class="container ">
            <div class="row" style="margin-right: -15px; margin-left: -29px; justify-content: center; !important!important">


                <div class="book " v-if="searchResults" v-for="book in searchResults" :key="book.BooId">
                    <div class="front">
                        <div class="cover">
                            <router-link :to="{ name: 'bookdetail', query: { book: JSON.stringify(book.BooId) } }">
                                <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="146">
                            </router-link>
                        </div>
                    </div>
                    <div class="left-side" >
                        <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="40.1">
                    </div>
                </div>

                <div class="book " v-if="books" v-for="book in books" :key="book.BooId">
                    <div class="front">
                        <div class="cover">
                            <router-link :to="{ name: 'bookdetail', query: { book: JSON.stringify(book.BooId) } }">
                                <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="146">
                            </router-link>
                        </div>
                    </div>
                    <div class="left-side" >
                        <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="40.1">
                    </div>
                </div>

                <div class="book " v-if="selectedCategoryBooks" v-for="book in selectedCategoryBooks" :key="book.BooId">
                    <div class="front">
                        <div class="cover">
                            <router-link :to="{ name: 'bookdetail', query: { book: JSON.stringify(book.BooId) } }">
                                <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="146">
                            </router-link>
                        </div>
                    </div>
                    <div class="left-side" >
                        <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="40.1">
                    </div>
                </div>

            </div>

        </div>
    </div>

</template>

<script>
export default {
    name: "library",
    data() {
        return {
        books: [],
        searchQuery: "",
        searchResults: [],
        selectedCategory: "allc",
        categories: [],
        selectedCategoryBooks: null,
        };
    },
    mounted() {
        this.fetchAllBooks();
        this.getAllCategories();
    },
    watch: {
        selectedCategory(newValue) {
        if (newValue !== "allc") {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/getBookByCategory', {
                    CatId: newValue,
                })
                .then(response => {
                    this.selectedCategoryBooks = response.data.books;
                    console.log('checking book cate');
                    console.log(this.selectedCategoryBooks);
                    this.books = [];
                    this.searchResults = [];
                })
                .catch(error => {
                    console.error(error);
                });

            })

        } else {
            this.selectedCategoryBooks = null;
            this.fetchAllBooks();
        }
        },
    },
    methods: {
        fetchAllBooks() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get('/api/getallbooks')
                .then(response => {
                    this.books = response.data.books;
                    console.log('checking book ');
                    console.log(this.books);
                    this.selectedCategoryBooks = null;
                    this.searchResults = [];
                })
                .catch(error => {
                    console.error(error);
                });
            })
        },
        getAllCategories(){
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get('/api/getAllCategories')
                .then(response => {
                    this.categories = response.data.categories;
                    console.log('checking categories ');
                    console.log(this.categories);
                })
                .catch(error => {
                    console.error(error);
                });
            })
        },
        performSearch() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/searchbook', {
                    bookName: this.searchQuery,
                })
                .then(response => {
                    this.searchResults = response.data.books;
                    console.log('searching books ');
                    console.log(this.searchResults);
                    this.books = [];
                    this.selectedCategoryBooks = null;
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



.container .book {
  position: relative;
  display: block;
  width: 146px;
  height: 207px;
  margin: 2%;
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
.imghight{
    height: 207px;
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
