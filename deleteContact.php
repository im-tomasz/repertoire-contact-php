<?php require_once "functions.php";
require_once "partials/header.php";

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $id = $_GET['id'];
    $contact = getContactById($id);

    if($contact){
        $interets = getContactInteretsByContactId($contact['id_contact']); ?>

        <section class="container">
            <article class="row">
                <div class="text-center">
                    <h1>Page de suppression de contact</h1>
                </div>
                <div class="text-center">
                    <h3>Etes vous certain de vouloir supprimer le contact ?</h3>
                </div>
            </article>
            <article>
                <div class="row d-flex justify-content-center">
                    <div class="col-3">
                        <a href="index.php"><h3 class="text-center">ANNULER</h3></a>
                    </div>
                    <div class="col-3">
                        <a href="deleteContactSuite.php?id=<?= $contact['id_contact'] ?>"><h3 class="text-center">OUI</h3></a>
                    </div>
                </div>
            </article>
        </section> 
<?php 
        } else {
        echo "Contact Inconnu";
        }  ?>

<?php }
else { ?> 
     <div>
        <h3>Erreur</h3>
    </div> 
<?php }
