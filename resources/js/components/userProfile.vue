<template >
<div >
    <div class="container my-5 border rounded-5  shadow" >
   <div class="col-xl-7 mx-auto">

            <!-- Profile picture -->


                    <div class="d-flex justify-content-center shadow border-0 mt-4 mb-5 py-3 " style="width:auto">

                        <img alt="..." :src="`/img/user/${user.UsePic}`" style="height: 100px; border-radius: 50%; width: 100px;">


                    </div>






            <!-- Form -->
            <div class="mb-5">
              <h5 class="mb-0"><b>Information:</b></h5>

                <select v-model="selectedPinfo" style="margin-top: 2px; float: left; cursor: pointer;" class="form-select  cartselect arder" name="arder">
                    <option value="pinfo">Profile Info</option>
                    <option value="ainfo">Address Info</option>
                    <option value="binfo">Bank Info</option>
                </select>
            </div>


            <!----------------------------Profile Info---------------------->
            <div class="pt-4" v-if="selectedPinfo == 'pinfo'">
                <div class="row mb-5">
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="first_nameP" >First name*:</label> <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <input type="text" class="form-control" id="first_nameP" v-model="first_nameP">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="last_nameP" >Last name*:</label> <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <input type="text" class="form-control" id="last_nameP" v-model="last_nameP">
                  </div>
                </div>
              </div>
              <div class="row g-5">
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="emailP" >Email*:</label> <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input type="email" class="form-control" id="emailP" v-model="emailP">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="phone_numberP" >Phone number*:</label> <i class="fa fa-phone" aria-hidden="true"></i>
                    <input type="number" class="form-control" id="phone_numberP" v-model="phone_numberP">
                  </div>
                </div>
                <div class="col-12">
                    <label class="form-label" for="passwordP">Password*:</label> <i class="fa fa-key" aria-hidden="true"></i>


                  <div class="input-group">



                    <input type="password" v-if="showPasswordP == false"  class="form-control" id="passwordP" v-model="passwordP">

                    <input type="text" v-if="showPasswordP == true" class="form-control" id="passwordP" v-model="passwordP">

                    <button class="button" style=" border-left-style: none; border-color: #ced4da; background-color: white; border-radius: 0px 5px 5px 0px; border-style: inset;" @click="toggleShowP">
                        <span class="icon is-small is-right">
                            <i class="fa" :class="{ 'fa-eye-slash': showPasswordP, 'fa-eye': !showPasswordP }"></i>
                        </span>
                    </button>

                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="">
                    <label class="form-label" for="profilePicP" >Upload Image*:</label> <i class="fa fa-file-image-o" aria-hidden="true"></i>
                    <input type="file" class="form-control" id="profilePicP" ref="profilePicP" >
                    <small v-if="Perror != null" style="color: red;">{{ Perror }}</small>
                  </div>
                </div>

                </div>
                <div class="text-center mt-5">
                    <!--<button type="button" class="btn text-dark btn-outline-dark mr-2" style="background-color: azure;">Cancel</button>-->

                    <button type="button" v-if="first_nameP == '' || last_nameP == '' || emailP == '' || phone_numberP == '' || passwordP == '' " @click="saveInfoP" class="btn " style="background-color: #e0e0e0; color: #EEEEEE; cursor:default">Save</button>
                    <button type="button" v-if="first_nameP != '' && last_nameP != '' && emailP != '' && phone_numberP != '' && passwordP != '' " @click="saveInfoP" class="btn ">Save</button>
                </div>
                <hr class="my-10" />

            </div>





            <!----------------------------Address Info---------------------->
            <div class="pt-3" v-if="selectedPinfo == 'ainfo'">
                <div class="table-responsive">
                    <table class="table no-wrap user-table mb-0">
                        <thead>
                            <tr>
                            <th scope="col" class="border-0 text-uppercase font-medium pl-4 ">#</th>
                            <th scope="col" class="border-0 text-uppercase font-medium">Home</th>
                            <th scope="col" class="border-0 text-uppercase font-medium">Address</th>
                            <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="allAddressp" v-for="address in allAddressp" :key="address.AddId">
                                <td class="pl-4 pt-3">1</td>
                                <td><img src="../../logo/homeicon.svg"  style="height: 40px;  width: 40px;"/></td>
                                <td>
                                    <h5 class="font-medium pt-2">{{address.AddAddres}}</h5>
                                </td>

                                <td >
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle" @click="putteditaddress(address); createaddresserror = null; " data-bs-toggle="modal" data-bs-target="#editaddress"><i class="fa fa-pencil" aria-hidden="true"></i> </button>
                                    <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2" @click="deleteAdOBank = 'address'; deleteAddvalue = address.AddId; addDelete = null;" data-bs-toggle="modal" data-bs-target="#deleteAddBank"><i class="fa fa-trash"></i> </button>

                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>

            </div>




            <!----------------------------Bank Info---------------------->
            <div class="pt-3" v-if="selectedPinfo == 'binfo'">
                <div class="table-responsive">
                    <table class="table no-wrap user-table mb-0">
                    <thead>
                        <tr>
                        <th scope="col" class="border-0 text-uppercase font-medium pl-4 ">#</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Card</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Card Number</th>

                        <th scope="col" class="border-0 text-uppercase font-medium">Owner Name</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Ex Month</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Ex Year</th>
                        <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="allBankp" v-for="bank in allBankp" :key="bank.BanID">
                            <td class="pl-4 pt-4">1</td>
                            <td><img src="../../logo/cardp.png"  style="height: 40px; width: 40px;"/></td>
                            <td class="pt-4">
                                <span class="text-muted">{{ bank.BanCardNumber }}</span>
                            </td>

                            <td class="pt-4">
                                <span class="text-muted">{{ bank.BanOwenrName }}</span>
                            </td>
                            <td class="pt-4">
                                <span class="text-muted">{{ bank.BanExpireMonth }}</span>
                            </td>
                            <td class="pt-4">
                                <span class="text-muted">{{ bank.BanExpireYear }}</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle" @click="putteditbank(bank); editebankperror = null;" data-bs-toggle="modal" data-bs-target="#editbank" ><i class="fa fa-pencil" aria-hidden="true"></i> </button>
                                <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2" @click="deleteAdOBank = 'bank'; deleteAddvalue = bank.BanID; addDelete = null;"  data-bs-toggle="modal" data-bs-target="#deleteAddBank"><i class="fa fa-trash"></i> </button>

                            </td>
                        </tr>


                    </tbody>
                    </table>
                </div>

            </div>


          </div>
        </div>

