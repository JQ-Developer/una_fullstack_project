<?php
$css = array('./styles/about.css');
$current = 'about';
include('includes/header.php'); ?>

<section id="about-info" class="bg-light">
  <div class="container py-3">
    <div class="info-left">
      <h1 class="l-heading">
        <span class="text-primary">Sobre</span> Artículos de Limpieza
      </h1>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit.
        Repellendus omnis beatae atque voluptatum laborum consequuntur in.
        Quod dolorem magnam excepturi vero fuga dolorum, consequatur
        eligendi, perferendis, aliquam reiciendis fugit atque!
      </p>
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Reprehenderit corporis quas sit inventore alias, quia cupiditate
        amet nobis saepe a?
      </p>
    </div>
    <div class="info-right">
      <img src="./img/photo-2.jpg" alt="hotel" />
    </div>
  </div>
</section>

<div class="clr"></div>
<div id="testimonials" class="py-3">
  <div class="container">
    <h2 class="l-heading py-1 bg-dark">¿Qué dicen nuestros clientes?</h2>
    <div class="testimonial bg-primary">
      <img src="./img/person-1.jpg" alt="person" />
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae
        quasi excepturi sint exercitationem illum dolores consequuntur porro
        impedit veniam laborum. Distinctio magni atque eligendi earum saepe
        aperiam amet dolorum. Assumenda soluta molestias natus optio nam
        aliquid labore cumque ut repellendus?
      </p>
    </div>
    <div class="testimonial bg-primary">
      <img src="./img/person-2.jpg" alt="person" />
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae
        quasi excepturi sint exercitationem illum dolores consequuntur porro
        impedit veniam laborum. Distinctio magni atque eligendi earum saepe
        aperiam amet dolorum. Assumenda soluta molestias natus optio nam
        aliquid labore cumque ut repellendus?
      </p>
    </div>
  </div>
</div>

<?php include("includes/footer.php"); ?>