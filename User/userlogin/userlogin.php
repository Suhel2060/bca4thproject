
  <div class="container"><
  <div class="login-container" id="login-form">
    <h1>Login</h1>
    <form action="../phpfile/login.php" method="post" target="_self">
      <input type="text" name="username" id="username" placeholder="Username" required>
      <div class="password-toggle">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="fa-regular fa-eye" onclick="show_hide()" id="show"></i>
        <i class="fa-regular fa-eye-slash" onclick="show_hide()" id="hide"></i>
      </div>
    </form>
    <div class="loginbtn-div">
    <input type="button" value="Login" id="form-loginbtn">
    </div>
    <div class="login-message">
      <span>Invalid username or password</span>
    </div>
    <div class="forgot-password">
      <a href="forgot_password.php">Forgot Password</a>
    </div>
    <i class="fa-solid fa-xmark" id="login-cross" onclick="loginRetrieve()"></i>
  </div>

  <div class="login-container" id=forgot-password>

    <i class="fa-solid fa-xmark" id="login-cross" onclick="loginRetrieve()"></i>
  </div>
</div>

