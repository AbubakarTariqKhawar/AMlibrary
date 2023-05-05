<template>
    <div class="container my-5 border rounded-5  " >
   <div class="col-xl-7 mx-auto">
   
            <!-- Profile picture -->
          
                  
                    <div class="d-flex justify-content-center shadow border-0 mt-4 mb-5 py-3 " style="width:auto">
                      
                        <img alt="..." src="../../logo/icons8-user-100.png">
                     
                    
                    </div>
                 


                 

             
            <!-- Form -->
            <form class="mb-6">
            <div class="mb-5">
              <h5 class="mb-0">Contact Information</h5>
            </div>
           
              <div class="row mb-5">
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="first_name">First name</label>
                    <input type="text" class="form-control" id="first_name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="last_name">Last name</label>
                    <input type="text" class="form-control" id="last_name">
                  </div>
                </div>
              </div>
              <div class="row g-5">
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="">
                    <label class="form-label" for="phone_number">Phone number</label>
                    <input type="tel" class="form-control" id="phone_number">
                  </div>
                </div>
                <div class="col-12">
                  <div class="">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password">
                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="">
                    <label class="form-label" for="profilePic">Upload Image</label>
                    <input type="file" class="form-control" id="profilePic">
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
                <button type="button" class="btn text-dark btn-outline-dark mr-2" style="background-color: azure;">Cancel</button>
                <button type="submit" class="btn ">Save</button>
              </div>
            </form>
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
        name: "userProfile"
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
    