<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>How to Become a Foster Parent</title>
    <link rel="shortcut icon" href="/images/foster-care/fostercare-favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            font-family: Raleway, sans-serif !important;
        }
        .custom-field{
            border: 0;
            padding: 13px 10px;
            outline: none;
            margin: 0;
            /* width: 230px; */
            max-width: 100%;
            display: block;
            margin-bottom: 20px;
            font-size: 14px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: inset 3px 3px 3px rgba(0, 0, 0, 0.05);
            box-shadow: inset 3px 3px 3px rgba(0, 0, 0, 0.05);
            background-color: whitesmoke;
        }
        .custom-submit-button{
            background-color: #53302e;
            color: #ffffff;
            font-size: 16px;
            line-height: 14px;
            height: 36px;
            width: 150px;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="d-flex pt-3 pb-1">
            <img src="/images/foster-care/fostercare-logo.png" alt="">
        </div>

        <form class="p-5" method="POST" action="/fostercare/apply">
            <h3>
                <strong>
                    Enquiry Form
                </strong>
            </h3>

            <?php echo e(@csrf_field()); ?>

            <div class="form-group">
                <label for="fullName">Name</label>
                <input type="text" class="custom-field form-control" id="fullName" name="fullName" placeholder="">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="custom-field form-control" id="address" name="address" placeholder="">
            </div>
            <div class="form-group">
                <label for="date">Date of birth</label>
                <input type="date" class="custom-field form-control" id="date" name="date" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="custom-field form-control" id="email" name="email" placeholder="name@example.com">
            </div>

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="tel" class="custom-field form-control" id="mobile" name="mobile" placeholder="">
            </div>

            <div class="form-group">
                <label for="relationStatus">Relationship Status</label>
                <input type="text" class="custom-field form-control" id="relationStatus" name="relationStatus" placeholder="">
            </div>

            <div class="form-group">
                <label for="ageOfChild">Age of Children</label>
                <input type="number" class="custom-field form-control" id="ageOfChild" name="ageOfChild" placeholder="">
            </div>
            <hr>
            <div class="form-group">
                <label for="notes"></label>
                <textarea class="custom-field form-control" id="notes" name="notes" rows="5"></textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="submitNote1" id="submitNote1">
                <label class="form-check-label" for="submitNote1">Do you have a spare room? *</label>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="submitNote2" id="submitNote2">
                <label class="form-check-label" for="submitNote2">Please note that we can't accept applications from those that have children that are younger than school going age..
                    Please tick to confirm that your own children are all of school going age or older or If you don't have any children of your own please also tick this box *</label>
            </div>


            <button type="submit" class="btn mt-4 custom-submit-button">SUBMIT</button>

        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>