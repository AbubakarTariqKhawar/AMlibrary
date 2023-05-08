<template>
    <div class="container my-5 border rounded-5  shadow" >
   <div class="col-xl-7 mx-auto">

            <!-- Profile picture -->


                    <div class="d-flex justify-content-center shadow border-0 mt-4 mb-5 py-3 " style="width:auto">

                        <img alt="..." src="../../logo/icons8-user-100.png">


                    </div>






            <!-- Form -->
            <div class="mb-5">
              <h5 class="mb-0">Contact Information <i class="fa fa-user-o" aria-hidden="true"></i></h5>
            </div>

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
                    <input type="tel" class="form-control" id="phone_numberP" v-model="phone_numberP">
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
                    <input type="file" class="form-control" id="profilePicP" >
                  </div>
                </div>
                <!--
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="city">City</label>
                    <input type="text" class="form-control" id="city">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="">
                    <label class="form-label" for="country">Country</label>
                    <input type="text" class="form-control" id="Country">
                  </div>
                </div>



                <div class="col-md-2">
                  <div class="">
                    <label class="form-label" for="zip">ZIP</label>
                    <input type="tel" class="form-control" id="zip">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="check_primary_address" id="check_primary_address">
                    <label class="form-check-label" for="check_primary_address">
                      Make this my default address
                    </label>
                  </div>
                </div>
-->

              </div>
              <div class="text-center mt-5">
                <!--<button type="button" class="btn text-dark btn-outline-dark mr-2" style="background-color: azure;">Cancel</button>-->
                <button type="button" class="btn ">Save</button>
              </div>
            <hr class="my-10" />
            <!-- Individual switch cards -->

<!--
            <div class="row g-6">
              <div class="col-md-6">
                <div class="card shadow border-0">
                  <div class="card-body">
                    <h5 class="mb-2">Public profile</h5>
                    <p class="text-sm text-muted mb-6">
                      Making your profile public means that anyone on the network will be able to find you.
                    </p>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card shadow border-0">
                  <div class="card-body">
                    <h5 class="mb-2">Show my email</h5>
                    <p class="text-sm text-muted mb-6">
                      Showing your e-mail adresses means that anyone on the network will be able to find you.
                    </p>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card shadow border-0">
                  <div class="card-body d-flex align-items-center">
                    <div>
                      <h5 class="text-danger mb-2">Deactivate account</h5>
                      <p class="text-sm text-muted">
                        Once you delete your account, there is no going back. Please be certain.
                      </p>
                    </div>
                    <div class="ms-auto">
                      <button type="button" class="btn btn-sm btn-danger">Deactivate</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->


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
            };
        },
        methods: {
            toggleShowP() {
            this.showPasswordP = !this.showPasswordP;
            },
        }
    }
    </script>

    <style scoped>
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
