<?php
use modulos\Usuario;

require 'init.php';
include_once 'application/modulos/Usuario.php';

?>
<div>
	<div id="userRead" class="panel panel-warning">
		<div class="mt-4 ml-5 mb-2 text-muted">
			<h2 class="ml-5">Lista de Usuários</h2>
		</div>
		<div class="container">
			<a href="index.php?page=site_view_userCreateView"
				style="background-color: #98FB98;" class="btn text-light">
				<span class=""></span> Novo Usuário
			</a> <a href="" data-toggle="modal"
				data-target="#modal-associaCelula">
				<button id="btnassociaCelula" style="background-color: #B0E0E6;"
					class="btn text-light">
					<span class=""></span>Associar Célula
				</button>
			</a> <input type="text" id="pesquisauser"
				class="form-control sombra-efe"
				style="display: inline-block; width: 200px;"
				placeholder="Pesquisa...">
			<table class="table table-bordered table-striped table-hover mt-4"
				style="margin-top: 10px;">
				<thead>
					<tr class="container">
						<th scope="col" style='color: #FF6347;'></th>
						<th scope="col" style='color: #FF6347;'>Email</th>
						<th scope="col" style='color: #FF6347;'>Nome</th>
						<th scope="col" style='color: #FF6347;'>Tipo</th>
						<th scope="col" style='color: #FF6347;'>Bloqueado</th>
						<th scope="col" style='color: #FF6347;'>Mais</th>
						<th scope="col" style='color: #FF6347;'>Editar</th>
					</tr>
				</thead>
				<tbody>
	<ul id="userlist">
	<?php
$logtipo = null;
$logtipo = $_SESSION['tipo'];
$usu = new Usuario();
$id = null;
try {
    switch ($logtipo) {
        case 1:
            $usu->adminRead();
            $ret = $usu->getDados();
            break;
        case 2:
            $usu->coordenadorRead();
            $ret = $usu->getDados();
            break;
        case 3:
            $usu->pastorRead();
            $ret = $usu->getDados();
            break;
        case 4:
            $usu->liderRead();
            $ret = $usu->getDados();
            break;
        case 5:
            $usu->colaboradorRead();
            $ret = $usu->getDados();
            break;
        case 6:
            $usu->comumRead();
            $ret = $usu->getDados();
            break;
        case 7:
            '0';
            break;
        default:
            ;
            break;
    }
    $sec = 1;
    if (is_array($ret)) {
        Foreach ($ret as $raw) {
            $id = $raw['usuId'];
            $usuario = $raw['usuuid'];
            $email = $raw['usuEmail'];
            $nome = $raw['usuNome'];
            $sobrenome = $raw['usuSobreNome'];
            $senha = $raw['usuSenha'];
            $tentativa = $raw['usuTentativa'];
            $bloqueado = $raw['usuBloqueado'];
            $data = $raw['usuData'];
            $tipo = $raw['usuTipo'];
            $acesso = $raw['usuAcesso'];
            switch ($tipo) {
                case 1:
                    $strTipo = 'ADMINISTRADOR';
                    break;
                case 2:
                    $strTipo = 'COORDENADOR';
                    break;
                case 3:
                    $strTipo = 'PASTOR';
                    break;
                case 4:
                    $strTipo = 'LIDER';
                    break;
                case 5:
                    $strTipo = 'COLABORADOR';
                    break;
                case 6:
                    $strTipo = 'COMUM';
                    break;
                case 7:
                    $strTipo = 'SEM ACESSO';
                    break;
                default:
                    ;
                    break;
            }
            echo "<tr class='container'>";
            echo "<td scope='row' style='text-transform:uppercase; color: #708090;'>", $sec ++, "</td>";
            echo "<td scope='row' style='color: #708090;'>", $email, "</td>";
            echo "<td scope='row' data-name='$nome' style='text-transform:uppercase; color: #708090;'>", $nome, "</td>";
            echo "<td scope='row' style='text-transform:uppercase; color: #708090;'>", $strTipo, "</td>";
            echo "<td scope='row' style='text-transform:uppercase; color: #708090;'>", $bloqueado, "</td>";
            echo "<td scope='row'><a href='index.php?page=site_view_userDetailsView&id=$id' class='btn bg-none text-info'><span i class='material-icons' style='font-size:22px;'>remove_red_eye</i></span></a></td>";
            echo "<td scope='row' data-id='$id'><a href='index.php?page=site_view_userUpdateView&id=$id' class='btn bg-none text-info'><span i class='material-icons' style='font-size:22px;'>edit</i></span></a></td>";
            echo "</tr>";
        }
    }
} catch (PDOException $error) {
    echo "Error " . $error->getMessage();
}

