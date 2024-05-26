<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Page</title>
    <style>
        body {
  background-image: url("https://img.freepik.com/free-photo/view-luxurious-hotel-hallway_23-2150683497.jpg");
  background-repeat: no-repeat, repeat;
  background-size: cover;
 
}
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form#myForm {
            background: #ffffff;
            padding: 20px;
            opacity: 90%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        form#myForm h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }

        form#myForm div {
            margin-bottom: 15px;
        }

        form#myForm label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        form#myForm input[type="text"],
        form#myForm input[type="number"],
        form#myForm input[type="datetime-local"],
        form#myForm select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form#myForm input[type="radio"] {
            margin-right: 10px;
        }

        form#myForm button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
        }

        form#myForm button:hover {
            background-color: #0056b3;
        }
        .mod{
            display: flex;
            color: #0056b3;
            margin-left: 40%;
            
        }
    </style>
</head>
<body>
    <form id="myForm">
        <h1>Hotel Transylvania</h1>
        <div>
            <label for="fullname">Name</label>
            <input type="text" name="fullname" id="fullname" placeholder="Full Name">
        </div>
        
        <div>
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" placeholder="Email Address">
        </div>
        <div>
            <label for="room">Room Type</label>
            <select name="select" id="select">
                <option disable>Please Select</option>
                <option value="Standard Room(1 to 2 People)">Standard Room(1 to 2 People)</option>
                <option value="Family Room(1 to 4 People)">Family Room(1 to 4 People)</option>
                <option value="Private Room(1 to 3 People)">Private Room(1 to 3 People)</option>
            </select>
        </div>
        <div>
            <label for="guest">Number of Guests</label>
            <input type="number" name="guest" id="guest" placeholder="Guest">
        </div>
        <div>
            <label for="date">Arrival Date</label>
            <input type="datetime-local" name="adate" id="date" placeholder="Date">
        </div>
        <div>
            <label for="date">Departure Date</label>
            <input type="datetime-local" name="Ddate" id="date" placeholder="Date">
        </div>
        <div>
            <label for="pickup">Free Pickup?</label>
            <input type="radio" name="pickup" id="pickup" value="Yes"> Yes Please! - Pick me up on arrival
            <input type="radio" name="pickup" id="pickup" value="No"> No Thanks - I'll make my own way there
        </div>
        <div>
            <button type="submit">Submit</button>
            <br><br>
            <button type="reset">Reset</button>
            
        </div>
        <a href="view.php" class="mod">Modify Records</a>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(e) {
                e.preventDefault();

                const formData = $(this).serialize();

                console.log(formData);

                $.ajax({
                    type: "POST",
                    url: "insert.php",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error, xhr, status) {
                        console.log("Error!");
                    }
                });
            });
        });
    </script>
</body>
</html>
