<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>

    <div class="titleslogin">
     <h1>TO DO APP</h1>
     <img src="images/orange-lined-notepaper-journal-sticker-vector_53876-177481.jpg" alt="logo" srcset="" width="100px">
     </div>

     
     <form action="process/loginprocess.php" method="post">
        <div class="form-group">
            <div class="inputform">
                <div class="form-check form-check-inline">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="form-check form-check-inline">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                </div> 
                <div class="form-check form-check-inline">
                    
                    <button type="submit" name="submit" id="submit" class="btn btn-success" >login</button>
                </div>
            </div>
        </div>
     </form>

     <div class="register">
     <p><a href="register.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Register</a></p>
     </div>

</body>
</html>