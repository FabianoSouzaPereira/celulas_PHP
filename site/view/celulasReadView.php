<?php 

use modulos\Celula;

require 'init.php';
include_once 'application/modulos/Celula.php';
include_once 'application/functions/Pesquisa.php';

?>
<div id="bgcelulas">
<div>
	<div class="mt-4 ml-5 mb-2 text-muted">
		<h2 class="ml-5">Lista de Células</h2>
	</div>
<div class="container">	
<div>
<?php if($_SESSION['tipo']<= '3'){ ?>
<a href="index.php?page=site_view_celulaCreateView" style="background-color: #98FB98;" class="btn btn-novo text-light">
<span class="glyphicon glyphicon-plus"></span> Nova Célula</a>
<?php } ?>	
<label class="acessoSmart text-muted" style='display: none'> Pesquisar</label></span>
</button>
    <input type="text" id="pesquisacel" class="form-control sombra-efe" style="display:inline-block;width:200px;"  placeholder="Pesquisa...">
</div>
<table id="tbCelulas" class="table table-bordered table-striped table-hover mt-4"  style="margin-top:10px;">
	<thead>
	<tr class="container">
		<th scope="col"></th>
		<th scope="col" style='color: #FF6347;'>Celula</th>
		<th scope="col" style='color: #FF6347;'>Rede</th>
		<th scope="col" style='color: #FF6347;'>Lider</th>
		<th scope="col" style='color: #FF6347;'>Anfitriao</th>
		<th scope="col" style='color: #FF6347;'>Data</th>
		<th scope="col" style='color: #FF6347;'>Hora</th>
		<th scope="col" style='color: #FF6347;'>Mais</th>
		<th scope="col" style='color: #FF6347;'>Editar</th>
	</tr>
</thead>
	<tbody>
	<?php 
	$cel = new Celula(); 
	$id=null;
	$ret=null;
    try{
       $logtipo=null;
	   $logtipo=$_SESSION['tipo'];
	
        switch ($logtipo) {
                case 1: $cel->readCelulas();
                        $ret = $cel->getDados();
                   break;
                case 2: $cel->coordenadorRead();
                        $ret = $cel->getDados();
                   break;
                case 3: $cel->pastorReadCelulas();
                        $ret = $cel->getDados();
                   break;
                case 4: $cel->liderReadCelulas();
                        $ret = $cel->getDados();
                   break;
                case 5: $cel->colaboradorRead();
                        $ret = $cel->getDados();
                   break;
                case 6: $cel->comumRead();
                        $ret = $cel->getDados();
                   break;
                case 7: '0';
                   break;
                default:
                    ;
                break;
            } 

            $sec=1;
        if(is_array($ret)){
            Foreach($ret as $raw) {
                $id= $raw['celId']; $celula= $raw['celCelula']; $rede= $raw['celRede']; $lider= $raw['celLider']; 
                $vicelider= $raw['celViceLider'];$secretario= $raw['celSecretario']; $anfitriao= $raw['celAnfitriao']; 
                $colaborador= $raw['celColaborador'];$dia= $raw['celDia'];$hora= $raw['celHora'];$data= $raw['celData'];
                echo "<tr>"; 
                echo "<td class='text-text-uppercase vertical-table' style='color: #708090;'>", $sec++ ,"</td>";
                echo "<td class='text-text-uppercase' style='justify-content: center; color: #708090;'>",$celula,"</td>";
                echo "<td class='text-text-uppercase' style='color: #708090;'>", $rede,"</td>";
                echo "<td class='text-text-uppercase' style='color: #708090;'>", $lider,"</td>";
                echo "<td class='text-text-uppercase' style='color: #708090;'>", $anfitriao,"</td>";
                echo "<td class='text-text-uppercase' style='color: #708090;'>", $dia,"</td>";
                echo "<td class='text-text-uppercase' style='color: #708090;'>", $hora,"</td>";
                echo "<td><a href='index.php?page=site_view_celulaDetailsView&id=$id' class='btn bg-none text-info'><span i class='material-icons mx-0' style='font-size:24px;'>remove_red_eye</i></span></a></td>";
                echo "<td><a href='index.php?page=site_view_celulaUpdateView&id=$id' class='btn bg-none text-info'><span i class='material-icons' style='font-size:24px;'>edit</i></span></a></td>";
                echo "</tr>";
            }
     
        }
    
    	}catch (PDOException $error) {
    	    echo "Error ".$error->getMessage();
    	}
    	
	?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="13" class="text-center"> <?php echo date('d/m/Y h:i:s'); ?></th>
		</tr>
	</tfoot>
   </table>
  </div>
 </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script type="text/javascript">
$(function(){
	  $('#estado').change(function(){
		  var estados= $('#estado').val();
		if( estados ) {
		  $('#cidades').hide();
		  $('.carregando').css('display','inline-block');
		  $('.carregando').show();
	      $.getJSON(
	        'site/pesquisa.php',
	        {
	          estados: estados,
	          ajax: 'true',
	        }, function(j){
	          var options = '<option value="">selecione a cidade</option>';
	          for (var i = 0; i < j.length; i++) {
    	          options += '<option value="' +
    	          j[i].nome + '">' +
    	          j[i].nome + '</option>';  	         
	          } 
	          $('#cidades').html(options).show();
	          $('.carregando').css('display','none');
	          $('.carregando').hide();       
	        });
	    } else {
	      $('#cidades').html(
	        '<option value="">-- Escolha um estado! --</option>'
	      );
	    }
	  });
	});
</script>
<script type="text/javascript">
$(function(){
	  $('#btnCelPesquisa').click(function(){
		var tbody= $('#tbCelulas > tbody');
		var estado = $('#estado').val(); 
		var cidade = $('#cidades').val();
		
	    if( estado ) { 
	      $.getJSON(
	        'site/pesquisa2.php',
	        {
		      estado: estado,
	          cidade: cidade, 
	          ajax: 'true'
	        }, function(x){ 
	        	tbody= $('#tbCelulas > tbody');
	        	var raws = '<tr style="text-transform:uppercase; color: black;>"'; 
	        	$.each(x, function (i, d) {
	                selectbox.append('<td value="' + x[i].id + '">' + x[i].celula + '</td>');
	            });

	          return false;
	        });
	    } else {
	      $('#igrejas').html(
	        '<option value="escolha">-- Escolha uma igreja --</option>'
	      );
	    }
	  });
	});
</script>

<script>
$(document).ready(function(){
  $("#pesquisacel").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>