<?php require_once "functions.php";
require_once "partials/header.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user = findUserByMail($email);
    if($user) {
        $password = $_POST['password'];
        $userPassword = $user['password'];
        if(password_verify($password, $userPassword)){
            session_start();
            $_SESSION['user'] = [
                'pseudo'=>$user['pseudo'],
                'email'=>$user['email'],
                'id'=>$user['id_user']
            ];
            header('Location: index.php');
        } else {
            $pass = "Mot de passe incorrect";
            $class = 'class="text-danger"';
        }
    } else {
        $pass = "Aucun utilisateur trouvé";
        $class = 'class="text-danger"';
    }
}

?>



<section>
    <article>
        <form action="" method="post" class="d-flex align-items-center flex-column">
             <div>
                <label for="email">email</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div>    
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password"required>
            </div>
            <div <?= $class ?>>
                 <?= $pass ?>
            </div>
            <div>
                <button type="submit">envoi</button>
            </div>       
        </form>
    </article>
</section>