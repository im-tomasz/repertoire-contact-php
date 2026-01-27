<?php require_once "functions.php";
require_once "partials/header.php"; 
$interets = getAllInterets(); 
$groupes = getAllGroups();?>

<section class="container">
    <article>
        <div class="row text-center d-flex justify-content-center  pt-3">
            <div class="col-4 d-flex justify-content-center">
                <a class="col-4 d-flex" href="index.php">
                    <p class="fs-5 bg-primary text-white fw-semibold rounded-3 p-2 d-flex align-items-center justify-content-center">
                        <svg class="pe-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                        </svg>
                        Retour
                    </p>
                </a>
            </div>
        </div>
        <form action="ctrlContact.php" method="post" enctype="multipart/form-data">

            <div class="row pt-3 d-flex justify-content-center">
                <div class="col-3 d-flex flex-column text-center">
                    <label for="nom" class="text-primary fs-3">Nom</label>
                    <input type="text" id="nom" name="nom" class="rounded-1 border border-secondary text-center form-height" required>
                </div>
                <div class="col-3 d-flex flex-column text-center">
                    <label for="prenom" class="text-primary fs-3">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="rounded-1 border border-secondary text-center form-height" required>
                </div>
            </div>

            <div class="row pt-3  d-flex justify-content-center">
                <div class="col-3 d-flex flex-column text-center">
                    <label for="date" class="text-primary fs-3">Date de naissance</label>
                    <input type="date" id="date" name="date" class="rounded-1 border border-secondary text-center form-height" required>
                </div>
                <div class="col-3 d-flex flex-column text-center">
                    <label for="tel" class="text-primary fs-3">Téléphone</label>
                    <input type="tel" id="tel" name="tel" class="rounded-1 border border-secondary text-center form-height" required>
                </div>
            </div>

            <div class="row pt-3  d-flex justify-content-center">
                <div class="col-3 d-flex flex-column text-center">
                    <label for="email" class="text-primary fs-3">Email</label>
                    <input type="email" id="email" name="email" class="rounded-1 border border-secondary text-center form-height" required>
                </div>    
                <div class="col-3 d-flex flex-column text-center">
                    <label for="groupe" class="text-primary fs-3">Choisissez un groupe :</label>
                    <select name="groupe" id="groupe" class="bg-light rounded-1 border border-secondary text-center form-height">
                        <option value="" disabled selected>groupe...</option>
                        <?php foreach($groupes as $groupe){ ?>
                        <option value="<?= $groupe['id_groupe'] ?>"><?= $groupe['nomGroupe'] ?></option>
                    <?php }  ?>
                    </select>
                </div>    
            </div>
             <div class="d-flex justify-content-center pt-5">
                <input type="file" class="form-control w-50" name="photo">
            </div>
            <div class="row pt-4">
                <div class="col d-flex justify-content-center">
                    <p class="text-primary fs-5">Selectionnez un ou plusieurs centres d'intêrets</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5 p-3 rounded-4 border border-primary">
                    <?php foreach($interets as $interet){ ?>
                    <div class="row d-flex justify-content-center">
                        <div class="col d-flex justify-content-start flex-nowrap text-center">
                            <input type="checkbox" name='interets[]' id="interet" value="<?= $interet['id_interet'] ?>">
                            <label for="interet" class="fs-5" >&nbsp<?= $interet['nomInteret'] ?></label>
                        </div>  
                    </div>    
                    <?php } ?>
                </div>
            </div>            
            <div class="row d-flex justify-content-center pt-4">   
                <div class="col-2 d-flex justify-content-center">  
                    <button type="submit" class="bg-primary text-white border border-0  rounded-3 fs-4 fw-semibold p-2">ENVOYER</button>
                </div>    
            </div>
        </form>
    </article>
</section>