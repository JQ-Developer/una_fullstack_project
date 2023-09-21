<?php
$css = array('./styles/showcase.css');
$current = 'index';
include('includes/header.php'); ?>


<div id="showcase">
    <div class="showcase-content">
        <h1><span class="text-primary">Confianza</span> Eficiencia</h1>

        <p class="lead">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam quis
            provident quia maxime reiciendis labore?
        </p>
        <a class="btn" href="about.php">Conócenos</a>
    </div>
</div>
<section id="info" class="bg-dark">
    <div class="img-inf"></div>
    <div class="inf-ph">
        <h2>
            <span class="text-primary"> Nuestros</span> mejores productos para ti
        </h2>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque eos
            numquam molestias velit, tempore quaerat earum modi repudiandae,
            eveniet facere, debitis nam? Fugiat nobis, unde ullam enim esse
            molestias voluptatum! Et ratione repudiandae eligendi autem omnis sed
            dicta suscipit eaque!
        </p>

        <a class="btn btn-light" href="about.php">Read More</a>
    </div>
</section>
<section id="features">
    <div class="box bg-light">
        <i class="fas fa-hotel fa-3x"></i>
        <h3>Profesionalismo</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea neque,
            placeat architecto corrupti repudiandae officia.
        </p>
    </div>
    <div class="box bg-primary">
        <i class="fas fa-solid fa-broom fa-3x"></i>
        <h3>Limpieza efectiva</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea neque,
            placeat architecto corrupti repudiandae officia.
        </p>
    </div>
    <div class="box bg-light">
        <i class="fas fa-solid fa-pump-soap fa-3x"></i>
        <h3>Espumantes</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea neque,
            placeat architecto corrupti repudiandae officia.
        </p>
    </div>
</section>
<div class="clr"></div>

<?php include("includes/footer.php"); ?>