?>
	</ul>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="13" class="text-center"><?php  date('d/m/Y h:i:s'); ?></th>
						<td id=""></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<div class="modal" id="modal-associaCelulas" tabindex="-1"
		role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">

				<div id="selects" class="modal-header">
					<h5 class="modal-title">Para qual celula ?</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

					<select id="usuarios" name="usuarios" class="form-control"
						style="margin: 20px auto 0px auto; width: 400px; height: 45px; font-size: 14px;">
						<option value="">Selecione um usuário</option>
					</select> <select id="celulas" name="celulas" class="form-control"
						style="margin: 20px auto 0px auto; width: 400px; height: 45px; font-size: 14px;">
						<option value="SELECIONE">Selecione uma célula</option>
					</select> <select id="" name="" class="form-control carregandoCel"
						style="margin: 20px auto 0px auto; width: 400px; height: 45px; font-size: 14px;">
						<option value="">carregando...</option>
					</select>

				</div>

				<div class="modal-body">
					<form action="" method="get" class="form-inline">
						<a href="index.php?pag=site_view_associausuario"
							style="background-color: green; width: 100%; height: 40px; font-size: 15px;"
							class="btn btn-primary btn-lg btn-block" id="btnAssociaUsuario">Ok</a>
						<br />
					</form>
				</div>
				<div class="modal-footer">
					<p
						style="display: inline-block; float: left; color: green; font-style: inherit;">Filtrado
						conforme suas permissões de usuário</p>
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal para escolher igreja e celula -->
	<div class="modal" id="modal-associaCelula" tabindex="-1" role="dialog">
		<div style="margin-top: 1%;" class="modal modal-dialog-centered"
			role="dialog">
			<div class="modal-dialog" role="document">

				<!-- Modal content-->
				<div class="modal-content">
					<div id="selects" class="d-flex flex-column modal-header">
						<div class="d-flex justify-content-end">
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h3 class="d-flex justify-content-start ml-5 modal-title">Para
								qual celula ?</h3>
						</div>
						<select id="usuarios" name="usuarios" class="form-control"
							style="margin: 20px auto 0px auto; width: 400px; height: 45px; font-size: 14px;">
							<option value="">Selecione um usuário</option>
						</select> <select id="celulas" name="celulas" class="form-control"
							style="margin: 20px auto 0px auto; width: 400px; height: 45px; font-size: 14px;">
							<option value="SELECIONE">Selecione uma célula</option>
						</select> <select id="" name="" class="form-control carregandoCel"
							style="display: none; margin: 20px auto 0px auto; width: 400px; height: 45px; font-size: 14px;">
							<option value="">carregando...</option>
						</select>
					</div>
					<div class="modal-body">
						<form action="" method="get" class="form-inline">
							<a href="index.php?pag=site_view_associausuario"
								style="background-color: green; margin: 10px auto 0px auto; width: 150px; height: 40px; font-size: 15px;"
								class="btn btn-primary btn-lg btn-block" id="btnAssociaUsuario">Ok</a>
							<br />
						</form>
					</div>
					<div class="modal-footer">
						<p
							style="display: inline-block; float: left; color: green; font-style: inherit;">Filtrado
							conforme suas permissões de usuário</p>
						<button type="button" class="btn btn-default btn-inline"
							data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"> </span> Fechar
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM MODAL -->
</div>

<script type="text/javascript">
$(function(){
    $(document).on('click', 'tr', function(e) {
        e.preventDefault; 
        $('tbody tr').css( "background-color", "" );
        $('tbody tr').not($(this).siblings()).css( "background-color", "#40e883" );  //#d6c4ab
		var id="";   var nome="";
        id = $(this).closest('tr').find('td[data-id]').data('id');
        nome = $(this).closest('tr').find('td[data-name]').data('name');
		
        $.getJSON(
			'site/pesquisa.php',
            {
			id : id,
			nome : nome,
			ajax : 'true'        	
            },function(b){
            var options;
  	          for (var x = 0; x < b.length; x++) {
  	            options += '<option value="' +
  	              b[x].id + '">' +
  	              b[x].nome + '</option>';
  	          }

    	     $('#usuarios').html(options).show();
      	     $('.carregandoCel').hide();
         });
    });
});

</script>
<script type="text/javascript">
$(function(){
	  $('#btnassociaCelula').click(function(){
		  var igreja = $('#dados_gerais #nomeIgreja').html(); 
		  if(igreja){
	      $('#celulas').hide();
	      $('.carregandoCel').show();
	      $.getJSON(
	        'site/pesquisa.php',
	        {
	          igrejas: igreja,
	          ajax: 'true'
	        }, function(z){
	          var options = '<option value="">selecione uma celula</option>';
	          for (var a = 0; a < z.length; a++) {
	            options += '<option value="' +
	              z[a].id + '">' +
	              z[a].celula + '</option>';
	          }
    	          if(z.length < 1){
    		          options = '<option value="no">nenhuma celula encontrada</option>';
    		      }
	          $('#celulas').html(options).show();
	          $('.carregandoCel').hide();
	        });
	     }
	  });
});
</script>
<script type="text/javascript">
// Botão do modal envia id dos selects e o valor do texto para pesquisa1.
$(function(){
	$('#btnAssociaUsuario').click(function(){
		var idusuario = $('#usuarios').val(); 
		var idcelula = $('#celulas').val(); 
		var usuario = $('#usuarios').find(":selected").text(); 
		var celula = $('#celulas').find(":selected").text();
      $.getJSON(
  	        'site/view/associausuario.php',
        {
          idusuario : idusuario,
          idcelula : idcelula,
          usuario : usuario,
          celula : celula, 
          ajax : 'true'
        }, function(sucesso){
        	 window.location.replace("index.php?pag=site_view_userReadView");
        });		
	});
 });
</script>
<!-- Modal -->


<!-- Função input pesquisa -->
<script>
$(document).ready(function(){
  $("#pesquisauser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
