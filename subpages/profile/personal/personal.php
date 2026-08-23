<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@29.2.3/dist/css/intlTelInput.css">


    <style>
        fieldset {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        img {
            border-radius: 50%;
        }

        .img-container {
            width: 80%;
            margin: 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@29.2.3/dist/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#phone");
        window.intlTelInput(input, {
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@29.2.3/dist/js/utils.js"),
        });
    </script>

    <form action="/action_page.php">
        <!-- <fieldset> -->
        <!-- <legend>Personal information:</legend> -->
        <div class="img-container">
            <img src="9439682.jpg" alt="John" style="width:50%">
        </div>

        <div class="container">
            <label for="fullname">Full name</label>
            <input type="text" name="firstname" value="Mickey">

            <label for="uname">User name</label>
            <input type="text" name="lastname" value="Mouse">

            <label for="uname">Email</label>
            <input type="email" name="email" value="Mouse@gmail.com">

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <input type="submit" value="Submit">
        </div>

        <!-- </fieldset> -->
    </form>
</body>

</html>