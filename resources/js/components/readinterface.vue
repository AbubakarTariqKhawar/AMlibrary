<template>
    <!--
        https://publuu.com
        yumpu.com
        issuu.com
        https://monkeypen.com/pages/free-stories-for-kids
        https://www.booksfree.org/falling-in-love-again-stories-of-love-and-romance-by-ruskin-bond-pdf/

    <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;max-width:100%;" data-page-width="453" data-page-height="240"><iframe style="position:absolute;top:0;left:0;width:100%;height:90%;"   src="https://www.yumpu.com/xx/embed/view/hCsNE7JAgviZlrcL" frameborder="0" allowfullscreen="true"  allowtransparency="true"></iframe><br><a href="https://www.yumpu.com/xx/document/view/67966052/abubakartariq-mohammedfariat-memoria-p4" title="AbubakarTariq_MohammedFariat_memoria_P4" target="_blank">AbubakarTariq_MohammedFariat_memoria_P4</a></div>
<iframe src="/img/pdf/as.pdf" width="100%" height="880px" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen></iframe>
-->

<!--
<iframe src="https://publuu.com/flip-book/133444/341596/page/2?embed" width="100%" height="800" scrolling="no" frameborder="0" allowfullscreen="" class="publuuflip"></iframe>
-->
<div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;max-width:100%;" data-page-width="486" data-page-height="640">
    <iframe style="position:absolute;top:0;left:0;width:100%;height:100%;"   :src="`${book.BooLink}`" frameborder="0" allowfullscreen="true"  allowtransparency="true"></iframe><br>
</div>

</template>

  <script>



  export default {
    name: "readinterface",
    data() {
        return {
        book: [],
        link: [],
        };
    },
    mounted() {
            const bookParam = this.$route.query.book;
            if (bookParam) {
                this.book = JSON.parse(bookParam);
                console.log('received book');
                console.log(this.book);
                this.fetchLink();
            }

    },

    methods: {
        fetchLink() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/getBookLink', {
                    bookId: this.book,
                })
                .then(response => {
                    this.book = response.data.book[0];
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
  /* add any custom styles here */
  </style>
