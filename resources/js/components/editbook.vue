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
                <button class="btn btn-light action-button" style="margin-left: 10px;" role="button" data-bs-toggle="modal" data-bs-target="#createBook" @click="CreateBValue()"><b>Create Book</b></button>

            </div>

        </label>
        <label>



        </label>


    </div>


    <div>
        <div class="container "><!-- -15 -29 -->
            <div class="row" style="margin-right: 0px; margin-left: 0px; margin-bottom: 19px; justify-content: center; !important">


                <div class="adminbooks" v-if="searchResults" v-for="book in searchResults" :key="book.BooId">
                    <div class="book ">

                    <div class="front">
                        <div class="cover">
                            <router-link :to="{ name: 'bookdetail', query: { book: JSON.stringify(book.BooId) } }">
                                <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="146" height="207">
                            </router-link>
                        </div>
                    </div>
                    <div class="left-side" >
                        <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="40.1" height="207" >
                    </div>

                    </div>
                    <div class="mt-3 " style="text-align: center;">
                        <i class="fa fa-pencil fa-lg " data-bs-toggle="modal" data-bs-target="#editBook" @click="putEditValue(book); bookEdit = null;" style="cursor: pointer;" aria-hidden="true"></i>
                        <i class="fa fa-trash fa-lg ml-4 " data-bs-toggle="modal" data-bs-target="#deleteBook" @click="deleteBvalue = book.BooId; bookDelete = null;" style="cursor: pointer;" aria-hidden="true"></i>

                    </div>
                </div>


                <div class="adminbooks" v-if="books" v-for="book in books" :key="book.BooId">
                    <div class="book ">
                    <div class="front">
                        <div class="cover">
                            <router-link :to="{ name: 'bookdetail', query: { book: JSON.stringify(book.BooId) } }">
                                <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="146" height="207">
                            </router-link>
                        </div>
                    </div>
                    <div class="left-side" >
                        <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="40.1" height="207" >
                    </div>
                    </div>
                    <div class="mt-3 " style="text-align: center;">
                        <i class="fa fa-pencil fa-lg " data-bs-toggle="modal" data-bs-target="#editBook" @click="putEditValue(book); bookEdit = null;" style="cursor: pointer;" aria-hidden="true"></i>
                        <i class="fa fa-trash fa-lg ml-4 " data-bs-toggle="modal" data-bs-target="#deleteBook" @click="deleteBvalue = book.BooId; bookDelete = null;" style="cursor: pointer;" aria-hidden="true"></i>

                    </div>
                </div>


                <div class="adminbooks" v-if="selectedCategoryBooks" v-for="book in selectedCategoryBooks" :key="book.BooId">
                    <div class="book ">

                    <div class="front">
                        <div class="cover">
                            <router-link :to="{ name: 'bookdetail', query: { book: JSON.stringify(book.BooId) } }">
                                <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="146" height="207">
                            </router-link>
                        </div>
                    </div>
                    <div class="left-side" >
                        <img :src="`/img/books/${book.BooPicture}`" class="imghight" width="40.1" height="207" >
                    </div>

                    </div>
                    <div class="mt-3 " style="text-align: center;">
                        <i class="fa fa-pencil fa-lg " data-bs-toggle="modal" data-bs-target="#editBook" @click="putEditValue(book); bookEdit = null;" style="cursor: pointer;" aria-hidden="true"></i>
                        <i class="fa fa-trash fa-lg ml-4 " data-bs-toggle="modal" data-bs-target="#deleteBook" @click="deleteBvalue = book.BooId; bookDelete = null;" style="cursor: pointer;" aria-hidden="true"></i>

                    </div>
                </div>


            </div>

        </div>
    </div>


    <!----------------------------EditBook-------------------------------------------->

    <div class="modal fade " id="editBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <img src="../../logo/mainlogoblack.svg" height="80" style="padding-left: 6%;">
                        <div class="mt-4">
                            <label for="ebookname" class="col-form-label">Book Name* / Book Category*:</label> <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="ebookname" v-model="ebookname" required autofocus autocomplete="off" placeholder="Book name" >
                            <select v-model="eselectedbookcategory" class="form-select  cartselect arder"  name="ebookcategory">
                                <option v-for="category in ebookcategory" :key="category.CatId" :value="category.CatId">{{ category.CatName }}</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="ebookpicture" class="col-form-label">Book Picture*:</label> <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            <input type="file" class="form-control" id="ebookpicture" ref="ebookpicture" @change="efileSelected = $event.target.files.length > 0" >
                            <small v-if="EBferror != null" style="color: red;">{{ EBferror }}</small>
                        </div>
                        <div class="mt-3">
                            <label for="ebookprice" class="col-form-label">Book Rent Price*: <i class="fa fa-money" aria-hidden="true"></i> &nbsp; Book Pdf Link*: <i class="fa fa-link" aria-hidden="true"></i></label>
                        </div>
                        <div class="input-group">
                            <input type="number" class="form-control" id="ebookprice" v-model="ebookprice" required autofocus autocomplete="off" placeholder="Price 5.00€" >
                            <input type="text" class="form-control" id="ebooklink" v-model="ebooklink" required autofocus autocomplete="off" placeholder="Book Link" >
                        </div>
                        <div class="mt-3">
                            <label for="ebookdescription" class="col-form-label">Book Description*:</label> <i class="fa fa-info" aria-hidden="true"></i>
                            <textarea id="ebookdescription" v-model="ebookdescription" class="md-textarea form-control" rows="2" placeholder="Book Description"></textarea>
                        </div>

                        <button type="button" v-if="ebookname == '' || ebookcategory =='' || ebookprice == '' || ebooklink == '' || ebookdescription == ''  || !eselectedbookcategory" class="btn  mt-4" style="background-color: #e0e0e0; color: #EEEEEE; cursor:default" >Edit Book</button>
                        <button type="button" v-if="ebookname != '' && ebookcategory !='' && ebookprice != '' && ebooklink != '' && ebookdescription != ''  && eselectedbookcategory" class="btn  mt-4" @click="editBook">Edit Book</button>
                    </div>
                    <div v-if="bookEdit !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{bookEdit}}</strong>
                    </div>

                </div>
            </div>
        </div>



    <!----------------------------DeleteBook-------------------------------------------->

    <div class="modal fade " id="deleteBook" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <div style="text-align: center;">
                            Are you sure you want to Delete this Book?
                        </div>


                        <button type="button" class="btn  mt-4" @click="DeleteBook">Delete Book</button>
                    </div>
                    <div v-if="bookDelete !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{bookDelete}}</strong>
                    </div>

                </div>
            </div>
        </div>




    <!----------------------------CreateBook-------------------------------------------->

    <div class="modal fade " id="createBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <img src="../../logo/mainlogoblack.svg" height="80" style="padding-left: 6%;">
                        <div class="mt-4">
                            <label for="bookname" class="col-form-label">Book Name* / Book Category*:</label> <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="bookname" v-model="bookname" required autofocus autocomplete="off" placeholder="Book name" >
                            <select v-model="selectedbookcategory" class="form-select  cartselect arder"  name="bookcategory">
                                <option v-for="category in bookcategory" :key="category.CatId" :value="category.CatId">{{ category.CatName }}</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="bookpicture" class="col-form-label">Book Picture*:</label> <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            <input type="file" class="form-control" id="bookpicture" ref="bookpicture" @change="fileSelected = $event.target.files.length > 0" >
                            <small v-if="CBferror != null" style="color: red;">{{ CBferror }}</small>
                        </div>
                        <div class="mt-3">
                            <label for="bookprice" class="col-form-label">Book Rent Price*: <i class="fa fa-money" aria-hidden="true"></i> &nbsp; Book Pdf Link*: <i class="fa fa-link" aria-hidden="true"></i></label>
                        </div>
                        <div class="input-group">
                            <input type="number" class="form-control" id="bookprice" v-model="bookprice" required autofocus autocomplete="off" placeholder="Price 5.00€" >
                            <input type="text" class="form-control" id="booklink" v-model="booklink" required autofocus autocomplete="off" placeholder="Book Link" >
                        </div>
                        <div class="mt-3">
                            <label for="bookdescription" class="col-form-label">Book Description*:</label> <i class="fa fa-info" aria-hidden="true"></i>
                            <textarea id="bookdescription" v-model="bookdescription" class="md-textarea form-control" rows="2" placeholder="Book Description"></textarea>
                        </div>

                        <button type="button" v-if="bookname == '' || bookcategory =='' || bookprice == '' || booklink == '' || bookdescription == '' || !fileSelected || !selectedbookcategory" class="btn  mt-4" style="background-color: #e0e0e0; color: #EEEEEE; cursor:default" >Create Book</button>
                        <button type="button" v-if="bookname != '' && bookcategory !='' && bookprice != '' && booklink != '' && bookdescription != '' && fileSelected && selectedbookcategory" class="btn  mt-4" @click="saveBook">Create Book</button>
                    </div>
                    <div v-if="createbookerror !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{createbookerror}}</strong>
                    </div>

                </div>
            </div>
        </div>

