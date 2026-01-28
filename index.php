<?php require_once "functions.php";
require_once "partials/header.php";


$contacts = getAllContacts();
?>
<main>
    <section>
        <div class="row">
            <div class="col text-center text-primary">    
                <h1 class="fw-bold py-5">Mes contacts</h1>
            </div>
        </div>
    </section>
    <section class="container">
        <article class="row">
            <?php foreach($contacts as $contact) {
                $groupe = getGroupById($contact['id_groupe']); ?>
                        <div class="col-4 text-center text-secondary py-3">
                            <div class="card">
                                <div class="ratio ratio-1x1">
                                    <img src="img/<?php echo $contact['photo']?>" alt="" class="card-img-top img-fluid ">
                                </div>
                                <div class="card-body">
                                    <div class="card-title mb-3">
                                        <a class="text-decoration-none" href="single.php?id=<?php echo $contact['id_contact'] ?>"><h2 class="fs-italic"><?php echo htmlspecialchars($contact['nom']) ." ". $contact['prenom']?></h2></a>
                                    </div>
                                    <div class="card-text text-center">
                                        <p class="m-1 text-nowrap"><?php echo $contact['email'] ?></p>
                                        <p class="m-1"><span class="text-secondary"> date de naissance :</span> <?php echo $contact['dateNaissance']?></p>
                                        <p class="m-1"><span class="text-secondary"> téléphone :</span> 0<?php echo $contact['telephone']?></p>
                                        <p class="mb-3"><span class="text-secondary"> identifiant :</span> <?php echo $contact['id_contact']?></p>
                                        <h5 class="py-2">Groupe :</h5> 
                                        <a class="text-decoration-none" href="groupe.php?id=<?php echo $contact['id_groupe'] ?>"><p><?php echo $groupe['nomGroupe'] ?></p></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
            <?php } ?>
        </article>
        <article>
            <div class="text-center p-3 row d-flex justify-content-center align-items-center">
                <a href="addContact.php" class="text-decoration-none col-2"><h4 class="bg-primary text-white rounded-3 p-2"> Ajouter un contact </h4></a>
            </div>
        </article>
    </section>                    
            
</main>


<?php require_once "partials/footer.php";