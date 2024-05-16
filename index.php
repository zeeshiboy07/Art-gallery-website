<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
   * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f2f2f2;
}

.container {
    background: #333;
    width: 400px;
    padding: 2rem;
    margin: 50px auto;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.form-title {
    font-size: 1.8rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 1.5rem;
    color: #fff;
}

input {
    color: #fff;
    width: 100%;
    background-color: #444;
    border: 1px solid #666;
    padding: 12px;
    font-size: 16px;
    margin-bottom: 1rem;
    border-radius: 5px;
}

.input-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.input-group i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 40px;
    color:#5248cc;
}

input:focus {
    outline: none;
    border-color: #6c63ff;
}

label {
    position: absolute;
    top: 10px;
    left: 38px;
    color: #aaa;
    font-size: 16px;
    transition: 0.3s ease-in-out;
}

input:focus~label,
input:not(:placeholder-shown)~label {
    top: -12px;
    font-size: 12px;
    color: #fff;
}

.btn {
    font-size: 1.2rem;
    padding: 12px;
    border-radius: 5px;
    outline: none;
    border: none;
    width: 100%;
    background: #6c63ff;
    color: #fff;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background: #5248cc;
}

.or {
    font-size: 1.1rem;
    margin-top: 1.2rem;
    text-align: center;
    color: #aaa;
}

.icons {
    text-align: center;
    margin-top: 1.5rem;
}

.icons i {
    color: #fff;
    padding: 10px;
    border-radius: 50%;
    font-size: 1.5rem;
    cursor: pointer;
    border: 2px solid #fff;
    margin: 0 10px;
    transition: 0.3s;
}

.icons i:hover {
    background: #5248cc;
    color: #fff;
}

.links {
    text-align: center;
    margin-top: 2rem;
}

.links p {
    margin-bottom: 0.5rem;
    color: #aaa;
    font-size: 1.1rem; /* Made font size larger */
}

.links button {
    color: #6c63ff;
    border: none;
    background-color: transparent;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

.links button:hover {
    text-decoration: underline;
    color: #5248cc;
}

    </style>
</head>
<body>
    <div class="container" id="signup" style="display:none;">
      <h1 class="form-title">Register</h1>
      <form method="post" action="register.php">
        <div class="input-group">
           <i class="fas fa-user"></i>
           <input type="text" name="fName" id="fName" placeholder="First Name" required>
           <label for="fname">First Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <label for="lName">Last Name</label>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
       <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
      <p class="or">
        ----------or--------
      </p>
      <div class="icons">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook"></i>
      </div>
      <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
      </div>
    </div>

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email" required>
              <label for="email">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" required>
              <label for="password">Password</label>
          </div>
         
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">
          ----------or--------
        </p>
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
      </div>
      <script src="script.js"></script>
</body>
</html>