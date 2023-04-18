<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
  <meta charset="utf-8">

  <title>Connexion</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

  <!-- Bootstrap core CSS -->
    <link href="vue/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vue/bootstrap-4.3.1-dist/css/style.css" rel="stylesheet">
    <link href="vue/bootstrap-4.3.1-dist/css/signin.css" rel="stylesheet" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>
<body class="text-center">
  <form class="form-signin" action="index.php?action=seconnecter" method="post">
    <a href="index.php">
      <img class="mb-4" src="vue/media/logo.png" alt="" width="100" height="100">
    </a>
    <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</br>pour accéder à vos listes privées</h1>
    <label for="inputEmail" class="sr-only">Adresse email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Adresse email" required autofocus name="mail">
    <label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required name="mdp">
    <button class="btn btn-lg btn-primary btn-block" type="submit">
      Se connecter
    </button>
  </form>
</body>
</html>
