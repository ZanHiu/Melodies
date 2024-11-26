<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Melodies</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/form.css" rel="stylesheet" />
  <link href="<?=$baseurl?>/public/css/global.css" rel="stylesheet" />
</head>
<body>

  <!-- Main content -->
  <div class="main-content">
      <!-- Header -->
      <div class="header">
       <h1>Melodies</h1>
        <!-- <div class="auth-buttons">
          <a class="login" href="#">
            Login
          </a>
          <a class="signup" href="#">
            Sign Up
          </a>
        </div> -->
      </div>

    <!-- Join Our Platform -->
    <div class="form-section">
      <!-- <div class="left-section">
        <h2 class="title">Join Our Platform</h2>
          <p class="content">You can be one of the 
            <span class="hl-primary">members</span> of our platform by just adding some necessarily information. If you already have an account on our website, you can just hit the 
            <a class="hl-secondary" href="#">Login</a> button.
          </p>
      </div> -->
      <div class="center-section">
        <div class="tab-box">
          <button class="tab-btn active">Sign Up</button>
          <button class="tab-btn">Login</button>
          <!-- <div class="line signup"></div> -->
        </div>
        <div class="tab-content">
          <div class="content active">
            <form method="POST" action="postregister" id="register-form">
              <div class="input-group">
                <div class="input-box">
                  <label for="name">Name</label>
                  <i class="fas fa-user input-icon"></i>
                  <input type="text" id="name" name="name" placeholder="Enter your name" value="<?= $_POST['name'] ?? ""?>"/>
                </div>
                <div class="input-box">
                  <label for="password">Password</label>
                  <i class="fas fa-lock input-icon"></i>
                  <input type="password" id="password" name="password" placeholder="Enter your password" value="<?= $_POST['password'] ?? ""?>"/>
                </div>
              </div>
              <div class="input-group">
                <div class="input-box only-one">
                  <label for="email">Email</label>
                  <i class="fas fa-envelope input-icon"></i>
                  <input type="email" id="email" name="email" placeholder="Enter your email" value="<?= $_POST['email'] ?? ""?>"/>
                </div>
              </div>
              <div class="input-group">
                <div class="input-box only-one">
                  <label for="phone">Phone</label>
                  <i class="fas fa-phone input-icon"></i>
                  <input type="tel" id="phone" name="phone" placeholder="Enter your phone" value="<?= $_POST['phone'] ?? ""?>"/>
                </div>
              </div>
              <div class="input-group">
               <?php if(isset($errors) && count($errors)>0){?>
               <ul>
                   <?php foreach($errors as $error){?>
                       <li style="color:red">                                      
                               <?php echo $error?>                                       
                       </li>
                   <?php }?>
               </ul>  
               <?php }?>                            
              </div>
              <div class="input-group">
                <div class="input-box only-one">
                  <button type="submit" name="signup" id="signup">Sign Up</button>
                </div>
              </div>
              <div class="input-group">
                <div class="input-box only-one">
                  <div class="divide-line">
                    <div class="left-line"></div>
                    <p>Or</p>
                    <div class="right-line"></div>
                  </div>
                  <i class="fab fa-google button-icon"></i>
                  <button type="submit">Sign Up With Google</button>
                </div>
              </div>
            </form>
          </div>
          <!-- <div class="content">
            <form action="">
              <div class="input-group">
                <div class="input-box only-one">
                  <label for="username">Username</label>
                  <i class="fas fa-user input-icon"></i>
                  <input type="text" id="username" name="username" placeholder="Enter your username" />
                </div>
              </div>
              <div class="input-group">
                <div class="input-box only-one">
                  <label for="email">Password</label>
                  <i class="fas fa-lock input-icon"></i>
                  <input type="password" id="password" name="password" placeholder="Enter your password" />
                </div>
              </div>
              <div class="input-group">
                <div class="input-box only-one">
                  <button type="submit">Log In</button>
                </div>
              </div>
              <div class="input-group">
                <div class="input-box only-one">
                  <div class="divide-line">
                    <div class="left-line"></div>
                    <p>Or</p>
                    <div class="right-line"></div>
                  </div>
                  <i class="fab fa-google button-icon"></i>
                  <button type="submit">Log In With Google</button>
                </div>
              </div>
            </form>
          </div> -->
        </div>
      </div>
    </div>

    <?php include "views/layouts/footer.php" ?>