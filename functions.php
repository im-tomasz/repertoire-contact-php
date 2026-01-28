<?php

require_once "connexion.php";

function getAllContacts(){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact ORDER BY nom";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contacts;
}

function getAllGroups(){
    $dbh = dbconnect();
    $query = "SELECT * FROM groupe";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $groupes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $groupes;
}

function getGroupById($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM groupe WHERE id_groupe = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    $group = $stmt->fetch(PDO::FETCH_ASSOC);
    return $group;
}

function getContactById($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact WHERE id_contact = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    return $contact;
}

function getContactsByGroupId($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact JOIN groupe ON contact.id_groupe = groupe.id_groupe WHERE contact.id_groupe = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    $contact = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contact;
}

function getInteretById($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM interet WHERE id_interet = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    $interet = $stmt->fetch(PDO::FETCH_ASSOC);
    return $interet;
}

function getContactsByInteretId($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact AS c JOIN contact_interet AS ci ON c.id_contact = ci.id_contact WHERE ci.id_interet = :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    $interet = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $interet;
}

function getContactInteretsByContactId($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM interet AS i JOIN contact_interet AS ci ON ci.id_interet = i.id_interet WHERE ci.id_contact= :id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $id); 
    $stmt->execute();
    $interet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $interet;
}


function addNewContact($nom, $prenom, $date, $tel, $email, $photo, $id_groupe){
    $dbh = dbconnect();
    $query = "INSERT INTO `contact` (`nom`, `prenom`, `dateNaissance`, `telephone`, `email`, `photo`,`id_groupe`) 
    VALUES (:nom, :prenom, :date, :tel, :email, :photo, :id_groupe);";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':tel', $tel );
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':id_groupe', $id_groupe);
    $stmt->execute();
    $contact = $dbh->lastInsertId();
    return $contact;
}

function getAllInterets(){
    $dbh = dbconnect();
    $query = "SELECT * FROM interet";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $interets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $interets;
}

function addInteretToContact($id_contact, $id_interet) {
    $dbh = dbconnect();
    $query = "INSERT INTO `contact_interet` (`id_contact`, `id_interet`) 
    VALUES (:id_contact, :id_interet);";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id_contact', $id_contact);
    $stmt->bindParam(':id_interet', $id_interet);
    $stmt->execute();
    $interet = $dbh->lastInsertId();
    return $interet;
}

function deleteContactInteretByID($id_contact) {
    $dbh = dbconnect();
    $query = "DELETE FROM `contact_interet` WHERE `contact_interet`.`id_contact` = :id_contact";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id_contact', $id_contact);
    $stmt->execute();
    }

function deleteContactByID($id_contact) {
    $dbh = dbconnect();
    $query = "DELETE FROM `contact` WHERE `id_contact` = :id_contact";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id_contact', $id_contact);
    $stmt->execute();
    }

function updateContact($nom, $prenom, $date, $tel, $email, $photo, $id_groupe, $id_contact){
    $dbh = dbconnect();
    $query ="UPDATE `contact` 
            SET `nom` = :nom, `prenom` = :prenom, `dateNaissance` = :date, `telephone` = :tel, `email` = :email, `photo` = :photo, `id_groupe` = :id_groupe 
            WHERE `contact`.`id_contact` = :id_contact";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':id_groupe', $id_groupe);
    $stmt->bindParam(':id_contact', $id_contact);
    $stmt->execute();
    $contact = $dbh->lastInsertId();
    return $contact;
}

function addNewContactWithoutPhoto($nom, $prenom, $date, $tel, $email, $id_groupe){
    $dbh = dbconnect();
    $query = "INSERT INTO `contact` (`nom`, `prenom`, `dateNaissance`, `telephone`, `email`, `id_groupe`) 
    VALUES (:nom, :prenom, :date, :tel, :email, :id_groupe);";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':tel', $tel );
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id_groupe', $id_groupe);
    $stmt->execute();
    $contact = $dbh->lastInsertId();
    return $contact;
}

function updateContactWithoutPhoto($nom, $prenom, $date, $tel, $email, $id_groupe, $id_contact){
    $dbh = dbconnect();
    $query ="UPDATE `contact` 
            SET `nom` = :nom, `prenom` = :prenom, `dateNaissance` = :date, `telephone` = :tel, `email` = :email, `id_groupe` = :id_groupe 
            WHERE `contact`.`id_contact` = :id_contact";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id_groupe', $id_groupe);
    $stmt->bindParam(':id_contact', $id_contact);
    $stmt->execute();
    $contact = $dbh->lastInsertId();
    return $contact;
}

function userSignUp($email, $pseudo, $password){
    $dbh=dbconnect();
    $query="INSERT INTO user (email, pseudo, password)
            VALUES (:email, :pseudo, :password);";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}

function findUserByMail($email){
    $dbh=dbconnect();
    $query="SELECT * FROM user WHERE email = :email";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function findUserPasswordByMail($email){
    $dbh=dbconnect();
    $query="SELECT 'password' FROM user WHERE email = :email";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $password = $stmt->fetch(PDO::FETCH_ASSOC);
    return $password;
}