</div>


    <!----------------------------EditAddress-------------------------------------------->

        <div class="modal fade " id="editaddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 2%; border: none;">
                        <img src="../../logo/mainlogoblack.svg" height="80" style="padding-left: 6%;">

                        <div class="mt-4">
                            <label for="addressp" class="col-form-label">Address*:</label> <i class="fa fa-home" aria-hidden="true"></i>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="addressp" v-model="addressp" required autofocus autocomplete="off" placeholder="Your Address" >
                        </div>

                        <button type="button" v-if="addressp == ''" class="btn  mt-4" style="background-color: #e0e0e0; color: #EEEEEE; cursor:default" >Save Address</button>
                        <button type="button" v-if="addressp != ''" class="btn  mt-4" @click="editaddressp">Save Address</button>
                    </div>
                    <div v-if="createaddresserror !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{createaddresserror}}</strong>
                    </div>

                </div>
            </div>
        </div>





    <!----------------------------EditBank-------------------------------------------->

    <div class="modal fade " id="editbank" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 2%; border: none;">
                        <img src="../../logo/mainlogoblack.svg" height="80" style="padding-left: 6%;">

                        <div class="mt-4">
                            <label for="banknumberp" class="col-form-label">Bank Number*:</label> <i class="fa fa-credit-card" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="banknumberp" v-model="banknumberp" required autofocus autocomplete="off" placeholder="ES1234567891234567891234" minlength="24" maxlength="24">
                        </div>
                        <div class="mt-3">
                            <label for="ownernamep" class="col-form-label">Owner Name*:</label> <i class="fa fa-id-card-o" aria-hidden="true"></i>
                            <input type="text" class="form-control" id="ownernamep" v-model="ownernamep" required autofocus autocomplete="off" placeholder="Owner Name" >
                        </div>
                        <div class="mt-3">
                            <label for="expiremonthp" class="col-form-label">Expire Month/Year*:</label> <i class="fa fa-clock-o" aria-hidden="true"></i>

                        </div>
                        <div class="input-group">
                            <input type="number" class="form-control" id="expiremonthp" v-model="expiremonthp" required autofocus autocomplete="off" placeholder="05" minlength="2" maxlength="2">
                            <input type="number" class="form-control" id="expireyearp" v-model="expireyearp" required autofocus autocomplete="off" placeholder="2022" minlength="4" maxlength="4">
                        </div>
                        <div class="mt-3">
                            <label for="cvvp" class="col-form-label">CVV*:</label> <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <div class="input-group">
                            <input type="password" v-if="showcvvp == false" class="form-control" id="cvvp" v-model="cvvp" required autofocus autocomplete="off" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3">
                            <input type="text" v-if="showcvvp == true" class="form-control" id="cvvp" v-model="cvvp" required autofocus autocomplete="off" placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3">

                            <button class="button" style=" border-left-style: none; border-color: #ced4da; background-color: white; border-radius: 0px 5px 5px 0px; border-style: inset;" @click="toggleShowcvvp"><span class="icon is-small is-right">
                                <i class="fa" :class="{ 'fa-eye-slash': showcvvp, 'fa-eye': !showcvvp }"></i>
                                </span>
                            </button>
                        </div>
                        <button type="button" v-if="banknumberp == '' || ownernamep == '' || expiremonthp == null || expireyearp == null || cvvp == null" class="btn  mt-4" style="background-color: #e0e0e0; color: #EEEEEE; cursor:default" >Save Bank</button>
                        <button type="button" v-if="banknumberp != '' && ownernamep != '' && expiremonthp != null && expireyearp != null && cvvp != null" class="btn  mt-4" @click="editBankp">Save Bank</button>
                    </div>

                    <div v-if="editebankperror !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{editebankperror}}</strong>
                    </div>

                </div>
            </div>
        </div>


        <!----------------------------DeleteAddress-------------------------------------------->

        <div class="modal fade " id="deleteAddBank" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <div style="text-align: center;">
                            Are you sure you want to Delete?
                        </div>


                        <button type="button" class="btn  mt-4" @click="deleteAdBan">Delete</button>
                    </div>
                    <div v-if="addDelete != null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{addDelete}}</strong>
                    </div>

                </div>
            </div>
        </div>


