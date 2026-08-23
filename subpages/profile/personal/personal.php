<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
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

        .container {
            width: 80%;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
        }

        .inline-container {
            width: 100%;
            display: grid;
            grid-template-columns: 150px 1fr;
            align-items: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <form action="/action_page.php">
        <!-- <fieldset> -->
        <!-- <legend>Personal information:</legend> -->
        <div class="img-container">
            <img src="9439682.jpg" alt="John" style="width:50%">
        </div>

        <div class="container">

            <div class="inline-container">
                <label for="fullname">Full name</label>
                <input type="text" id="fullname" name="firstname" value="Mickey">
            </div>

            <div class="inline-container">
                <label for="uname">User name</label>
                <input type="text" id="uname" name="lastname" value="Mouse">
            </div>

            <div class="inline-container">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="Mouse@gmail.com">
            </div>

            <div class="inline-container">
                <!-- Phone input -->
                <?php include_once "phoneinput.php"; ?>
            </div>


            <input type="submit" value="Submit">
        </div>

        <!-- </fieldset> -->
    </form>


</body>

</html>