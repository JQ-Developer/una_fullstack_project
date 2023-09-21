<?php

function pdf_reports_generation()
{


    if ($_POST['data_format'] == "pdf" && $_POST['data_base'] == "warehouse") {
        ob_clean();
        redirect('./includes/pdf_reports_warehouse.php');
    } elseif ($_POST['data_format'] == "pdf" && $_POST['data_base'] == "agencias") {
        ob_clean();
        redirect('./includes/pdf_reports_agencies.php');
    } elseif ($_POST['data_format'] == "pdf" && $_POST['data_base'] == "usuarios") {
        ob_clean();
        redirect('./includes/pdf_reports_users.php');
    }
}
