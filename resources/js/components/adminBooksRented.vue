<template>
    <div class="container  my-5 border rounded-5  shadow py-3">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h3 class=""><b>Rented Books</b></h3>
                    <select v-model="selectedMyBook" style="margin-top: 2px; float: left; cursor: pointer;" class="form-select  cartselect arder" name="arder">
                        <option value="renB">Rented Books</option>
                        <option value="retB">Returned Books</option>
                    </select>
              </div>
              <hr style="background-color: black;">
              <div class="table-responsive">
                  <table class="table no-wrap user-table mb-0">
                    <thead>
                      <tr>
                        <th scope="col" class="border-0 text-uppercase font-medium">Client</th>
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

                      <tr>


                            <td><img src="../../logo/icons8-user-100.png"  style="height: 40px; border-radius: 50%; width: 40px;"/><br><span>name extralargehghggh</span></td>

                        <td class="py-4 pl-5">
                                <div class="book  justify-content-center mr-5 ">
                                    <div class="front ">
                                        <div class="cover">

                                                <img src="../../books/comic.webp" width=" 64" height="90.78" >
                                        </div>
                                    </div>
                                    <div class="left-side" >
                                        <img src="../../books/comic.webp" width="25 " height="90.78" >
                                    </div>
                                </div>
                        </td>
                        <td class="py-5">
                            <h5 class="font-medium ">Moon Knightdfsfds</h5>

                        </td>

                        <td class="py-5">
                            <span class="text-muted ">Renting Address</span><br>

                        </td>
                        <td class="py-5">
                            <input type="datetime-local" id="rentingDate" name="rentingDate" value="2023-05-14T14:56" class="form-control " readonly>
                        </td>
                        <td class="py-5">
                            <input type="datetime-local" id="rentingDate" name="rentingDate"  class="form-control " readonly>
                        </td>
                        <td class="py-5">
                        <h5 class="font-medium py-2">
                                12 $

                            </h5>
                        </td>
                        <td class="py-5" >

                        <button type="button" class="btn ">Return Now</button><!--<p>or</p>
                        <button type="button" class="btn " disabled>Returned</button>-->
                        </td>
                      </tr>

                        <tr>


                            <td><img src="../../logo/icons8-user-100.png"  style="height: 40px; border-radius: 50%; width: 40px;"/><br><span>name extralargehghggh</span></td>

                        <td class="py-4 pl-5">
                                <div class="book  justify-content-center mr-5 ">
                                    <div class="front ">
                                        <div class="cover">

                                                <img src="../../books/comic.webp" width=" 64" height="90.78" >
                                        </div>
                                    </div>
                                    <div class="left-side" >
                                        <img src="../../books/comic.webp" width="25 " height="90.78" >
                                    </div>
                                </div>
                        </td>
                        <td class="py-5">
                            <h5 class="font-medium ">Moon Knightdfsfds</h5>

                        </td>

                        <td class="py-5">
                            <span class="text-muted ">Renting Address</span><br>

                        </td>
                        <td class="py-5">
                            <input type="datetime-local" id="rentingDate" name="rentingDate" value="2023-05-14T14:56" class="form-control " readonly>
                        </td>
                        <td class="py-5">
                            <input type="datetime-local" id="rentingDate" name="rentingDate"  class="form-control " readonly>
                        </td>
                        <td class="py-5">
                        <h5 class="font-medium py-2">
                                12 $

                            </h5>
                        </td>
                        <td class="py-5" >

                        <button type="button" class="btn ">Return Now</button><!--<p>or</p>
                        <button type="button" class="btn " disabled>Returned</button>-->
                        </td>
                      </tr>


                      <tr>


                            <td><img src="../../logo/icons8-user-100.png"  style="height: 40px; border-radius: 50%; width: 40px;"/><br><span>name extralargehghggh</span></td>

                        <td class="py-4 pl-5">
                                <div class="book  justify-content-center mr-5 ">
                                    <div class="front ">
                                        <div class="cover">

                                                <img src="../../books/comic.webp" width=" 64" height="90.78" >
                                        </div>
                                    </div>
                                    <div class="left-side" >
                                        <img src="../../books/comic.webp" width="25 " height="90.78" >
                                    </div>
                                </div>
                        </td>
                        <td class="py-5">
                            <h5 class="font-medium ">Moon Knightdfsfds</h5>

                        </td>

                        <td class="py-5">
                            <span class="text-muted ">Renting Address</span><br>

                        </td>
                        <td class="py-5">
                            <input type="datetime-local" id="rentingDate" name="rentingDate" value="2023-05-14T14:56" class="form-control " readonly>
                        </td>
                        <td class="py-5">
                            <input type="datetime-local" id="rentingDate" name="rentingDate"  class="form-control " readonly>
                        </td>
                        <td class="py-5">
                        <h5 class="font-medium py-2">
                                12 $

                            </h5>
                        </td>
                        <td class="py-5" >

                       <!-- <button type="button" class="btn ">Return Now</button>-->
                        <button type="button" class="btn " disabled>Returned</button>
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
        name: "AdminBooksRented",
        data() {
            return {

                selectedMyBook: 'renB',
                UseId: null,
                logedin: false,


            };
        },
        mounted(){
            this.logedin = window.Laravel.isLoggedin;
            if(window.Laravel.isLoggedin){
                this.UseId = window.Laravel.user.UseId;
            };

        },
        methods: {

        },
      }

      </script>

      <style scoped>


.container {
    max-width: 1280px;
}
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
