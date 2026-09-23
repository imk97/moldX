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

        img#pp {
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
            /* width: 80%;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 20px; */
        }

        .inline-container {
            width: 100%;
            display: grid;
            grid-template-columns: 150px 1fr;
            align-items: center;
            margin-bottom: 10px;
        }

        input[type=text], input[type=email], input[type=tel],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <form>
        <!-- <fieldset> -->
        <!-- <legend>Personal information:</legend> -->
        <div class="img-container">
            <img id="pp" src="subpages/profile/personal/9439682.jpg" alt="John" style="width:30%">
        </div>

        <div class="container">

            <div class="inline-container">
                <label for="fullname">Full name</label>
                <input type="text" id="fullname" name="firstname" placeholder="Mickey">
            </div>

            <div class="inline-container">
                <label for="uname">User name</label>
                <input type="text" id="uname" name="lastname" placeholder="Mouse">
            </div>

            <div class="inline-container">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Mouse@gmail.com">
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