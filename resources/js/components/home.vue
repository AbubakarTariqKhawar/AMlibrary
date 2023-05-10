<template>
    <section id="banner_principal" class="container-fluid">
            <div class="col-12 banner ">
                <div class="container d-flex">
                    <h1 class=" text-color3">The enthusiasm for books</h1>
                </div>
                <div class="container d-flex">
                    <h2 class=" text-color3 ml-4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Never stops</h2>
                </div>
                <div class="container d-flex">
                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <router-link to="/library"><button type="button" class="btn ">Read Now</button></router-link>
                    </h2>
                </div>
            </div>
    </section>
    <section>
        <div class="container mt-4 ">
            <h3><b>Trending Books</b></h3>
        </div>
    </section>
    <section>
        <div class="container ">
            <div class="row">
                <div class="card col-12 col-md-3 mt-3 mb-3  showtext" v-for="book in books" :key="book.BooId"  >
                    <router-link :to="{ name: 'bookdetail', query: { book: JSON.stringify(book.BooId) } }">
                        <img :src="`/img/books/${book.BooPicture}`" class="card-img" alt="Book" width="90%">
                    </router-link>

                    <div class="overlay">

                        <div class="text">{{ book.BooName }}</div>

                    </div>
                </div >

            </div>
        </div>
    </section>
    <section>
        <div class="container mt-4 ">
            <h3><b>Categories</b></h3>
        </div>
    </section>
    <section class="bookA">
            <div class="component">
                <ul class="align">
                    <li>
                        <figure class='book'>

                            <!-- Front

                            <ul class='hardcover_front'>
                                <li>
                                    <div class="coverDesign yellow">
                                        <span class="ribbon">NEW</span>
                                        <h1>Horror</h1>
                                        <p>Books</p>
                                    </div>
                                </li>
                                <li></li>
                            </ul>
                            -->

                            <ul class='hardcover_front'>
                                <li>
                                    <img src="../../books/horror.webp" alt="" width="100%" height="100%">
                                </li>
                                <li></li>
                            </ul>

                            <!-- Pages -->

                            <ul class='page'>
                                <li></li>
                                <li>
                                    <a class="btn" href="/library">Read</a>
                                </li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>

                            <!-- Back -->

                            <ul class='hardcover_back'>
                                <li></li>
                                <li></li>
                            </ul>
                            <ul class='book_spine'>
                                <li></li>
                                <li></li>
                            </ul>
                            <figcaption>
                                <h2><b>Horror</b></h2>
                                <span>The enthusiasm for books..</span>
                                <p>Here you can read Best horror books ever writen and by reading you can experience horror.</p>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure class='book'>

                            <!-- Front -->

                            <ul class='hardcover_front'>
                                <li>
                                    <img src="../../books/comic.webp" alt="" width="100%" height="100%">
                                </li>
                                <li></li>
                            </ul>

                            <!-- Pages -->

                            <ul class='page'>
                                <li></li>
                                <li>
                                    <a class="btn" href="/library">Read</a>
                                </li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>

                            <!-- Back -->

                            <ul class='hardcover_back'>
                                <li></li>
                                <li></li>
                            </ul>
                            <ul class='book_spine'>
                                <li></li>
                                <li></li>
                            </ul>
                            <figcaption>
                                <h2><b>Comics</b></h2>
                                <span>The enthusiasm for books..</span>
                                <p>Here you can read Best horror books ever writen and by reading you can experience horror.</p>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure class='book'>

                        <!-- Front -->

                            <ul class='hardcover_front'>
                                <li>
                                    <img src="../../books/romentic.webp" alt="" width="100%" height="100%">
                                </li>
                                <li></li>
                            </ul>

                        <!-- Pages -->

                            <ul class='page'>
                                <li></li>
                                <li>
                                    <a class="btn" href="/library">Read</a>
                                </li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>

                        <!-- Back -->

                            <ul class='hardcover_back'>
                                <li></li>
                                <li></li>
                            </ul>
                            <ul class='book_spine'>
                                <li></li>
                                <li></li>
                            </ul>
                            <figcaption>
                                <h2><b>Romance</b></h2>
                                <span>The enthusiasm for books..</span>
                                <p>Here you can read Best horror books ever writen and by reading you can experience horror.</p>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure class='book'>

                        <!-- Front -->

                            <ul class='hardcover_front'>
                                <li>
                                    <img src="../../books/kids.webp" alt="" width="100%" height="100%">
                                </li>
                                <li></li>
                            </ul>

                        <!-- Pages -->

                            <ul class='page'>
                                <li></li>
                                <li>
                                    <a class="btn" href="/library">Read</a>
                                </li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>

                        <!-- Back -->

                            <ul class='hardcover_back'>
                                <li></li>
                                <li></li>
                            </ul>
                            <ul class='book_spine'>
                                <li></li>
                                <li></li>
                            </ul>
                            <figcaption>
                                <h2><b>Kids</b></h2>
                                <span>The enthusiasm for books..</span>
                                <p>Here you can read Best horror books ever writen and by reading you can experience horror.</p>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
    </section>

    <section>
        <div class="content-header">
            <div class="container">
                <div class="row mb-2 ">
                    <div class="col-lg-7 col-md-7 col-sm-12 mt-4">
                        <h2 class="fs24 page-header-title"><b>About Us</b></h2>
                        <p class="m-0 mb-3 fs16 page-header-desc fs20">This snippet was created to help web designers, front-end and back-end developer save time. Use it for free in your project and build your app faster, You can also download the HTML, CSS, and JS code.<br>Tags:

                        </p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 mb-1">
                        <div class="img-boxes">
                            <div class="carbon-horizontal"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <svg style="pointer-events: none" class="wave" width="100%" height="70px" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75"> <defs><clipPath id="a"> <rect class="a" width="1920" height="75"></rect> </clipPath> </defs> <g class="b"> <path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48"></path> </g> <g class="b"> <path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10"></path> </g> <g class="b"> <path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24"></path> </g> <g class="b"> <path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150"></path> </g> </svg>
        </div>

    </section>
</template>

<script>
export default {
  data() {
    return {
      books: [],
    };
  },
  mounted() {
    this.fetchBooks();
  },
  methods: {
    fetchBooks() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            axios.get('/api/gethomebook')
            .then(response => {
                this.books = response.data.books;
                console.log('checking book ');
                console.log(this.books);
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

</style>
