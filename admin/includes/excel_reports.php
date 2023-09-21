<?php

function excel_reports_generation()
{
    $filename = $_POST['data_base'] . '_' . date('d/m/Y H:i:s') . '.xls';
    if ($_POST['data_base'] == "usuarios") {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename);
        $output = "";
        $output .= "
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Edad</th>
						<th>Contrasena</th>
						<th>Permisos</th>
						<th>Estado de aprobacion</th>
						<th>Fecha de creacion</th>
					</tr>
				<tbody>
		";
        $users = Users::find_all_users();
        foreach ($users as $user) {

            $output .= "
					<tr>
						<td>" . $user->id . "</td>
						<td>" . $user->username . "</td>
						<td>" . $user->email . "</td>
						<td>" . $user->age . "</td>
						<td>" . $user->pwd . "</td>
						<td>" . $user->permissions . "</td>
						<td>" . $user->approved . "</td>
						<td>" . $user->created_at . "</td>
					</tr>
		";
        }
        $output .= "
				</tbody>
				
			</table>
		";
        echo $output;
        exit;
    } elseif ($_POST['data_base'] == "agencias") {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename);
        $output = "";
        $output .= "
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Responsable</th>
						<th>Activos ($)</th>
						<th>Email</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Fecha de creacion</th>
					</tr>
				<tbody>
		";
        $agencies = Agency::find_all_agencies();
        foreach ($agencies as $agency) {

            $output .= "
					<tr>
						<td>" . $agency->id . "</td>
						<td>" . $agency->name . "</td>
						<td>" . $agency->responsible . "</td>
						<td>" . $agency->assets . "</td>
						<td>" . $agency->email . "</td>
						<td>" . $agency->address . "</td>
						<td>" . $agency->telf . "</td>
						<td>" . $agency->created_at . "</td>
					</tr>
		";
        }
        $output .= "
				</tbody>
				
			</table>
		";
        echo $output;
        exit;
    } elseif ($_POST['data_base'] == "warehouse") {
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . $filename);
        $output = "";
        $output .= "
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Cantidad (t)</th>
						<th>Ordenes pendientes</th>
						<th>Disponibilidad</th>
						<th>Precio ($)</th>
						<th>Codigo</th>
					</tr>
				<tbody>
		";
        $merchandise = Merch::find_all_merch();
        foreach ($merchandise as $merch) {

            $output .= "
					<tr>
						<td>" . $merch->id . "</td>
						<td>" . $merch->merch_name . "</td>
						<td>" . $merch->amount . "</td>
						<td>" . $merch->orders . "</td>
						<td>" . $merch->status . "</td>
						<td>" . $merch->price . "</td>
						<td>" . $merch->code . "</td>
					</tr>
		";
        }
        $output .= "
				</tbody>
				
			</table>
		";
        echo $output;
        exit;
    }
}
