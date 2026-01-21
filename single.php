<?php require_once "functions.php";
require_once "partials/header.php";

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $id = $_GET['id'];
    $contact = getContactById($id);
    $groupe = getGroupById($contact['id_groupe']);
    $interets = getContactInteretsByContactId($contact['id_contact']);
    if($contact){ ?>
            <section class="container">
                <h1 class="text-center fw-bold text-primary py-5">Page du contact</h1>
            </section>
        <main>
            <section class="container">
                <article class="row d-flex justify-content-center">
                    <div class="col-4 text-center text-secondary">
                            <div class="card">
                                <img src="img/<?php echo $contact['id_contact']?>.jpg" alt="" class="card-img-top">
                                <div class="card-body">
                                    <div class="card-title mb-3">
                                        <a class="text-decoration-none" href="single.php?id=<?php echo $contact['id_contact'] ?>"><h2 class="fs-italic"><?php echo $contact['nom'] ." ". $contact['prenom']?></h2></a>
                                    </div>
                                    <div class="card-text">
                                        <p class="m-1"><?php echo $contact['email'] ?></p>
                                        <p class="m-1"> <span class="text-secondary"> date de naissance : </span> <?php echo $contact['dateNaissance']?></p>
                                        <p class="m-1"> <span class="text-secondary"> téléphone : </span> 0<?php echo $contact['telephone']?></p>
                                        <p class="mb-3"> <span class="text-secondary"> identifiant : </span> <?php echo $contact['id_contact']?></p>
                                        <h5 class="py-2">Groupe :</h5> 
                                        <a class="text-decoration-none" href="groupe.php?id=<?php echo $contact['id_groupe'] ?>"><p><?php echo $groupe['nomGroupe'] ?></p></a>
                                        <h5 class="py-2">Interets :</h5>                                        
                                        <?php foreach($interets as $interet) { ?>
                                        <a class="text-decoration-none" href="interets.php?id=<?= $interet['id_interet'] ?> "><p><?= $interet['nomInteret'] ?></p></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                </article>
            </section>
        </main>
    <?php }else{
        echo "contact inconnu";
    } 
}else{
    echo "erreur";
} ?>

<div class="text-center">
    <a href="index.php"><p>Retour à la page contacts</p></a>
</div>