</template>

    <script>
    export default {
        name: "userProfile",
        data() {
            return {
                showPasswordP: false,
                first_nameP: '',
                last_nameP: '',
                emailP: '',
                phone_numberP: '',
                passwordP: '',
                profilePicP: '',
                logedin: false,
                user: [],
                UseId: null,
                Perror: null,
                selectedPinfo: 'pinfo',
                allAddressp: [],
                allBankp: [],

                //delete error
                addDelete: null,

                //delete value
                deleteAddvalue: null,
                deleteAdOBank: null,

                //EDIT ADDRESS
                addresspid: '',
                addressp: '',
                createaddresserror: null,

                //edit bank
                bankidp: null,
                bankuseridp: null,
                banknumberp: '',
                ownernamep: '',
                expiremonthp: null,
                expireyearp: null,
                cvvp: null,
                editebankperror: null,
                showcvvp: false,


            };
        },
        mounted(){
            this.logedin = window.Laravel.isLoggedin;
            if(window.Laravel.isLoggedin){
                this.UseId = window.Laravel.user.UseId;
                this.user = window.Laravel.user;
                this.first_nameP = window.Laravel.user.name;
                this.last_nameP = window.Laravel.user.UseSureName;
                this.emailP = window.Laravel.user.email;
                this.phone_numberP = window.Laravel.user.UsePhone;
                this.profilePicP = window.Laravel.user.UsePic;
                console.log(this.user);
                this.pickallAddressp();
                this.pickallBankp();
            };

        },
        methods: {
            deleteAdBan(){
                    if(this.deleteAdOBank == 'address'){
                        this.$axios.get('/sanctum/csrf-cookie').then(response => {
                            console.log('im in delete adddesss');
                            console.log(this.deleteAddvalue);
                            this.$axios.post('api/deletemyaddress', {
                                id: this.deleteAddvalue,
                            })
                            .then(response => {
                                console.log('Deleted');
                                this.addDelete = response.data;
                                this.pickallAddressp();
                                this.pickallBankp();
                            })

                        })
                    }else if(this.deleteAdOBank == 'bank'){
                        this.$axios.get('/sanctum/csrf-cookie').then(response => {
                            this.$axios.post('api/deletebank', {
                                id: this.deleteAddvalue,
                            })
                            .then(response => {
                                console.log('Deleted');
                                this.addDelete = response.data;
                                this.pickallAddressp();
                                this.pickallBankp();
                            })
                        })
                    }

            },
            editBankp(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/updatebankinfo', {
                        bankId: this.bankidp,
                        bankuserId: this.bankuseridp,
                        banknumber: this.banknumberp,
                        bankowner: this.ownernamep,
                        bankmonth: this.expiremonthp,
                        bankyear: this.expireyearp,
                        bankcvv: this.cvvp,
                    })
                    .then(response => {
                        console.log('updated address');
                        this.editebankperror = response.data;
                        this.bankidp = null;
                        this.bankuseridp = null;
                        this.banknumberp = '';
                        this.ownernamep = '';
                        this.expiremonthp = null;
                        this.expireyearp = null;
                        this.cvvp = null;
                        this.pickallBankp();
                    })
                })
            },
            editaddressp(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/updateaddress', {
                        addressId: this.addresspid,
                        address: this.addressp,
                    })
                    .then(response => {
                        console.log('updated address');
                        this.createaddresserror = response.data;
                        this.addresspid = null;
                        this.addressp = '';
                        this.pickallAddressp();
                    })
                })

            },
            putteditaddress(address){
                this.addressp = address.AddAddres;
                this.addresspid = address.AddId;

            },
            putteditbank(bank){
                this.bankidp = bank.BanID;
                this.bankuseridp = bank.BanUseId;
                this.banknumberp = bank.BanCardNumber;
                this.ownernamep = bank.BanOwenrName;
                this.expiremonthp = bank.BanExpireMonth;
                this.expireyearp = bank.BanExpireYear;
                //this.cvvp = bank.CVV;
            },
            pickallBankp(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/pickallBankp', {
                        userId: this.UseId,
                    })
                    .then(response => {
                        console.log('pick all bank');
                        this.allBankp = response.data.bank;
                        console.log(this.allBankp);
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
                        this.allAddressp = response.data.address;
                        console.log(this.allAddressp);
                    })
                })

            },
            toggleShowcvvp() {
                this.showcvvp = !this.showcvvp;
            },
            toggleShowP() {
                this.showPasswordP = !this.showPasswordP;
            },
            validateEmail(email) {
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                    return true;
                } else {
                    this.Perror = "Email invalid!";
                }
            },
            saveInfoP() {
                let file = this.$refs.profilePicP.files[0];
                if(file){
                    const allowedTypes = ['image/jpeg', 'image/svg', 'image/webp', 'image/png'];

                    if (allowedTypes.includes(file.type)) {
                        console.log('checking file pic');
                        console.log(file);

                        const formData = new FormData();
                        formData.append('profilePic', file);
                        formData.append('UseId', this.UseId);

                        axios.post('/upload-profile-pic', formData)
                        .then(response => {

                            const fileName = response.data.fileName;
                            console.log('checking file name');
                            console.log(fileName);

                            if(this.validateEmail(this.emailP) == true) {
                                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                                    this.$axios.post('api/updateUser', {
                                        userId: this.UseId,
                                        name: this.first_nameP,
                                        surname: this.last_nameP,
                                        email: this.emailP,
                                        phone: this.phone_numberP,
                                        password: this.passwordP,
                                        profilePic: fileName,
                                    })
                                    .then(response => {
                                        console.log('updated');
                                        let userServer = response.data.user[0];

                                        window.Laravel.user.UsePhone = userServer.UsePhone;
                                        window.Laravel.user.UsePic = userServer.UsePic;
                                        window.Laravel.user.UseSureName = userServer.UseSureName;
                                        window.Laravel.user.email = userServer.email;
                                        window.Laravel.user.name = userServer.name;
                                        window.Laravel.user.updated_at = userServer.updated_at;

                                        window.location.reload();
                                    })
                                    .catch(function (Perror) {
                                        console.error(Perror);
                                    });
                                })
                            }
                        })
                        .catch(error => {
                            console.error('Error uploading profile picture:', error);
                        });



                    } else {
                        this.Perror = 'Invalid file type. Please select a JPG, SVG, PNG, or WebP file.';
                    }




                }else{
                    if(this.validateEmail(this.emailP) == true) {
                        this.$axios.get('/sanctum/csrf-cookie').then(response => {
                            this.$axios.post('api/updateUser', {
                                userId: this.UseId,
                                name: this.first_nameP,
                                surname: this.last_nameP,
                                email: this.emailP,
                                phone: this.phone_numberP,
                                password: this.passwordP,
                                profilePic: this.profilePicP,
                            })
                            .then(response => {
                                console.log('updated');
                                let userServer = response.data.user[0];

                                window.Laravel.user.UsePhone = userServer.UsePhone;
                                window.Laravel.user.UsePic = userServer.UsePic;
                                window.Laravel.user.UseSureName = userServer.UseSureName;
                                window.Laravel.user.email = userServer.email;
                                window.Laravel.user.name = userServer.name;
                                window.Laravel.user.updated_at = userServer.updated_at;

                                window.location.reload();
                            })
                            .catch(function (Perror) {
                                console.error(Perror);
                            });
                        })
                    }
                }

            },
        },
    }

    </script>

    <style scoped>

td {  text-align: center;}
    th {  text-align: center; }

    .ms-auto {
  position: relative;
  overflow: hidden;
}
.ms-auto input {
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}
    </style>
