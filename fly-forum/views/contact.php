<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contact Us</title>
</head>

<body>
    <div class="container my-5 py-5">
        <h2 class="text-center">Contact</h2>
        <p class="text-secondary mb-5 text-center">The best way to contact us is to use our contact form below. Please fill out all of the required fields and we will get back to you as soon as possible.</p>
        <form method="post" action="/learn-php/fly-forum/helper/contactus_handler.php">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input name="fullName" type="text" class="form-control" id="fullName">
                </div>
                <div class="mb-3">
                    <label for="contactEmail" class="form-label">Email address</label>
                    <input name="contactEmail" type="email" class="form-control" id="contactEmail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" type="text" class="form-control" id="message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <?php include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>