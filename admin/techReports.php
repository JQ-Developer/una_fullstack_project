<?php
$css = array('../styles/admin.css');
$current = 'profile';
$current_nav = 'techReports';
include('../includes/header.php');
include('./includes/nav_tech.php');
include('./includes/excel_reports.php');
include('./includes/pdf_reports.php');
if (!$session->is_signed_in() || $current_permissions != "tech" || $current_state != 1) {
  redirect("../index.php");
}
?>
<?php
date_default_timezone_set('America/Caracas');
if (isset($_POST['export_data'])) {

  if ($_POST['data_format'] == "excel") {
    ob_clean();
    excel_reports_generation();
  } elseif ($_POST['data_format'] == "pdf") {
    pdf_reports_generation();
  }
}
?>

<!-- ================ reports  ================= -->
<div class="container">
  <h1 class="py-3">Generación de reportes</h1>
  <p>Genera y guarda reportes.</p>
  <div class="reports-container">
    <form action="" method="post">


      Información generada a la zona horaria para Caracas. UTC -4.
      Venezuelan Standard Time (VET).

      <div class="reports-selection">
        <div class="reports-description">
          <div>Tipo de reporte:</div>
          <div>Base de datos:</div>
        </div>
        <div class="reports-options">
          <div class="option">
            <select name="data_format" id="">
              <option value="excel">Excel</option>
              <option value="pdf">PDF</option>

            </select>
          </div>
          <div class="option">
            <select name="data_base" id="">
              <option value="agencias">Agencias</option>
              <option value="warehouse">Almacen</option>
            </select>
          </div>
        </div>
      </div>
      <div class="reports-button">
        <button type="submit" class="btn" name="export_data">Generar Reporte</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</body>

</html>