<?php
        include 'includes/header.php';
        require_once "includes/functions.php";
        require_once "includes/dbh.php";
        require_once "includes/db-functions.php";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>

<div class="row mt-5 ml-2">
<div class="col">
<a class="btn btn-primary" href="cart.php">
<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
    </a>
</div>
</div>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Payment Details</h5>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Address Details -->
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter address" required>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="postalCode">Postal Code:</label>
                                <input type="text" class="form-control" id="postalCode" placeholder="Enter postal code" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="town">Town:</label>
                                <input type="text" class="form-control" id="town" placeholder="Enter town" required>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="form-group">
                            <label for="paymentMethod">Payment Method:</label>
                            <select class="form-control" id="paymentMethod" required>
                                <option value="applePay">Apple Pay</option>
                                <option value="googlePay">Google Pay</option>
                                <option value="visa">Visa</option>
                            </select>
                        </div>

                        <!-- Card Details (for demonstration purposes) -->
                        <div class="form-group">
                            <label for="cardNumber">Card Number:</label>
                            <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number">
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label for="expiryDate">Expiry Date:</label>
                                <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="cvv">CVV:</label>
                                <input type="text" class="form-control" id="cvv" placeholder="CVV">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="button" class="btn btn-primary btn-block" onclick="processPayment()">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function processPayment() {
        // Implement payment processing logic here (for demonstration purposes only).
        alert('Payment processed successfully!');
    }
</script>

</body>
</html>
<?php
        include 'includes/footer.php';
    ?>