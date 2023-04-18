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

<div class="jumbotron jumbotron-fluid mt-3" id="fond">
    <div class="container">
        <h1 class="display-4">To Do-List</h1>
        <p>Vous souhaitez faire une To Do-List ?<br/> Vous êtes au bon endroit !</p>
    </div>
</div>
<div class="container">
    <h2>Ajouter une liste publique :</h2>
    <form class="text-center" method="post" action="index.php?action=ajouterListePublique">
        <input type="text" placeholder="Entrez le nom de la nouvelle liste" class="rounded" name="Nom"/>
        <button type="submit" class="addBtn font-weight-bold text-white">Ajouter</button>
    </form>
</div>
<div class="container" id="grid-card">
    <div class="row">
        <?php $i = 0;
        foreach ($listPub as $l) { ?>
            <div class="col">
                <div class="card p-2 mt-4 mb-5" id="liste">
                    <div class="row">
                        <div class="col">
                            <h2><?php echo $l->getNom(); ?></h2>
                        </div>
                        <div class="col d-inline-flex" id="reverse">
                            <form method="post" action="index.php?action=supprimerListe" id="supprListe">
                                <input type="hidden" value="<?php echo $l->getidListe();?>" name="idListe">
                                <button type="submit" class="btn btn-danger w-50">
                                    <i class="fa fa-close"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php $y =0;
                    foreach ($l->getListTaches() as $t) {
                        if ($y == 3)
                            break;
                        ?>
                        <div class="d-inline-flex mt-3">
                            <h4><?php echo $t->getNom(); ?></h4>
                            <h4 class="ml-2"><?php echo $t->getCout()."€" ?> </h4>
                        </div>
                        <?php
                        $y++;
                    } ?>
                    <form class="mt-3" method="post" action="index.php?action=affichTache">
                        <input type="hidden" value="<?php echo $l->getidListe();?>" name="idListe">
                        <button class="btn btn-primary w-100" type="submit">Plus de détails</button>
                    </form>
                </div>
            </div>
            <?php $i++;
            if ($i == 3) {
                $i = 0;
                echo '</div><div class="row">';
            }
        }
        ?>
</body>