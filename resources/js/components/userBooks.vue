<template>
    <div class="container  my-5 border rounded-5  shadow py-3">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h3 class=""><b>My Books</b></h3>

                    <select v-model="selectedMyBook" style="margin-top: 2px; float: left; cursor: pointer;" class="form-select  cartselect arder" name="arder">
                        <option value="0">Rented Books</option>
                        <option value="1">Returned Books</option>
                    </select>
              </div>

              <hr style="background-color: black;">
              <div class="table-responsive">
                  <table class="table no-wrap user-table mb-0">
                    <thead>
                      <tr>

                        <th scope="col" class="border-0 text-uppercase font-medium">Book</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Name</th>

                        <th scope="col" class="border-0 text-uppercase font-medium">Address</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Renting Date</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Return Date</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Prize</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">State</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr v-if="allorders" v-for="order in allorders" :key="order.RedId">

                        <td class="py-4 pl-5">
                                <div class="book  justify-content-center mr-5 ">
                                    <div class="front ">
                                        <div class="cover">

                                                <img :src="`/img/books/${order.BooPicture}`" width=" 64" height="90.78" >
                                        </div>
                                    </div>
                                    <div class="left-side" >
                                        <img :src="`/img/books/${order.BooPicture}`" width="25 " height="90.78" >
                                    </div>
                                </div>
                        </td>
                        <td class="py-5">
                            <h5 class="font-medium ">{{ order.BooName }}</h5>

                        </td>

                        <td class="py-5">
                            <span class="text-muted ">{{ order.AddAddres }}</span>

                        </td>
                        <td class="py-5">
                            <span class="text-muted ">{{ order.RedCreatedDate }}</span>
                        </td>
                        <td class="py-5">
                            <span class="text-muted ">{{ order.RedReturnedDate }}</span>
                        </td>
                        <td class="py-5">
                            <h5 class="font-medium py-2">{{ order.RedPrice }}€</h5>
                        </td>
                        <td class="py-5" >

                        <button type="button" class="btn " v-if="order.RedReturned == 0" @click="returnBook(order.RedId)">Return Now</button>
                        <button type="button" class="btn " v-if="order.RedReturned != 0" disabled>Returned</button>
                        </td>
                    </tr>






                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  </div>


        <!----------------------------Booked returned -------------------------------------------->

        <div class="modal fade " id="returnedBook" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <div style="text-align: center;">
                            Book have been returned successfully!
                        </div>

                    </div>

                </div>
            </div>
        </div>


   </template>

      <script>
      export default {
        name: "userBooks",
        data() {
            return {

                selectedMyBook: 0,
                UseId: null,
                logedin: false,

                //All order
                allorders: [],


            };
        },
        watch: {
            selectedMyBook(newValue) {
                this.getrentedBookByS(newValue);
            },
        },
        mounted(){
            this.logedin = window.Laravel.isLoggedin;
            if(window.Laravel.isLoggedin){
                this.UseId = window.Laravel.user.UseId;

                this.getrentedBookByS(this.selectedMyBook);
            };

        },
        methods: {
            returnBook(orderId){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/updateRentDetail', {
                        rentId: orderId,
                    })
                    .then(response => {
                        console.log('book returned');
                        console.log(response.data);

                        this.$axios.post('api/updateReturnPrice', {
                            rentId: orderId,
                        })
                        .then(response => {
                            console.log('book returned Price');
                            console.log(response.data);

                            this.getrentedBookByS(this.selectedMyBook);

                            const modal = new bootstrap.Modal(document.getElementById('returnedBook'));
                            modal.show();

                        })

                    })

                })

            },
            getrentedBookByS(select){
                console.log('checking select value');
                console.log(select);

                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/getrentedBookByS', {
                        userid: this.UseId,
                        return: select,
                    })
                    .then(response => {
                        this.allorders = response.data.orders;
                        console.log('checking orders');
                        console.log(this.allorders);
                    })

                })

            },

        },
      }

      </script>

      <style scoped>
      td {  text-align: center;}
      th {  text-align: center; }

      .h-custom {
height: 100% !important;
}

.sticky {

   height: 93vh;

    overflow: auto;
}

@media only screen and (max-width: 600px) {
    .sticky {

height: 62vh;

 overflow: auto;
}
}
.searchabu {
    float: left;
    margin-left: 1%;
    margin-top: 3px;
    width: 30%;
}






.container .book {
  position: relative;
  display: block;
  width:64px;
  height:90.78px;

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
  width:25px;
  height:90.78px;
}

.container .left-side{
  width: 10px;
    left: -5px;
  height:90.78px;
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
