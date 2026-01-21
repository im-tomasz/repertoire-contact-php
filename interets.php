<?php require_once "functions.php";
require_once "partials/header.php";

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $contacts = getContactsByInteretId($_GET['id']);
    $interets = getInteretById($_GET['id']); 
 ?>

    <h1 class="text-center fw-bold text-primary py-5"><?= $interets['nomInteret'] ?></h1>

    <section class="container">
        <article class="row d-flex justify-content-center">
            <?php foreach($contacts as $contact) {
                $groupe = getGroupById($contact['id_groupe']); ?>
                <div class="col-4 text-center text-secondary py-3">
                    <div class="card">
                        <img src="img/<?php echo $contact['id_contact']?>.jpg" alt="" class="card-img-top">
                        <div class="card-body">
                            <div class="card-title mb-3">
                                <a class="text-decoration-none" href="single.php?id=<?php echo $contact['id_contact'] ?>"><h2 class="fs-italic"><?php echo $contact['nom'] ." ". $contact['prenom']?></h2></a>
                            </div>
                            <div class="card-text">
                                <p class="m-1"><?php echo $contact['email'] ?></p>
                                <p class="m-1"><span class="text-secondary">date de naissance : </span> <?php echo $contact['dateNaissance']?></p>
                                <p class="m-1"><span class="text-secondary">téléphone : </span> 0<?php echo $contact['telephone']?></p>
                                <p class="mb-3"><span class="text-secondary">identifiant : </span> <?php echo $contact['id_contact']?></p>
                                <a class="text-decoration-none" href="groupe.php?id= <?= $contact['id_groupe'] ?>"><p>groupe : <?php echo $groupe['nomGroupe'] ?></p></a>
                            </div>
                        </div>
                    </div>
                </div>    
            <?php } ?> 
        </article>
    </section>    
<?php } ?>

    <section>
        <article class="text-center">
            <a href="index.php"><p>Retour à la page contacts</p></a>
        </article>
    </section>