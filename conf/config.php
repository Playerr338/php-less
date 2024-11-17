<?php 
  define('DB_SERVER', 'localhost:3310');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', 'root');
  define('DB_NAME', 'mydb');

  $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if ($conn === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  else {
    echo 'Работает епт!';
  }

  // Check if the form is submitted using the POST method
if (isset($_POST["submit"])) {

  // Retrieve user inputs from the form
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $adress = $_POST['adress'];

  // Validate if all fields are filled
  if (empty($first_name) || empty($last_name) || empty($email) || empty($phone_number) || empty($adress)) {
    echo "All fields are required";
  } else {
    // Construct SQL query to insert data into the 'userdetails' table
    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `phone_number`, `adress`) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$adress')";

    //dd($sql);
    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query execution was successful
    if ($result) {
      echo "New record created successfully";
    } else {
      die(mysqli_error($conn));
    }
  }
}

// Close the database connection
$conn->close();
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD App using PHP MySQL</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <style>
    html,
    body {
      background-color: gainsboro;
    }
  </style>

  <div class="container py-5 px-5">

    <div class="container text-center py-3">
      <h2>CRUD OPERATIONS</h2>
    </div>

    <!-- Form with POST method to submit data to PHP -->
    <form method="post">

      <div class="mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="first_name" class="form-control" name="first_name" id="first_name" placeholder="Enter Your First Name">
      </div>

      <div class="mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="last_name" class="form-control" name="last_name" id="last_name" placeholder="Enter Your Last Name">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <!-- 'name' attribute is used to identify this input field in PHP -->
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address" aria-describedby="emailHelp">
      </div>

      <div class="mb-3">
        <label for="phone_number" class="form-label">Phone Number</label>
        <input type="phone_number" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Your Phone Number">
      </div>

      <div class="mb-3">
        <label for="adress" class="form-label">Adress</label>
        <input type="adress" class="form-control" name="adress" id="adress" placeholder="Enter Your Adress">
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
?>