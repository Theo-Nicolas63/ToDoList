<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ToDoList</title>

    <!-- Bootstrap -->
    <link href="vue/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="vue/bootstrap-4.3.1-dist/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="bg-secondary">
<header class="navbar navbar-expand navbar-primary flex-column flex-md-row bd-navbar bg-primary">
    <a class="navbar-brand mr-0 mr-md-2" href="index.php"> <img src="vue/media/logo.png" style="width: 75px;"></a>
    <div class="navbar-nav" id="navbarNav">
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Publique<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=affichVuePrive">Privée<span class="sr-only">(current)</span></a>
            </li>
            <?php
            if(ModeleUtilisateur::est_Utilisateur()){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=seDeconnecter">Se déconnecter<span class="sr-only">(current)</span></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    </nav>
</header>

<div class="jumbotron jumbotron-fluid mt-3" style="background-image: url(media/bleu.jpg)">
    <div class="container">
        <h1 class="display-4">To Do-List</h1>
        <p>Vous souhaitez faire une To Do-List ?<br/> Vous êtes au bon endroit !</p>
    </div>
</div>
<div class="container">
    <h2>Ajouter une Tache :</h2>
    <form class="text-center bg-warning p-2 rounded" method="post" action="index.php?action=ajouterTache">
        <input type="hidden" value="<?php echo $l->getidListe();?>" name="idListe">
        <div class="row">
            <div class="col">
                <input type="text" placeholder="Nom" class="rounded" name="Nom"/>
            </div>
            <div class="col">
                <input type="text" placeholder="Cout" class="rounded" name="cout"/>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary w-75">Ajouter</button>
            </div>
        </div>
    </form>
</div>
<div class="container" id="grid-card">
    <div class="container">
        <div class="card p-2 mt-4 mb-5">
            <div class="row">
                <div class="col">
                </div>
                <div>
                    <h1><?php echo $l->getNom(); ?></h1>
                </div>
                <div class="col d-inline-flex" id="reverse">
                    <form method="post" action="index.php?action=supprimerListe" id="supprListe">
                        <input type="hidden" value="<?php echo $l->getidListe(); ?>" name="idListe">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-close"></i>
                        </button>
                    </form>
                </div>
            </div>
            <button class="btn btn-primary mt-2">Ajouter une tache</button>
            <?php foreach ($l->getListTaches() as $t) { ?>
                <div class="d-inline-flex mt-3">
                    <form method="post" action="index.php?action=checkTache">
                        <div class="d-inline-flex">
                            <div class="form-check">
                                <?php
                                if (ModeleTache::isCheckedTache($t->getIdtache()) == 1) echo '<input type="checkbox" class="form-check-input align-content-center" id="exampleCheck1" checked><input type="hidden" name="checked" value="0">';
                                else echo '<input type="checkbox" class="form-check-input align-content-center" id="exampleCheck1" name="checked" value="1">';
                                ?>
                            </div>
                            <input type="hidden" value="<?php echo $t->getIdtache();?>" name="idTache">
                            <input type="hidden" value="<?php echo $l->getidListe(); ?>" name="idListe">
                            <button class="btn btn-primary" type="submit">check</button>
                        </div>
                    </form>
                    <?php
                    if (ModeleTache::isCheckedTache($t->getIdtache()) == 1)
                        echo '<h4 class="ml-2"><del>'.$t->getNom().'</del></h4>';
                    else echo '<h4 class="ml-2">'.$t->getNom().'</h4>';?>
                    <h4 class="ml-2"><?php echo $t->getCout()."€" ?> </h4>
                    <form method="post" action="index.php?action=supprimerTache">
                        <input type="hidden" value="<?php echo $t->getIdtache(); ?>" name="idTache">
                        <button type="submit" class="btn btn-danger ml-2">
                            <i class="fa fa-close"></i>
                        </button>
                    </form>
                </div>
            <?php } ?>
        </div>
</body>