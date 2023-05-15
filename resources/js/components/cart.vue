<template>
    <section class=" h-custom " style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card  ">
          <div class="card-body p-4">

            <div class="row ">

              <div class="col-lg-7 sticky">
                <h4 class="mb-3"><a href="/library" class="text-body">
                    <i class="fa fa-arrow-left me-2"></i>Continue shopping</a></h4>
                <hr>

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <h4 class="mb-1"><b>Shopping Cart</b> <i class="fa fa-shopping-cart" aria-hidden="true"></i></h4>
                    <p class="mb-0">You have <b>{{ itemtotal }}</b> items in your cart.</p>
                  </div>
                 <!--<div>
                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                        class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                  </div>-->
                </div>
                <hr>

                <div class="card mb-3 shadow" style="border-radius: 20px;" v-if="allbooks" v-for="book in allbooks" :key="book.BooId">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div class="book  justify-content-center mr-5 ">
                          <div class="front ">
                              <div class="cover">

                                      <img :src="`/img/books/${book.BooPicture}`" width=" 64" height="90.78" >
                              </div>
                          </div>
                          <div class="left-side" >
                            <img :src="`/img/books/${book.BooPicture}`" width="25 " height="90.78" >
                          </div>
                         </div>
                        <div class="ms-3">
                          <h5>{{ book.BooName }}</h5>
                          <p class="small mb-0">#AMLibrary</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">1</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">{{ book.BooPrice }}€</h5>
                        </div>
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2" @click="bookidDelete = book.BooId" data-bs-toggle="modal" data-bs-target="#deleteBookcart"><i class="fa fa-trash"></i> </button>
                      </div>
                    </div>
                  </div>
                </div>


              </div>

              <div class="col-lg-5">

                <div class="card  text-white rounded-3" style="background-color: #212121;">
                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h4 class="mb-0">Card details</h4>

                    </div>



                        <div class="row mb-4 " v-if="userAllCardsH" style="padding-left: 16px; padding-right: 16px; ">
                            <label class="form-label" for="typeText">Your Card</label>

                            <div class="form-outline form-white mb-4 col-md-8" >

                                <select v-model="selectedbankCard" class="form-control form-control-lg" style="cursor: pointer;" >
                                    <option v-for="bank in userAllCards" :key="bank.BanID" :value="bank.BanID">{{ bank.BanCardNumber }}</option>
                                </select>

                            </div>
                            <div class="form-white mb-4 ml-0 col-md-4 " >
                                <button class="btn btn-block "  data-bs-toggle="modal" data-bs-target="#createbankc" @click="editebankperrorc = null" style="min-height: calc(1.5em + 1rem + calc(var(--bs-border-width) * 2));height: calc(2.875rem + 2px);    ">Add card</button>
                            </div>
                        </div>





                        <div v-if="!userAllCardsH" class="mb-5">
                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="incardName">Cardholder's Name</label>
                                <input type="text" id="incardName" v-model="incardName" class="form-control form-control-lg"  placeholder="Cardholder's Name" />

                            </div>

                            <div class="form-outline form-white mb-4">
                                <label class="form-label" for="incardNumb">Card Number</label>
                                <input type="text" id="incardNumb" v-model="incardNumb" class="form-control form-control-lg" placeholder="ES12 1234 5678 9012 3457" minlength="1924" maxlength="24" />

                            </div>

                            <label class="form-label" for="typeExp">MM/YYYY / CVV</label>
                            <div class="input-group mb-4" >
                                <input type="number" id="incardMon" v-model="incardMon" class="form-control form-control-lg" placeholder="05"  minlength="2" maxlength="2" />
                                <input type="number" id="incardYea" v-model="incardYea" class="form-control form-control-lg mx-1" placeholder="2023"  minlength="4" maxlength="4" />
                                <input type="password" id="incardCvv" v-model="incardCvv" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3" />
                            </div>

                        </div>


                        <div class="d-flex justify-content-between align-items-center mb-4">
                          <h4 class="mb-0">Address details</h4>

                        </div>


                        <div class="row mb-4" v-if="userAllAddressH"  style="padding-left: 16px; padding-right: 16px; ">
                            <label class="form-label" for="addresscartd">Your Address</label>
                            <div class="form-outline form-white mb-4 col-md-8" >

                                <select v-model="selectedaddresCard" class="form-control form-control-lg" style="cursor: pointer;"  >
                                    <option v-for="address in userAllAddress" :key="address.AddId" :value="address.AddId">{{ address.AddAddres }}</option>
                                </select>

                            </div>
                            <div class="form-white mb-4 ml-0 col-md-4 " >
                                <button class="btn" data-bs-toggle="modal" data-bs-target="#createaddressc" @click="createaddresserrorc = null" style="min-height: calc(1.5em + 1rem + calc(var(--bs-border-width) * 2));height: calc(2.875rem + 2px);     ">Add address</button>
                            </div>
                        </div>


                        <div v-if="!userAllAddressH" class="form-outline form-white mb-4">
                            <label class="form-label" for="inadddressc">Address</label>
                            <input type="text" id="inadddressc" v-model="inadddressc" class="form-control form-control-lg"  >

                        </div>




                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">{{ itemSubtotalprice }}€</p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">{{ shippingprice }}€</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total</p>
                      <p class="mb-2">{{ itemtotalprice }}€</p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg">
                      <div class="d-flex justify-content-between" @click="checkout">
                        <span>{{ itemtotalprice }}€</span>
                        <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                      </div>
                    </button>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

        <!----------------------------DeleteBook From cart-------------------------------------------->

        <div class="modal fade " id="deleteBookcart" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <div style="text-align: center;">
                            Are you sure you want to Delete this book?
                        </div>


                        <button type="button" class="btn  mt-4" @click="deleteBookFCart">Delete</button>
                    </div>
                    <div v-if="userRDelete != null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{userRDelete}}</strong>
                    </div>

                </div>
            </div>
        </div>


        <!----------------------------Your order have been created-------------------------------------------->

        <div class="modal fade " id="ordersucceful" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <div style="text-align: center;">
                            Your order have been created successfully.
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <!----------------------------CreateAddress-------------------------------------------->

        <div class="modal fade " id="createaddressc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 2%; border: none;">
                        <img src="../../logo/mainlogoblack.svg" height="80" style="padding-left: 6%;">

                        <div class="mt-4">
                            <label for="addressc" class="col-form-label">Address*:</label> <i class="fa fa-home" aria-hidden="true"></i>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="addressc" v-model="addressc" required autofocus autocomplete="off" placeholder="Your Address" >
                        </div>

                        <button type="button" v-if="addressc == ''" class="btn  mt-4" style="background-color: #e0e0e0; color: #EEEEEE; cursor:default" >Save Address</button>
                        <button type="button" v-if="addressc != ''" class="btn  mt-4" @click="editaddressc">Save Address</button>
                    </div>
                    <div v-if="createaddresserrorc !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{createaddresserrorc}}</strong>
                    </div>

                </div>
            </div>
        </div>


        <!----------------------------Create Bank-------------------------------------------->

        <div class="modal fade " id="createbankc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 2%; border: none;">
                        <img src="../../logo/mainlogoblack.svg" height="80" style="padding-left: 6%;">

                        <div class="mt-4">
                            <label for="banknumberc" class="col-form-label">Bank Number*:</label> <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="banknumberc" v-model="banknumberc" required autofocus autocomplete="off" placeholder="ES1234567891234567891234" minlength="24" maxlength="24">
                        </div>
                        <div class="mt-3">
                            <label for="ownernamec" class="col-form-label">Owner Name*:</label> <i class="fa fa-id-card-o" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="ownernamec" v-model="ownernamec" required autofocus autocomplete="off" placeholder="Owner Name" >
                        </div>
                        <div class="mt-3">
                            <label for="expiremonthc" class="col-form-label">Expire Month/Year*:</label> <i class="fa fa-clock-o" aria-hidden="true"></i>

                        </div>
                        <div class="input-group">
                            <input type="number" class="form-control" id="expiremonthc" v-model="expiremonthc" required autofocus autocomplete="off" placeholder="05" minlength="2" maxlength="2">
                            <input type="number" class="form-control" id="expireyearc" v-model="expireyearc" required autofocus autocomplete="off" placeholder="2022" minlength="4" maxlength="4">
                        </div>
                        <div class="mt-3">
                            <label for="cvvc" class="col-form-label">CVV*:</label> <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <div class="input-group">
                            <input type="password" v-if="showcvvc == false" class="form-control" id="cvvc" v-model="cvvc" required autofocus autocomplete="off" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3">
                            <input type="text" v-if="showcvvc == true" class="form-control" id="cvvc" v-model="cvvc" required autofocus autocomplete="off" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3">

                            <button class="button" style=" border-left-style: none; border-color: #ced4da; background-color: white; border-radius: 0px 5px 5px 0px; border-style: inset;" @click="toggleShowcvvc"><span class="icon is-small is-right">
                                <i class="fa" :class="{ 'fa-eye-slash': showcvvc, 'fa-eye': !showcvvc }"></i>
                                </span>
                            </button>
                        </div>
                        <button type="button" v-if="banknumberc == '' || ownernamec == '' || expiremonthc == null || expireyearc == null || cvvc == null" class="btn  mt-4" style="background-color: #e0e0e0; color: #EEEEEE; cursor:default" >Save Bank</button>
                        <button type="button" v-if="banknumberc != '' && ownernamec != '' && expiremonthc != null && expireyearc != null && cvvc != null" class="btn  mt-4" @click="editBankc">Save Bank</button>
                    </div>

                    <div v-if="editebankperrorc !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{editebankperrorc}}</strong>
                    </div>

                </div>
            </div>
        </div>



