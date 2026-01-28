<?php require_once "functions.php";
require_once "partials/header.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    userSignUp($email, $pseudo, $hashedPassword);
}
?>



<section>
    <article>
        <form action="" method="post" class="d-flex align-items-center flex-column">
            
            <div>
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" required>
            </div>
             <div>
                <label for="email">email</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div>    
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password"required>
            </div>
            <div>
                <button type="submit">envoi</button>
            </div>       
        </form>
    </article>
</section>