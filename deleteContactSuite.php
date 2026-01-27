<?php require_once "functions.php";
require_once "partials/header.php";

if(isset($_GET['id'])&& !empty($_GET['id'])){
    $id = $_GET['id'];
    $contact = getContactById($id);
    
    if($contact){
        $interets = getContactInteretsByContactId($contact['id_contact']); 
        deleteContactInteretByID($id);
        deleteContactByID($id);

        header("Location: index.php");
    } else {
            echo "Contact Inconnu";
    }
}
else {
    echo "Erreur";
}