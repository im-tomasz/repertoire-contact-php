<?php require_once "functions.php";
require_once "partials/header.php";

$id = $_GET['id'];
$interets = getAllInterets();

$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$date = $_POST['date'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$id_groupe = $_POST['groupe'];
if(!isset($_POST['interets'])){
    $interetsContactId = null;
}else{
    $interetsContactId = $_POST['interets'];
}

if (isset($_FILES['photo']['name'])&& !empty($_FILES['photo']['name'])) {
    $uploads_dir = 'img';
    $tmp_location = $_FILES['photo']['tmp_name'];
    $random_string = uniqid();
    $photo = $random_string.'-'.$_FILES['photo']['name'];
    move_uploaded_file($tmp_location, "$uploads_dir/$photo");
    $updateContact = updateContact($nom, $prenom, $date, $tel, $email, $photo, $id_groupe, $id);
    } 
else {
    $updateContact = updateContactWithoutPhoto($nom, $prenom, $date, $tel, $email, $id_groupe, $id);
}

if(!$interetsContactId){
    deleteContactInteretByID($id);
}
else {
    deleteContactInteretByID($id);
    foreach($interetsContactId as $interetContactId){
        addInteretToContact($id, $interetContactId);
}
}

header('Location: updateContactSuccess.php');