<?php

require_once "connexion.php";

function getAllContacts(){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact ORDER BY nom";
    $stmt = $dbh->query($query);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contacts;
}

function getGroupById($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM groupe WHERE id_groupe = $id";
    $stmt = $dbh->query($query);
    $group = $stmt->fetch(PDO::FETCH_ASSOC);
    return $group;
}

function getContactById($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact WHERE id_contact = $id";
    $stmt = $dbh->query($query);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    return $contact;
}

function getContactsByGroupId($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact JOIN groupe ON contact.id_groupe = groupe.id_groupe WHERE contact.id_groupe = $id";
    $stmt = $dbh->query($query);
    $contact = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contact;
}

function getInteretById($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM interet WHERE id_interet = $id";
    $stmt = $dbh->query($query);
    $interet = $stmt->fetch(PDO::FETCH_ASSOC);
    return $interet;
}

function getContactsByInteretId($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact AS c JOIN contact_interet AS ci ON c.id_contact = ci.id_contact WHERE ci.id_interet = $id";
    $stmt = $dbh->query($query);
    $interet = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $interet;
}

function getContactInteretsByContactId($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM interet AS i JOIN contact_interet AS ci ON ci.id_interet = i.id_interet WHERE ci.id_contact= $id";
    $stmt = $dbh->query($query);
    $interet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $interet;
}