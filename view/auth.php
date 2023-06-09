<?php

include_once "../includes.php";

$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$password = isset($_POST['password']) ? $_POST['password'] : NULL;

$error = isset($_COOKIE['error']) ? $_COOKIE['error'] : NULL;

$email_error = isset($_COOKIE['email']) ? $_COOKIE['email'] : NULL;

$main = new MainController();
if (isset($email) and isset($password)) {
  $products = $main->login($email, $password);
}

?>

<!DOCTYPE html>
<html>

<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Se connecter</title>
  <link rel="stylesheet" type="text/css" href="./Semantic ui/Semantic-UI/semantic.css">

  <script src="assets/library/jquery.min.js"></script>
  <script src="../dist/components/form.js"></script>
  <script src="../dist/components/transition.js"></script>

  <style type="text/css">
    body {
      background-color: #DADADA;
    }

    body>.grid {
      height: 100%;
    }

    .image {
      margin-top: -100px;
    }

    .column {
      max-width: 450px;
    }
  </style>
  <script>
    $(document)
      .ready(function() {
        $('.ui.form')
          .form({
            fields: {
              email: {
                identifier: 'email',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter your e-mail'
                  },
                  {
                    type: 'email',
                    prompt: 'Please enter a valid e-mail'
                  }
                ]
              },
              password: {
                identifier: 'password',
                rules: [{
                    type: 'empty',
                    prompt: 'Please enter your password'
                  },
                  {
                    type: 'length[6]',
                    prompt: 'Your password must be at least 6 characters'
                  }
                ]
              }
            }
          });
      });
  </script>
</head>

<body>

  <div class="ui middle aligned center aligned grid">
    <div class="column">
      <a href="./index.php" class="ui blue image header">
        <img src="../assets/LOGO MJI.png" class="image">
        <div class="content">
          Se connecter à votre compte
        </div>
      </a>
      <form action="" method="POST" class="ui large form">
        <div class="ui stacked segment">
          <?php if(isset($_COOKIE['email'])) { ?>
            <div class="ui red message">
              Email ou mot de passe incorrect
            </div>
          <?php } ?>

          <div class="field">
            <div class="ui left icon input">
              <i class="user icon"></i>
              <?php 
                if(isset($_COOKIE['email'])) {
              ?>
                <input type="email" name="email" placeholder="Addresse e-mail" value="<?= $_COOKIE['email'] ?>">
              <?php
                } else {
              ?>
              <input type="email" name="email" placeholder="Addresse e-mail">
              <?php } ?>
            </div>
          </div>
          <div class="field">
            <div class="ui left icon input">
              <i class="lock icon"></i>
              <input type="password" name="password" placeholder="Mot de passe">
            </div>
          </div>
          <button type="submit" class="ui fluid large blue submit button">
            Se connecter
          </button>
        </div>

        <div class="ui error message"></div>

      </form>

      <div class="ui message">
        C'est votre première fois ? <a href="#">Créer un compte</a>
      </div>
    </div>
  </div>

</body>

</html>