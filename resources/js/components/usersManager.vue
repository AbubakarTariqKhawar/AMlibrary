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
                        <div class="dropdown">
                          <button class="dropdown-toggle form-control category-select  text-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Options
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option1"> Option 1
                            </a>
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option2"> Option 2
                            </a>
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option3"> Option 3
                            </a>
                            <!-- Add more options here -->
                          </div>
                        </div>
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
                        <div class="dropdown">
                          <button class="dropdown-toggle form-control category-select  text-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Options
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option1"> Option 1
                            </a>
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option2"> Option 2
                            </a>
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option3"> Option 3
                            </a>

                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option1"> Option 1
                            </a>
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option2"> Option 2
                            </a>
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option3"> Option 3
                            </a>
                            
                            <!-- Add more options here -->
                          </div>
                        </div>

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
                        <div class="dropdown">
                          <button class="dropdown-toggle form-control category-select  text-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Options
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option1"> Option 1
                            </a>
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option2"> Option 2
                            </a>
                            <a class="dropdown-item" href="#">
                              <input type="checkbox" value="option3"> Option 3
                            </a>
                            <!-- Add more options here -->
                          </div>
                        </div>
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
    document.addEventListener('DOMContentLoaded', function() {
  var dropdownToggle = document.querySelector('.dropdown-toggle');
  var dropdownMenu = document.querySelector('.dropdown-menu');

  dropdownToggle.addEventListener('click', function() {
    dropdownMenu.classList.toggle('show');
  });

  var checkboxes = document.querySelectorAll('.dropdown-menu input[type="checkbox"]');
  var selectedOptions = [];

  checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
      var optionValue = this.value;
      
      if (this.checked) {
        selectedOptions.push(optionValue);
      } else {
        var index = selectedOptions.indexOf(optionValue);
        if (index > -1) {
          selectedOptions.splice(index, 1);
        }
      }

      // Perform any necessary actions with the selected options
      console.log(selectedOptions);
    });
  });
});

    </script>

    <style scoped>
    td {  text-align: center;}
    th {  text-align: center; }
    </style>
