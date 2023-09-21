<?php
ob_start();
require_once("../../admin/includes/init.php");

date_default_timezone_set('America/Caracas');
$current_permissions = show_user_permissions($session->user_id);
$current_state = show_user_state($session->user_id);

echo ($current_permissions . $current_state);
if (!$session->is_signed_in() || $current_permissions === "user" || $current_state != 1) {
    redirect("/UNA/signin.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Welcome to the most cool hotel in Boston Massachusetts" />
    <meta name="keywords" content="articulos, hogar, limpieza" />
    <title>Articulos De Limpieza | UNA</title>
    <style>
        Html,
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7em;
        }

        h1,
        h2.h3 {
            padding-bottom: 20px;
        }


        body {
            list-style: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table thead td {
            font-weight: 600;
        }

        table tr {
            color: black;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7em;

        }

        table tr:last-child {
            border-bottom: none;
        }


        table tr td {
            padding: 10px;

        }

        table tr td:last-child {
            text-align: end;
        }

        table tr td:nth-child(2) {
            text-align: end;
        }

        table tr td:nth-child(3) {
            text-align: center;
        }
    </style>
    <script src="https://kit.fontawesome.com/13d2a8b214.js" crossorigin="anonymous"></script>

</head>

<body>
    <div>
        <div>
            <h2>Lista de productos en el almacén</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Código</td>
                    <td>Disponibilidad</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $merch_list = Merch::find_all_merch();
                foreach ($merch_list as $merch) {
                    echo '<tr>';
                    echo '<td>' . $merch->merch_name . '</td>';
                    echo '<td> $ ' . $merch->price . '</td>';
                    echo '<td>' . $merch->code . '</td>';
                    echo '<td><span>' . $merch->status . '</span></td>';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>

<?php



$html = ob_get_clean();
//echo ($html);

// include autoloader
require_once '../lib/dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter');

// Render the HTML as PDF
$dompdf->render();


$dateTimeFormatted = date('d-m-Y_H-i-s');

// Genera el nombre del archivo con el formato deseado
$fileName = 'almacen_' . $dateTimeFormatted . '.pdf';

// Output the generated PDF to Browser
$dompdf->stream($fileName, array("Attachment" => true));

?>