<template>
  <div class="container  my-5 border rounded-5  shadow py-3">
<div class="row">
    <div class="col-md-12">
        <div class="card" style="cursor: default; !important">
            <div class="card-body">
                <h3 class=""><b>Manage Users</b></h3>
            </div>
            <hr style="background-color: black;">
            <div class="table-responsive">
                <table class="table no-wrap user-table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase font-medium pl-4 ">#</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Picture</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Name</th>

                      <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Added</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Roles</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-if="allUsers" v-for="user in allUsers" :key="user.UseId">
                      <td class="pl-4">{{ user.UseId }}</td>
                      <td><img :src="`/img/user/${user.UsePic}`" style="height: 40px; border-radius: 50%; width: 40px;"/><br></td>
                      <td>
                          <h5 class="font-medium mb-0">{{ user.name }}</h5>
                          <span class="text-muted">{{ user.UseSureName }}</span>
                      </td>

                      <td>
                          <span class="text-muted">{{ user.email }}</span><br>
                          <span class="text-muted">{{ user.UsePhone }}</span>
                      </td>
                      <td>
                          <span class="text-muted">{{ new Date(user.created_at).toLocaleDateString('en-US', { day: 'numeric', month: 'long', year: 'numeric'  }) }}</span><br>
                          <span class="text-muted">{{ new Date(user.updated_at).toLocaleDateString('en-US', { day: 'numeric', month: 'long', year: 'numeric'  }) }}</span>
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="dropdown-toggle form-control category-select  text-center" type="button" id="selectRolesforUsers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 20px;" >
                            Select Roles
                          </button>
                          <div class="dropdown-menu" aria-labelledby="selectRolesforUsers" v-if="canEditUsers()">
                            <a class="dropdown-item" v-if="allRoles" v-for="role in allRoles" :key="role.RolId" >
                              <input type="checkbox" :key="role.RolId" :value="role.RolId" :checked="isRoleSelected(user.UseId, role.RolId)" @change="toggleRoleUser(user.UseId, role.RolId, $event.target.checked)"> {{ role.RolName }}
                            </a>
                          </div>
                        </div>
                      </td>
                      <td >
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle mb-1" @click="putteditPass(user); editpadderror = null;" data-bs-toggle="modal" data-bs-target="#editUserR" v-if="canEditUsers()"><i class="fa fa-key"></i> </button>
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2" @click="deleteUserRvalue = user.UseId; userRDelete = null;"  data-bs-toggle="modal" data-bs-target="#deleteUserR" v-if="canDeletetUsers()"><i class="fa fa-trash"></i> </button>

                      </td>
                    </tr>


                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

        <!----------------------------EditUSerPass-------------------------------------------->

        <div class="modal fade " id="editUserR" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 2%; border: none;">
                        <img src="../../logo/mainlogoblack.svg" height="80" style="padding-left: 6%;">

                        <div class="mt-4">
                            <label for="userPassr" class="col-form-label">New Password*:</label> <i class="fa fa-key"></i>
                        </div>
                        <div class="input-group">
                            <input type="password" v-if="showRpass == false" class="form-control" id="userPassr" v-model="userPassr" required autofocus autocomplete="off" placeholder="New Password" >
                            <input type="text" v-if="showRpass == true" class="form-control" id="userPassr" v-model="userPassr" required autofocus autocomplete="off" placeholder="New Password" >

                            <button class="button" style=" border-left-style: none; border-color: #ced4da; background-color: white; border-radius: 0px 5px 5px 0px; border-style: inset;" @click="toggleshowRpass"><span class="icon is-small is-right">
                                <i class="fa" :class="{ 'fa-eye-slash': showRpass, 'fa-eye': !showRpass }"></i>
                                </span>
                            </button>
                        </div>

                        <button type="button" v-if="userPassr == ''" class="btn  mt-4" style="background-color: #e0e0e0; color: #EEEEEE; cursor:default" >Save Password</button>
                        <button type="button" v-if="userPassr != ''" class="btn  mt-4" @click="edituserRpas">Save Password</button>
                    </div>
                    <div v-if="editpadderror !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{editpadderror}}</strong>
                    </div>

                </div>
            </div>
        </div>



        <!----------------------------DeleteUser-------------------------------------------->

        <div class="modal fade " id="deleteUserR" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content createbookdiv" style="padding: 3%; border-radius: 20px; overflow: auto;!important">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="lgoinbdiv" style="padding: 3%; border: none;">
                        <div style="text-align: center;">
                            Are you sure you want to Delete this user?
                        </div>


                        <button type="button" class="btn  mt-4" @click="deleteUserR">Delete</button>
                    </div>
                    <div v-if="userRDelete != null" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <!--<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
                        <strong>{{userRDelete}}</strong>
                    </div>

                </div>
            </div>
        </div>
