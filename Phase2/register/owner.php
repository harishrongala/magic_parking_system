<html>
<head>
<title>Owner Sign Up</title>
</head>
<body>
  <form action="owner_register_update.php" method="post">
    <input placeholder="First Name" name="fname"/><br>
    <input placeholder="Last Name" name="lname"/><br>
    <input placeholder="Email" type="email" name="email"/><br>
    <input placeholder="Password" type="password" name="pass"/><br>
    <input placeholder="Organization Name" name="org_name"/><br>
    <input placeholder="Address" name="address"/><br>
    <input placeholder="Zipcode" name="zip" type="text" pattern="[0-9]{5}"/><br>
    <input placeholder="State" name="state"/><br>
    <input placeholder="City" name="city"/><br>
    <button type="submit">Register</button>
  </form>
</body>
</html>
