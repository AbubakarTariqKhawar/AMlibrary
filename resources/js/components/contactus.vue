<template>

<div class="content mx-5 my-5 shadow border rounded-5 px-5 py-5" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row mb-5">
                    <div class="col-md-4 mr-auto">
                        <h3 class="thin-heading mb-4" >New York</h3>
                        <p >
                            9757 Aspen Lane
                            South Richmond Hill, NY 11419
                        </p>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <h3 class="thin-heading mb-4">Contact Info</h3>
                        <p>T: +1 (291) 939 9321 <br> E: AMLibrary@gmail.com</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h3 class="thin-heading mb-4">Message Us</h3>
                        <form class="mb-5" action="mailto:abubakarprova@gmail.com"  method="get"  id="contactForm" name="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="subject" class="form-control"  placeholder="Subject">
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" name="email" class="form-control"  placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <textarea class="form-control" name="body" cols="30" rows="2" placeholder="Write your message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </form>
                        <div id="form-message-warning mt-4"></div>
                        <div id="form-message-success">
                             Your message was sent, thank you!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

    <script>
    export default {
        name: "contactus"
    }
    </script>

    <style scoped>

    </style>
