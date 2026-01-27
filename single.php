<?php require_once "functions.php";
require_once "partials/header.php";

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $id = $_GET['id'];
    $contact = getContactById($id);
    $groupe = getGroupById($contact['id_groupe']);
    $interets = getContactInteretsByContactId($contact['id_contact']);
    if($contact){ ?>
            <section class="container">
                <div class="row text-center d-flex justify-content-center pt-5">
                    <div class="col-4 d-flex justify-content-center">
                        <a class="col-4" href="index.php">
                            <p class="fs-5 bg-primary text-white fw-semibold rounded-3 p-2 d-flex align-items-center justify-content-center">
                                <svg class="pe-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                                </svg>
                                Retour
                            </p>
                        </a>
                    </div>
                </div>
                <h1 class="text-center fw-bold text-primary pb-5">Page du contact</h1>
            </section>
        <main>
            <section class="container">
                <article class="row d-flex justify-content-center">
                    <div class="col-4 text-center text-secondary">
                            <div class="card">
                                <img src="img/<?php echo $contact['photo']?>" alt="" class="card-img-top img-fluid">
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


<div class="row pt-3 d-flex justify-content-center">
    <a class="col-2 text-decoration-none" href="deleteContact.php?id=<?php echo $contact['id_contact'] ?>"><p class="text-center text-danger fs-6"> Supprimer un contact </p></a>
</div>
<div class="row text-center pt-1 d-flex justify-content-center">
    <a class="col-2" href="updateContact.php?id=<?= $contact['id_contact'] ?>"><p class="fs-5 bg-success text-white fw-semibold rounded-3 p-2">Modifier contact</p></a>
</div>
<div class="row text-center pt-1 d-flex justify-content-center">
    <a class="col-3" href="index.php"><p class="fs-5 bg-primary text-white fw-semibold rounded-3 p-2">Retour à la page principale</p></a>
</div>