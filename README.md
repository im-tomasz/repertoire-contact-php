# 🤝 Répertoire Contact PHP

## 🚀 Description

Ce projet est une petite application web permettant de gérer un carnet de contacts.  
L'objectif est d’apprendre les bases du PHP, la manipulation de bases de données via PDO, et la mise en place d’un CRUD dans un environnement conteneurisé avec Docker.

L’application permet de créer, consulter, modifier et supprimer des contacts, tout en associant des groupes et des centres d’intérêts à chaque utilisateur.

---

## 🛠️ Stack technique

- **PHP (PDO)** : logique back-end et interaction avec la base de données
- **MySQL** : stockage des données (contacts, groupes, intérêts, utilisateurs)
- **Docker** : conteneurisation de la base de données
- **PhpMyAdmin** : interface de gestion de la base
- **HTML / CSS / Bootstrap** : affichage et mise en forme des interfaces

---

## 🗂️ Structure & parties importantes

- **Fonctions métier (`functions.php`)** : centralisation des requêtes SQL (CRUD complet, relations, utilisateurs)
- **Contrôleurs PHP (ex: ctrlContact.php, updateContactSuite.php, deleteContactSuite.php)** : traitement des formulaires et logique applicative
- **Pages principales (index.php, single.php)** : affichage des contacts et des détails
- **Gestion des relations (groupes / intérêts)** : jointures SQL et *tables intermédiaires* (`contact_interet`)
- **Authentification utilisateur (userConnexion.php, userRegister.php)** : gestion des sessions et sécurité des mots de passe
- **Docker (`docker-compose.yaml`)** : mise en place de l’environnement MySQL + PhpMyAdmin

---

## 🎯 Compétences mises en application

- Création d’un CRUD complet en PHP
- Utilisation de PDO avec requêtes préparées
- Gestion des relations SQL (jointures, tables pivot)
- Traitement de formulaires HTML (POST / GET)
- Upload et gestion de fichiers (images)
- Gestion des sessions utilisateur (authentification)
- Sécurisation des mots de passe (hash + vérification)
- Mise en place d’un environnement Docker

---

## ✨ Exemples de code pertinents

**1. Récupération des contacts en base via PDO  
(`functions.php`)**

```php
function getAllContacts(){
    $dbh = dbconnect();
    $query = "SELECT * FROM contact ORDER BY nom";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contacts;
}
```
> montre l’utilisation de PDO avec requêtes préparées pour récupérer des données depuis la base.

---

**2. Ajout d’un contact avec gestion des relations et upload de fichier  
(`ctrlContact.php`)**

```php
if (isset($_FILES['photo']['name'])&& !empty($_FILES['photo']['name'])) {
    $uploads_dir = 'img';
    $tmp_location = $_FILES['photo']['tmp_name'];
    $random_string = uniqid();
    $photo = $random_string.'-'.$_FILES['photo']['name'];
    move_uploaded_file($tmp_location, "$uploads_dir/$photo");
    $newContactId = addNewContact($nom, $prenom, $date, $tel, $email, $photo, $id_groupe);
} 
else {
    $newContactId = addNewContactWithoutPhoto($nom, $prenom, $date, $tel, $email, $id_groupe); 
}

foreach($interetsID as $interetId) {
    addInteretToContact($newContactId, $interetId);
}
```
> gère à la fois l’upload d’image, l’insertion en base et l’association des centres d’intérêt.

---

**3. Suppression d’un contact et de ses relations  
(`deleteContactSuite.php`)**

```php
deleteContactInteretByID($id);
deleteContactByID($id);

header("Location: index.php");
```
> suppression complète en nettoyant d’abord les relations avant de supprimer le contact.

---

**4. Mise à jour d’un contact avec gestion conditionnelle des données  
(`updateContactSuite.php`)**

```php
if (isset($_FILES['photo']['name'])&& !empty($_FILES['photo']['name'])) {
    $updateContact = updateContact($nom, $prenom, $date, $tel, $email, $photo, $id_groupe, $id);
} 
else {
    $updateContact = updateContactWithoutPhoto($nom, $prenom, $date, $tel, $email, $id_groupe, $id);
}

deleteContactInteretByID($id);

foreach($interetsContactId as $interetContactId){
    addInteretToContact($id, $interetContactId);
}
```
> met en évidence une logique métier complète : mise à jour conditionnelle + gestion des relations.

---

**5. Authentification utilisateur avec vérification sécurisée du mot de passe  
(`userConnexion.php`)**

```php
if(password_verify($password, $userPassword)){
    session_start();
    $_SESSION['user'] = [
        'pseudo'=>$user['pseudo'],
        'email'=>$user['email'],
        'id'=>$user['id_user']
    ];
    header('Location: index.php');
}
```
> utilise `password_verify` pour comparer un mot de passe hashé et sécuriser l’authentification.

---

**6. Configuration Docker pour la base de données  
(`docker-compose.yaml`)**

```yaml
services:
  mysql:
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: rootpassword
      MYSQL_DATABASE: contacts
      MYSQL_USER: greg
      MYSQL_PASSWORD: greg

  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    environment:
      PMA_HOST: mysql
```
> permet de déployer un environnement de développement avec MySQL et PhpMyAdmin.