</template>

<script>
export default {
    name: "cart",
    data() {
            return {
                UseId: null,
                logedin: false,
                allbooks: [],
                itemtotal: null,
                itemSubtotalprice: null,
                itemtotalprice: null,
                shippingprice: 5,
                userAllCards: [],
                userAllCardsH: [],
                userAllAddressH: [],
                userAllAddress: [],


                lastbank: null,
                lastaddress: null,


                //create new bank
                banknumberc: '',
                ownernamec: '',
                expiremonthc: null,
                expireyearc: null,
                cvvc: null,
                showcvvc: false,
                editebankperrorc: null,

                //create new address
                addressc: '',
                createaddresserrorc: null,


                //create bank default
                incardName: null,
                incardNumb: null,
                incardMon: null,
                incardYea: null,
                incardCvv: null,


                //create addres default
                inadddressc: null,


                //delete book cart
                bookidDelete: null,


                //bank selected
                selectedbankid: null,

                //addres selected
                selectedaddresid: null,

            };
        },
        watch: {
            selectedbankCard(newValue) {
                this.selectedbankid = newValue;
            },
            selectedaddresCard(newValue){
                this.selectedaddresid = newValue;
            },
        },
        mounted(){
            this.logedin = window.Laravel.isLoggedin;
            if(window.Laravel.isLoggedin){
                this.UseId = window.Laravel.user.UseId;
                this.pickbooksLocal();
                this.pickallusercard();
                this.pickallAddressp();
            };

        },
        methods: {
            createdefaultbank(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/createbankinfo', {
                        bankuserId: this.UseId,
                        banknumber: this.incardNumb,
                        bankowner: this.incardName,
                        bankmonth: this.incardMon,
                        bankyear: this.incardYea,
                        bankcvv: this.incardCvv,
                    })
                })

            },
            createdefaultaddress(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/createaddress', {
                        userid: this.UseId,
                        address: this.inadddressc,
                    })
                })

            },
            checkout(){
                this.lastbank = null;
                this.lastaddress = null;

                ////////////////have select
                    if(this.userAllCardsH != null && this.userAllAddressH != null){
                        console.log('seleted card id');
                        console.log(this.selectedbankCard);
                        console.log('seleted address id');
                        console.log(this.selectedaddresCard);


                        this.$axios.post('api/rentbookorder', {
                            rentuserId: this.UseId,
                            rentaddId: this.selectedaddresCard,
                            paidPrice: this.itemtotalprice,
                            RenPaid: 1,
                            BooRecived: 1,
                        })
                        .then(response => {
                            console.log('create rent');
                            console.log(response.data);

                            this.$axios.get('api/getlastRentId', {})
                            .then(response => {
                                console.log('last rent');
                                console.log(response.data.rent);
                                let lastRentId = response.data.rent;

                                let books = JSON.parse(localStorage.getItem('books'));

                                for(let book of books){
                                    this.$axios.post('api/rentdetailorder', {
                                        rentId: lastRentId,
                                        bookId: book.BooId,
                                        cantatity: 1,
                                        bookprice: book.BooPrice
                                    })
                                    .then(response => {
                                        console.log('added rent detail');
                                        console.log(response.data);


                                    })
                                }

                                localStorage.removeItem('books');
                                const modal = new bootstrap.Modal(document.getElementById('ordersucceful'));
                                modal.show();


                                setTimeout(() => {
                                    window.location.href = '/userBooks';
                                }, 6000);


                            })

                        })



                    }

                    ///////////dont have select
                    if(this.userAllCardsH == null && this.userAllAddressH == null){

                        //this.createdefaultaddress();
                        this.createdefaultbank();

                        this.$axios.get('/sanctum/csrf-cookie').then(response => {
                            this.$axios.post('api/createaddress', {
                                userid: this.UseId,
                                address: this.inadddressc,
                            })
                            .then(response => {
                                this.$axios.get('api/getlastaddressId', {})
                                .then(response => {
                                    console.log('last address');
                                    console.log(response.data.address);
                                    let lasttadID = response.data.address;

                                    console.log('checking last address ');
                                    console.log(lasttadID);

                                    this.$axios.post('api/rentbookorder', {
                                        rentuserId: this.UseId,
                                        rentaddId: lasttadID,
                                        paidPrice: this.itemtotalprice,
                                        RenPaid: 1,
                                        BooRecived: 1,
                                    })
                                    .then(response => {
                                        console.log('create rent');
                                        console.log(response.data);

                                        this.$axios.get('api/getlastRentId', {})
                                        .then(response => {
                                            console.log('last rent');
                                            console.log(response.data.rent);
                                            let lastRentId = response.data.rent;

                                            let books = JSON.parse(localStorage.getItem('books'));

                                            for(let book of books){
                                                this.$axios.post('api/rentdetailorder', {
                                                    rentId: lastRentId,
                                                    bookId: book.BooId,
                                                    cantatity: 1,
                                                    bookprice: book.BooPrice
                                                })
                                                .then(response => {
                                                    console.log('added rent detail');
                                                    console.log(response.data);
                                                })
                                            }


                                        })
                                    })

                                })

                            })
                        })






                    }

                    ///////// select bank not address
                    if(this.userAllCardsH != null && this.userAllAddressH == null){
                        //this.createdefaultaddress();
                        console.log('seleted card id');
                        console.log(this.selectedbankCard);

                        this.$axios.get('/sanctum/csrf-cookie').then(response => {
                            this.$axios.post('api/createaddress', {
                                userid: this.UseId,
                                address: this.inadddressc,
                            })
                            .then(response => {
                                this.$axios.get('api/getlastaddressId', {})
                                .then(response => {
                                    console.log('last address');
                                    console.log(response.data.address);
                                    let lasttadID = response.data.address;

                                    console.log('checking last address ');
                                    console.log(lasttadID);

                                    this.$axios.post('api/rentbookorder', {
                                        rentuserId: this.UseId,
                                        rentaddId: lasttadID,
                                        paidPrice: this.itemtotalprice,
                                        RenPaid: 1,
                                        BooRecived: 1,
                                    })
                                    .then(response => {
                                        console.log('create rent');
                                        console.log(response.data);

                                        this.$axios.get('api/getlastRentId', {})
                                        .then(response => {
                                            console.log('last rent');
                                            console.log(response.data.rent);
                                            let lastRentId = response.data.rent;

                                            let books = JSON.parse(localStorage.getItem('books'));

                                            for(let book of books){
                                                this.$axios.post('api/rentdetailorder', {
                                                    rentId: lastRentId,
                                                    bookId: book.BooId,
                                                    cantatity: 1,
                                                    bookprice: book.BooPrice
                                                })
                                                .then(response => {
                                                    console.log('added rent detail');
                                                    console.log(response.data);
                                                })
                                            }


                                        })
                                    })

                                })

                            })
                        })






                    }

                    ///////// select addres not bank
                    if(this.userAllCardsH == null && this.userAllAddressH != null){
                        this.createdefaultbank();
                        console.log('seleted address id');
                        console.log(this.selectedaddresCard);

                        this.$axios.post('api/rentbookorder', {
                            rentuserId: this.UseId,
                            rentaddId: this.selectedaddresCard,
                            paidPrice: this.itemtotalprice,
                            RenPaid: 1,
                            BooRecived: 1,
                        })
                        .then(response => {
                            console.log('create rent');
                            console.log(response.data);

                            this.$axios.get('api/getlastRentId', {})
                            .then(response => {
                                console.log('last rent');
                                console.log(response.data.rent);
                                let lastRentId = response.data.rent;

                                let books = JSON.parse(localStorage.getItem('books'));

                                for(let book of books){
                                    this.$axios.post('api/rentdetailorder', {
                                        rentId: lastRentId,
                                        bookId: book.BooId,
                                        cantatity: 1,
                                        bookprice: book.BooPrice
                                    })
                                    .then(response => {
                                        console.log('added rent detail');
                                        console.log(response.data);
                                    })
                                }


                            })
                        })

                    }





            },
            editBankc(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/createbankinfo', {
                        bankuserId: this.UseId,
                        banknumber: this.banknumberc,
                        bankowner: this.ownernamec,
                        bankmonth: this.expiremonthc,
                        bankyear: this.expireyearc,
                        bankcvv: this.cvvc,
                    })
                    .then(response => {
                        console.log('updated address');
                        this.editebankperrorc = response.data;
                        this.banknumberc = '',
                        this.ownernamec = '',
                        this.expiremonthc = null,
                        this.expireyearc = null,
                        this.cvvc = null,
                        this.pickallusercard();
                    })
                })
            },
            editaddressc(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/createaddress', {
                        userid: this.UseId,
                        address: this.addressc,
                    })
                    .then(response => {
                        console.log('create address');
                        this.createaddresserrorc = response.data;
                        this.addressc = '';
                        this.pickallAddressp();
                    })
                })
            },
            toggleShowcvvc() {
                this.showcvvc = !this.showcvvc;
            },
            pickallusercard(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/pickallBankp', {
                        userId: this.UseId,
                    })
                    .then(response => {
                        console.log('pick all bank');
                        this.userAllCards = response.data.bank;
                        this.userAllCardsH = response.data.bank[0];
                        console.log(this.userAllCards);
                    })
                })
            },
            pickallAddressp(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/pickalladdress', {
                        userId: this.UseId,
                    })
                    .then(response => {
                        console.log('pick all address');
                        this.userAllAddress = response.data.address;
                        this.userAllAddressH = response.data.address[0];
                        console.log(this.userAllAddress);
                    })
                })

            },
            deleteBookFCart(){
                let bookId = this.bookidDelete;
                let books = JSON.parse(localStorage.getItem('books'));

                let index = books.findIndex(book => book.BooId === bookId);

                if (index !== -1) {
                    books.splice(index, 1);
                    localStorage.setItem('books', JSON.stringify(books));
                    this.pickbooksLocal();
                }
            },
            pickbooksLocal(){
                // Remove the "book" value from local storage
                //localStorage.removeItem('books');

                let books = JSON.parse(localStorage.getItem('books'));
                let total = 0;

                if (books) {

                    this.allbooks = books;
                    this.itemtotal = books.length;
                    total = books.reduce((sum, book) => sum + Number(book.BooPrice), 0);
                }
                this.itemSubtotalprice = total;
                this.itemtotalprice = this.itemSubtotalprice + this.shippingprice;
            },

        },
}
</script>

<style scoped>

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
