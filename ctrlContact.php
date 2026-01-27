<?php require_once "functions.php";
require_once "partials/header.php";

if (isset($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['date']) && !empty($_POST['tel']) && !empty($_POST['email']) && !empty($_POST['groupe'])) {


$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$date = $_POST['date'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$id_groupe = $_POST['groupe'];
$interetsID = $_POST['interets'];

if (isset($_FILES['photo']['name'])&& !empty($_FILES['photo']['name'])) {
    $uploads_dir = 'img';
    $tmp_location = $_FILES['photo']['tmp_name'];
    $random_string = uniqid(); // generation d'une chaine de caractère aléatoire basée sur l'heure car le serveur écrase les fichiers qui ont le même nom
    $photo = $random_string.'-'.$_FILES['photo']['name']; // on génère un nouveau nom en concaténant les chaines aléatoires et le nom de l'image
    move_uploaded_file($tmp_location, "$uploads_dir/$photo"); // on déplace de l'emplacement temporaire vers le dossier de destination sur le serveur
    $newContactId = addNewContact($nom, $prenom, $date, $tel, $email, $photo, $id_groupe);
    } 
else {
    $newContactId = addNewContactWithoutPhoto($nom, $prenom, $date, $tel, $email, $id_groupe); 
    }
    // pour chaque intêret
foreach($interetsID as $interetId) {
    addInteretToContact($newContactId, $interetId);
}

header('Location: ctrlContactSuite.php');
}

else {
    ?>     
    <article class="row pt-5">
        <div class="col pt-5">
            <h1 class="text-center">Veuillez passer par le formulaire d'ajout de contact</h1>
            <a href="addContact.php" class="text-decoration-none"><h5 class="hover text-center ">Formulaire d'ajout de contact</h5></a>
            <a href="index.php" class="text-decoration-none"><h5 class="hover text-center ">Retour à la page contact</h5></a>
        </div>
    </article>

<?php } 