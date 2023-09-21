<?php
ob_start();
require_once("../../admin/includes/init.php");

$current_permissions = show_user_permissions($session->user_id);
$current_state = show_user_state($session->user_id);
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
            <h2>Lista de agencias en la base de datos</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Responsable</td>
                    <td>Activos</td>
                    <td>Email</td>
                    <td>Teléfono</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $agencies_list = Agency::find_all_agencies();
                foreach ($agencies_list as $agency) {
                    echo '<tr>';
                    echo '<td>' . $agency->name . '</td>';
                    echo '<td>' . $agency->responsible . '</td>';
                    echo '<td>' . $agency->assets . '</td>';
                    echo '<td>' . $agency->email . '</td>';

                    echo '<td>' . $agency->telf . '</td>';
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
$fileName = 'agencias_' . $dateTimeFormatted . '.pdf';

// Output the generated PDF to Browser
$dompdf->stream($fileName, array("Attachment" => true));

?>