</template>

<script>
export default {
    name: "editbook",
    data() {
        return {
            bookname: "",
            bookpicture: "",
            bookcategory: [],
            bookprice: null,
            booklink: '',
            bookdescription: "",
            selectedbookcategory: null,
            fileSelected: false,

            deleteBvalue: null,
            editBvalue: [],

            createbookerror: null,
            books: [],
            searchQuery: "",
            searchResults: [],
            selectedCategory: "allc",
            categories: [],
            selectedCategoryBooks: null,
            CBferror: null,
            bookDelete: null,
            bookEdit: null,


            ebookId: null,
            ebookname: '',
            ebookcategory: [],
            ebookprice: null,
            ebooklink: '',
            ebookdescription: '',
            efileSelected: false,
            eselectedbookcategory: null,
            eebookpicture: null,
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
        putEditValue(book){
            this.bookEdit = null;
            this.ebookId = book.BooId;
            this.ebookname = book.BooName;
            this.ebookprice = book.BooPrice;
            this.ebooklink = book.BooLink;
            this.ebookdescription = book.BooDescription;
            this.eselectedbookcategory = book.BooCatId;
            this.eebookpicture = book.BooPicture;
            this.$refs.ebookpicture.value = '';
        },
        CreateBValue(){
            this.createbookerror = null;
            this.$refs.bookpicture.value = '';
        },
        DeleteBook(){
            console.log('delete book');
            console.log(this.deleteBvalue);
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/deleteBook', {
                    bookId: this.deleteBvalue,
                })
                .then(response => {
                    console.log('Deleted');
                    this.bookDelete = response.data;
                    this.fetchAllBooks();
                })
                .catch(function (Perror) {
                    this.bookDelete = response.message;
                });
            })
        },
        getAllCategories(){
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                axios.get('/api/getAllCategories')
                .then(response => {
                    this.categories = response.data.categories;
                    this.bookcategory = response.data.categories;
                    this.ebookcategory = response.data.categories;
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
        saveBook() {
            let file = this.$refs.bookpicture.files[0];
            if(file){
                this.createbookerror = null;
                const allowedTypes = ['image/jpeg', 'image/svg', 'image/webp', 'image/png'];

                if (allowedTypes.includes(file.type)) {
                    console.log('checking file pic');
                    console.log(file);

                    const formData = new FormData();
                    formData.append('bookpicture', file);

                    axios.post('/upload-book-pic', formData)
                    .then(response => {

                        const fileName = response.data.fileName;
                        console.log('checking file name');
                        console.log(fileName);

                        this.$axios.get('/sanctum/csrf-cookie').then(response => {
                            this.$axios.post('api/createBook', {
                                bookname: this.bookname,
                                bookcategory: this.selectedbookcategory,
                                bookprice: this.bookprice,
                                booklink: this.booklink,
                                bookdescription: this.bookdescription,
                                bookpicture: fileName,
                            })
                            .then(response => {
                                console.log('updated');
                                this.createbookerror = response.data;
                                this.bookname = '';
                                this.selectedbookcategory = '';
                                this.bookprice = '';
                                this.booklink = '';
                                this.bookdescription = '';
                                this.$refs.bookpicture.value = '';
                                this.fetchAllBooks();
                            })
                            .catch(function (Perror) {
                                this.createbookerror = response.message;
                            });
                        })
                    })
                    .catch(error => {
                        console.error('Error uploading Book picture:', error);
                    });



                } else {
                    this.Perror = 'Invalid file type. Please select a JPG, SVG, PNG, or WebP file.';
                }




            }

        },
        editBook(){
            let file = this.$refs.ebookpicture.files[0];
            if(file){
                const allowedTypes = ['image/jpeg', 'image/svg', 'image/webp', 'image/png'];

                if (allowedTypes.includes(file.type)) {
                    console.log('checking file pic');
                    console.log(file);

                    const formData = new FormData();
                    formData.append('bookpicture', file);

                    axios.post('/upload-book-pic', formData)
                    .then(response => {

                        const fileName = response.data.fileName;
                        console.log('checking file name');
                        console.log(fileName);

                        this.$axios.get('/sanctum/csrf-cookie').then(response => {
                            this.$axios.post('api/editBook', {
                                bookId: this.ebookId,
                                bookname: this.ebookname,
                                bookcategory: this.eselectedbookcategory,
                                bookprice: this.ebookprice,
                                booklink: this.ebooklink,
                                bookdescription: this.ebookdescription,
                                bookpicture: fileName,
                            })
                            .then(response => {
                                console.log('updated');
                                this.bookEdit = response.data;
                                this.fetchAllBooks();
                            })
                            .catch(function (Perror) {
                                this.bookEdit = response.message;
                            });
                        })
                    })
                    .catch(error => {
                        console.error('Error uploading Book picture:', error);
                    });



                } else {
                    this.Perror = 'Invalid file type. Please select a JPG, SVG, PNG, or WebP file.';
                }




            }else{
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/editBook', {
                        bookId: this.ebookId,
                        bookname: this.ebookname,
                        bookcategory: this.eselectedbookcategory,
                        bookprice: this.ebookprice,
                        booklink: this.ebooklink,
                        bookdescription: this.ebookdescription,
                        bookpicture: this.eebookpicture,
                    })
                    .then(response => {
                        console.log('updated');
                        this.bookEdit = response.data;
                        this.fetchAllBooks();
                    })
                    .catch(function (Perror) {
                        this.bookEdit = response.message;
                    });
                })
            }
        },
    },
}
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

/*
.cover {
    background-image: url("../../books/bookCourt.webp");
    background-size: 146px 207px;
}
*/
.adminbooks{
    width: auto;
    margin-top: 1.63%;
    margin-left: 1%;
    margin-right: 1%;
    background-color: #EEEEEE;
    border-radius: 20px;
    padding: 2%;
    box-shadow: 5px 10px #D6D6D6;
}


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
    .adminbooks{
        width: 178px;
        margin-top: 5%;
    }
}

</style>
