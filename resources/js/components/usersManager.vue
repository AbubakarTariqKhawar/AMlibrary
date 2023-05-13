<template>
  <div class="container  my-5 border rounded-5  shadow py-3">
<div class="row">
    <div class="col-md-12">
        <div class="card">
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
                      <th scope="col" class="border-0 text-uppercase font-medium">Category</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="pl-4">1</td>
                      <td><img src="../../logo/icons8-user-100.png"  style="height: 40px; border-radius: 50%; width: 40px;"/><br><span>name extralargehghggh</span></td>
                      <td>
                          <h5 class="font-medium mb-0">Daniel Kristeen</h5>
                          <span class="text-muted">Texas, Unitedd states</span>
                      </td>

                      <td>
                          <span class="text-muted">daniel@website.com</span><br>
                          <span class="text-muted">999 - 444 - 555</span>
                      </td>
                      <td>
                          <span class="text-muted">15 Mar 1988</span><br>
                          <span class="text-muted">10: 55 AM</span>
                      </td>
                      <td>
                        <select class="form-control category-select  text-center" id="exampleFormControlSelect1">
                          <option>librarian</option>
                          <option>Admin</option>
                          <option>User</option>
                        </select>
                      </td>
                      <td >
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle mb-1"><i class="fa fa-key"></i> </button>
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>

                      </td>
                    </tr>

                    <tr>
                      <td class="pl-4">1</td>
                      <td><img src="../../logo/userb.svg"  style="height: 40px; border-radius: 50%; width: 40px;"/></td>
                      <td>
                          <h5 class="font-medium mb-0">Daniel Kristeen</h5>
                          <span class="text-muted">Texas, Unitedd states</span>
                      </td>

                      <td>
                          <span class="text-muted">daniel@website.com</span><br>
                          <span class="text-muted">999 - 444 - 555</span>
                      </td>
                      <td>
                          <span class="text-muted">15 Mar 1988</span><br>
                          <span class="text-muted">10: 55 AM</span>
                      </td>
                      <td>
         
                        <select class="selectpicker" multiple data-max-options="2">
  <option>Mustard</option>
  <option>Ketchup</option>
  <option>Relish</option>
</select>
                      </td>
                      <td >
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle mb-1"><i class="fa fa-key"></i> </button>
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>

                      </td>
                    </tr>


                    <tr>
                      <td class="pl-4">1</td>
                      <td><img src="../../logo/person.svg"  style="height: 40px; border-radius: 50%; width: 40px;"/></td>
                      <td>
                          <h5 class="font-medium mb-0">Daniel Kristeen</h5>
                          <span class="text-muted">Texas, Unitedd states</span>
                      </td>

                      <td>
                          <span class="text-muted">daniel@website.com</span><br>
                          <span class="text-muted">999 - 444 - 555</span>
                      </td>
                      <td>
                          <span class="text-muted">15 Mar 1988</span><br>
                          <span class="text-muted">10: 55 AM</span>
                      </td>
                      <td>
                        <select class="form-control category-select text-center" id="exampleFormControlSelect1">
                          <option>librarian</option>
                          <option>Admin</option>
                          <option>User</option>
                        </select>
                      </td>
                      <td >
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle mb-1"><i class="fa fa-key"></i> </button>
                        <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash"></i> </button>

                      </td>
                    </tr>

                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
 </template>

    <script>
    export default {
        name: "useusersManager"
    }

    </script>

    <style scoped>
    td {  text-align: center;}
    th {  text-align: center; }
    </style>
