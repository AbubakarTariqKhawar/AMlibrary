<template>
    <div class="container">
        <div class="row jutify-content-center">
            <div class="col-md-8">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{error}}</strong>
                </div>

                <div class="card card-default">
                    <div class="card-header"><h5>Login</h5></div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" v-model="email" required
                                           autofocus autocomplete="off" placeholder="Enter your email">
                                </div>
                            </div>


                            <div class="form-group row mt-1">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" v-model="password"
                                           required autocomplete="off" placeholder="Enter your password">
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success" @click="doLogin">
                                        Login
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-8 offset-md-4">
                                    <small class="text-muted">
                                        Don't have any account yet? Please
                                        <router-link to="/register" >Register</router-link>
                                    </small>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
  Launch static backdrop modal
</button>
-->
<!-- Modal

<div class="modal fade " id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content" style="padding: 3%; border-radius: 20px;!important">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="lgoinbdiv" style="padding: 3%; border: none;">
            <img src="../../logo/mainlogoblack.svg" height="80" style="padding-left: 6%;">
            <div class="mt-4">
                <label for="loginemail" class="col-form-label">Email*:</label>
                <input type="email" class="form-control" id="loginemail" v-model="email" required autofocus autocomplete="off" placeholder="Enter your email" >
            </div>
            <div class="mt-3">
                <label for="loginpassword" class="col-form-label">Password*:</label>
                <input type="password" class="form-control" id="loginpassword" v-model="password" required autofocus autocomplete="off" placeholder="Enter your password" >
            </div>
            <button type="button" v-if="email == '' || password == '' " class="btn  mt-5" style="background-color: #e0e0e0; color: #EEEEEE; cursor:default" >LogIn</button>
            <button type="button" v-if="email != '' && password != '' " class="btn  mt-5" @click="doLogin">LogIn</button>
            <p class="loginp">This site is protected and Privacy Policy and Terms of Service apply.</p>
        </div>
        <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>{{error}}</strong>
        </div>

    </div>
  </div>
</div>
-->

</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            error: null
        }
    },
    methods: {/*
        doLogin(e) {
            e.preventDefault()
            if(this.password.length > 0) {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            if (response.data.success) {
                                console.error('OK');
                                window.location.href = "/login"
                            } else {
                                console.error('No loggin');
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        }*/
    },/*
    beforeRouteEnter(to, from, next){
        if(window.Laravel.isLoggedin){
            return next('dashboard');
        }
        next();
    }*/
}
</script>