</template>

    <script>

    export default {
        name: "usersManager",
        data() {
            return {
                allUsers: [],
                allRoles: [],

                //role_user
                allRoleUser: [],

                //edit pass
                userIdeditr: null,
                userPassr: '',
                showRpass: false,
                editpadderror: null,

                //delete user
                deleteUserRvalue: null,
                userRDelete: null,


                selectedRoles: [],
                userRoles: [],

            };
        },
        mounted(){
            this.pickAllUsers();
            this.pickAllRoles();
            this.pickAllRoleUser();
            this.getUserRoles();

        },
        methods: {
          getUserRoles() {
            axios.get('/api/user/roles')
              .then(response => {
                this.userRoles = response.data.roles;
                console.log('User Roles:', this.userRoles);
              })
              .catch(() => {
                console.error('Failed to retrieve user roles');
              });
          },
        canEditUsers() {
          const userRoleIds = this.userRoles.map(role => role.RolId);
          console.log('User Role IDs:', userRoleIds);
          return userRoleIds.includes(6) || userRoleIds.includes(1);
        },
        canDeletetUsers() {
          const userRoleIds = this.userRoles.map(role => role.RolId);
          console.log('User Role IDs:', userRoleIds);
          return userRoleIds.includes(7) || userRoleIds.includes(1);
        },
        
      





            isRoleSelected(userId, roleId) {
                //console.log('checking user role slected');
                //console.log(this.allRoleUser);
                return this.allRoleUser.some(item => item.user_UseId === userId && item.role_RolId === roleId);

            },
            toggleRoleUser(userId, roleId, isChecked) {
                //const index = this.allRoleUser.findIndex(item => item.user_UseId === userId && item.role_RolId === roleId);
                if (isChecked) {
                    console.log(`Checked: User ID - ${userId}, Role ID - ${roleId}`);

                    this.$axios.get('/sanctum/csrf-cookie').then(response => {
                        this.$axios.post('api/updateUserRole', {
                            userid: userId,
                            roleid: roleId,
                        })
                        .then(response => {
                            console.log('Insert new Role');
                            console.log(response.data);

                            this.pickAllRoleUser();
                        })

                    })

                } else {
                    console.log(`Unchecked: User ID - ${userId}, Role ID - ${roleId}`);

                    this.$axios.get('/sanctum/csrf-cookie').then(response => {
                        this.$axios.post('api/deleteUserRole', {
                            userid: userId,
                            roleid: roleId,
                        })
                        .then(response => {
                            console.log('Deleted Role from user');
                            console.log(response.data);

                            this.pickAllRoleUser();
                        })

                    })
                }
            },
            edituserRpas(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/editUSerPass', {
                        id: this.userIdeditr,
                        pass: this.userPassr,
                    })
                    .then(response => {
                        console.log('updated new pass');
                        this.editpadderror = response.data;
                        this.userIdeditr = null;
                        this.userPassr = '';
                        this.pickAllUsers();
                    })

                })
            },
            deleteUserR(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/deleteUSer', {
                        id: this.deleteUserRvalue,
                    })
                    .then(response => {
                        console.log('Deleted User');
                        this.userRDelete = response.data;
                        this.pickAllUsers();
                    })

                })
            },
            putteditPass(user){
                this.userIdeditr = user.UseId;
            },
            toggleshowRpass(){
                this.showRpass = !this.showRpass;
            },
            pickAllUsers(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.get('/api/getallUsers')
                    .then(response => {
                        this.allUsers = response.data.users;
                        console.log('checking users ');
                        console.log(this.allUsers);
                    })
                    .catch(error => {
                        console.error(error);
                    });
                })
            },
            pickAllRoleUser(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.get('/api/getAllRoleUser')
                    .then(response => {
                        this.allRoleUser = response.data.roles;
                        console.log('checking RolesUser ');
                        console.log(this.allRoleUser);
                    })
                    .catch(error => {
                        console.error(error);
                    });
                })
            },
            pickAllRoles(){
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.get('/api/getAllRoles')
                    .then(response => {
                        this.allRoles = response.data.roles;
                        console.log('checking Roles ');
                        console.log(this.allRoles);
                    })
                    .catch(error => {
                        console.error(error);
                    });
                })
            },

        },
    }


</script>

    <style scoped>
    td {  text-align: center;}
    th {  text-align: center; }
    </style>
