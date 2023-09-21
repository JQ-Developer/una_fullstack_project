<?php
$css = array('./styles/contact.css');
$current = 'contact';
include('includes/header.php'); ?>

<section id="contact-form" class="py-3">
  <div class="container">
    <h1 class="l-heading"><span>Contáctanos</span></h1>
    <p>Por favor, llene los datos para escribirnos una carta:</p>
    <form action="pricess.php">
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" />
      </div>
      <div class="form-group">
        <label for="message">Mensaje</label>
        <textarea type="text" name="message" id="message"></textarea>
      </div>
      <button type="submit" class="btn">Enviar</button>
    </form>
  </div>
</section>
<section id="contact-info" class="bg-dark">
  <div class="container">
    <div class="box">
      <i class="fas fa-hotel fa-3x"></i>
      <h3>Localización</h3>
      <p>Distrito Capital, Caracas.</p>
    </div>
    <div class="box">
      <i class="fas fa-phone fa-3x"></i>
      <h3>Número de teléfono</h3>
      <p>(617) 555-5555</p>
    </div>
    <div class="box">
      <i class="fas fa-envelope fa-3x"></i>
      <h3>Email</h3>
      <p>articulosDeLimpieza@una.com</p>
    </div>
  </div>
</section>

<?php include("includes/footer.php"); ?>