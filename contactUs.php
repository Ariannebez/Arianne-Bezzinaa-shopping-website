<?php
        include 'includes/header.php';
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>

    <!--Main con-->
    <div class="container-fluid">
        <div class="row">
            <!--this div is to make space-->
            <div class="col-2">

            </div>

            <div class="col-8">
                <!--Action is where to sent the date user enters-->
                <form action="mailto:admin@pctech.com" method="post" class="contact-form" onsubmit="return validateForm();">
                    <div class="container">

                        <!--Titel box-->
                        <div class="row mt-5"> 
                            <h1>Do you have any problems ?</h1>
                        </div>

                        <!--name and surname box-->
                        <div class="row mt-3"> 
                            <div class="col">
                              <div>
                                <label for="firstName">First Name</label>

                                <input class="w-100" type="text" name="firstName" id="firstName"placeholder="Amy">
                              </div>  
                            </div>
                            <div class="col">
                                <div>
                                    <label for="lastName">Last Name</label>

                                    <input class="w-100" type="text" name="lastName" id="lastName" placeholder="Borg">
                                  </div>
                            </div>
                        </div>
                        <!--name and surname div closes-->

                        <!--email and message box-->
                        <div class="row">
                            <div class="col">
                                <label for="email">Email Address</label>

                                <input class="w-100" type="email" name="email" id="email" placeholder="mail@hotmail.com">
                            </div>
                        </div>
                        <!--div closes-->

                        <!-- email box-->
                        <div class="row"><label for="message">Your Message</label></div>
                        <div class="row">
                        <div class="col">
                                <textarea class="w-100" name="message" id="message" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <!--Button`s-->
                    <div class="row mt-5 mb-5">
                        <div class="col-6 d-grid gap-2">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>

                        <div class="col-6 d-grid gap-2">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                        <!--Button`s div closes-->

                        <div class="row">
                            <div class="col-6"></div>
                        </div>

                    </div>
                </form>
            </div>

            <!--This div will only show when we have errors.-->
            <div class="col-4">
               <div id="errors" class="card border-danger mb-3 d-none text-danger">
                <h4>Invalid Input</h4>
                <P id="errors-content" class="card-text"></P>

                </div> 
            </div>
            <!--Errors div closes-->
        </div>
    </div>


    <!--Main con closes-->

    <script src="includes/conscript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> 

<?php
        include 'includes/footer.php';
    ?>