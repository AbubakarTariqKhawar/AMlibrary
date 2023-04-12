<template>
   <!-- <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light mb-4">
            <a class="navbar-brand" href="#">Laravel Vue 3</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="navbar-nav" v-if="isLoggedin">
                <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                <router-link to="/posts" class="nav-item nav-link">xxxx</router-link>
                <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
            </div>
            <div class="navbar-nav" v-else>
                <router-link to="/" class="nav-item nav-link">Home</router-link>
                <router-link to="/login" class="nav-item nav-link">Login</router-link>
                <router-link to="/register" class="nav-item nav-link">Register</router-link>
            </div>
        </nav>


        <router-view></router-view>
    </div>-->

   <!-- <div>-->
        <div class="header-dark">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#"><img src="../logo/amlogow.svg" alt="AMLibrary"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#"><b>Link</b></a></li>
                            <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><b>Dropdown</b> </a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                            </li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field"></div>
                        </form><span class="navbar-text"><a href="#" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="#">Sign Up</a></div>
                </div>
            </nav>
           <!-- <div class="container hero">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <h1 class="text-center">The Revolution is Here.</h1>
                        <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item"></iframe></div>
                    </div>
                </div>
            </div>-->
        </div>
   <!-- </div>-->

</template>
<script>
export default {
    name: "App",
    data() {
        return {
            isLoggedin: false,
        }
    },
    created() {
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
        }
    },
    methods: {
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })

        }
    },
}
</script>
