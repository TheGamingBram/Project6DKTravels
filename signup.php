<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
</head>
<body>
      <form action="signupcode.php" method="POST">
            <div class="form-group">
                <label> Naam </label>
                <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label> Telefoonnummer </label>
                <input type="tel" name="phone" class="form-control" placeholder="Enter number">
            </div>
            <div class="form-group">
                <label>Wachtwoord</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <button type="submit" name="signupbtn" class="btn btn-primary">Sign up</button>
      </form>
</body>
</html>


