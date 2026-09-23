<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Input</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@29.2.3/dist/css/intlTelInput.css">


</head>

<body>
    <label for="phone">Phone Number</label>
    <input type="tel" id="phone" name="phone" required>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@29.2.3/dist/js/intlTelInput.min.js"></script>
    <script>
        const initialCountryLookup = async () => {
            const res = await fetch("https://ipapi.co/json");
            const data = await res.json();
            return data.country_code;
        };

        const input = document.querySelector("#phone");
        window.intlTelInput(input, {
            initialCountryLookup,
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@29.2.3/dist/js/utils.js"),
        });
    </script>
</body>

</html>