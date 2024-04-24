
  <div class="container1">
  <div class="login-container" id="login-form">
    <h1>Login</h1>
    <form target="_self">
      <input type="text" name="username" id="username" placeholder="Username" required>
      <div class="password-toggle">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="fa-regular fa-eye" onclick="show_hide(this)" id="show"></i>
        <i class="fa-regular fa-eye-slash" onclick="show_hide(this)" id="hide"></i>
      </div>
    </form>
    <div class="loginbtn-div">
    <input type="button" value="Login" id="form-loginbtn">
    </div>
    <div class="login-message">
      <span>Invalid username or password</span>
    </div>
    <div class="forgot-password">
      <a onclick="forgotpasswordclick()">Forgot Password</a>
    </div>
    <i class="fa-solid fa-xmark" id="login-cross" onclick="loginRetrieve()"></i>
  </div>

  <div class="login-container" id=forgot-password>
    <h1>Change Password</h1>
    <form id='forgot-form'>
  <input type="text" name="username" id="forgot-username" placeholder="Username" required>
      <div class="password-toggle">
        <input type="password" name="password" id="forgot-password-input" placeholder="Password" required>
        <i class="fa-regular fa-eye" onclick="show_hide(this)" id="show"></i>
        <i class="fa-regular fa-eye-slash" onclick="show_hide(this)" id="hide"></i>
      </div>
      <div class="password-toggle">
        <input type="password" name="cpassword" id="cpassword" placeholder="Retype-Password" required>
        <i class="fa-regular fa-eye" onclick="show_hide(this)" id="show"></i>
        <i class="fa-regular fa-eye-slash" onclick="show_hide(this)" id="hide"></i>
      </div>
      <div class="loginbtn-div"></div>
      <input type="submit" value="Change Password" id="forgotpassword-btn">
      </form>
    <i class="fa-solid fa-xmark" id="login-cross" onclick="loginRetrieve()"></i>
  </div>
</div>

