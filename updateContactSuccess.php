<?php require_once "functions.php";
require_once "partials/header.php" ?>

<section class="container pt-5">
    <article class="row pt-5">
        <div class="col pt-5">
            <h1 class="pt-5 text-center animate__animated animate__bounceIn "><span class="fade-color"> Contact modifié !</span> </h1>
        </div>
    </article>
    <article class="row pt-5">
      <div class="col pt-5">
        <a href="index.php" class="text-decoration-none"><h5 class="hover text-center fade-black">Retour à la page principale</h5></a>
      </div>
    </article>
</section>





<script>
    window.addEventListener('load', () => {
      const jsConfetti = new JSConfetti();

      jsConfetti.addConfetti({
        confettiNumber: 120,
        confettiRadius: 6,
      });
    });
  </script>

  <?php require_once "partials/footer.php";