<?php
use modulos\Igreja;

require 'init.php';
include_once 'application/modulos/Igreja.php';
include_once 'application/functions/Validador.php';
include_once 'js/functions.js';
?>
<div id="bgigrejas">
	<div class="mt-4 ml-5 mb-2 text-muted">
		<div class="mt-2">
			<h2 class="ml-5">Lista de Igrejas</h2>
		</div>
		<div class="container">
			<a id="btnCriaIgreja"
				href="index.php?page=site_view_churchCreateView"
				style="background-color: #98FB98;" class="btn btn-novo text-light"><span
				i class="material-icons" style="font-size: 24px;"></i></span> Nova
				Igreja </a>
			<table class="table table-bordered table-striped table-hover mt-4">
				<thead>
					<tr class="container">
						<th scope="col"></th>
						<th scope="col" style='color: #FF6347;'>Igreja</th>
						<th scope="col" style='color: #FF6347;'>Região</th>
						<th scope="col" style='color: #FF6347;'>Cidade</th>
						<th scope="col" style='color: #FF6347;'>Telefone</th>
						<th scope="col" style='color: #FF6347;'>Email</th>
						<th scope="col" style='color: #FF6347;'>Mais</th>
	<?php if($tipo == '3'){ echo	"<th scope='col' style='color: #FF6347;'>Editar</th>"; }?>
	</tr>
				</thead>
				<tbody>
	<?php
$igr = new Igreja();
$logtipo = null;
$ret = null;
$logtipo = $_SESSION['tipo'];

try {
    switch ($logtipo) {
        case 1:
            $igr->adminRead();
            $ret = $igr->getDados();
            break;
        case 2:
            $igr->coordenadorRead();
            $ret = $igr->getDados();
            break;
        case 3:
            $igr->pastorRead();
            $ret = $igr->getDados();
            break;
        case 4:
            $igr->liderRead();
            $ret = $igr->getDados();
            break;
        case 5:
            $igr->colaboradorRead();
            $ret = $igr->getDados();
            break;
        case 6:
            $igr->comumRead();
            $ret = $igr->getDados();
            break;
        case 7:
            '0';
            break;
        default:
            ;
            break;
    }

    $data = null;
    if ($ret > 0) {
        echo "<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>";  
        echo "<script>$(function(){ $('#btnCriaIgreja').hide(); });</script>";
    }
    $sec = 1;
    if (is_array($ret)) {
        $id = null;
        $igreja = null;
        Foreach ($ret as $raw) {
            $id = $raw['chuId'];
            $igreja = $raw['chuIgreja'];
            $endereco = $raw['chuEndereco'];
            $bairro = $raw['chuBairro'];
            $cidade = $raw['chuCidade'];
            $estado = $raw['chuEstado'];
            $pais = $raw['chuPais'];
            $cep = $raw['chuCep'];
            $data = $raw['chuData'];
            $telefone = $raw['chuTelefone'];
            $email = $raw['chuEmail'];
            $regiao = $raw['chuRegiao'];
            $status = $raw['chuStatus'];
            echo "<tr>";
            echo "<td scope='row' style='text-transform:uppercase; color: #708090;'>", $sec ++, "</td>";
            echo "<td scope='row' style='text-transform:uppercase; color: #708090;'>", $igreja, "</td>";
            echo "<td scope='row' style='text-transform:uppercase; color: #708090;'>", $regiao, "° REGIÃO</td>";
            echo "<td scope='row' style='text-transform:uppercase; color: #708090;'>", $cidade, "</td>";
            echo "<td scope='row' style='text-transform:uppercase; color: #708090;'>", $telefone, "</td>";
            echo "<td scope='row' style='color: black;'>", $email, "</td>";
            echo "<td scope='row'><a href='index.php?page=site_view_churchDetailsView&id=$id' class='btn bg-none text-info'><span i class='material-icons' style='font-size:22px;'>remove_red_eye</i></span></a></td>";
            if ($tipo == '3') {
                echo "<td scope='row'><a href='index.php?page=site_view_churchUpdateView&id=$id' class='btn bg-none text-info'><span i class='material-icons' style='font-size:22px;'>edit</i></span></a></td>";
            }
            echo "</tr>";
        }
        $_SESSION['igrejaId'] = $id;
        $_SESSION['igrejaNome'] = $igreja;
    }
} catch (PDOException $error) {
    echo "Error " . $error->getMessage();
}

?>
	</tbody>
				<tfoot>
					<tr>
						<th colspan="13" class="text-center text-muted"> <?php echo date('d/m/Y h:i:s'); ?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
