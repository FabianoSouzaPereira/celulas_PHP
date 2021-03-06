<?php ?>
<div>
<a href="" data-toggle="modal" data-target="#modal-estado-cidade">
  <button id="btn-estado-cidade" style="display: none;" class="relatorio">
      Criar relatório
  </button>
</a>
<!-- Modal para escolher estado e cidade -->
<div style="margin-top: 5%;" id="modal-estado-cidade" tabindex="-1" class="modal fade modal-dialog-centered" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div id="selects" class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Para qual estado ? </h2>
        <select id="estados" name="estados" class="form-control" style="width:400px;height:45px;margin:30px auto 0px auto;font-size:14px;" >
            <option value="SELECIONE">selecione o estado</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
            <option value="EX">Estrangeiro</option>
        </select>
        <select id="cidades" name="cidades"  class="form-control" style="margin:20px auto 0px auto;width:400px;height:45px;font-size:14px;">
        	<option value="SELECIONE">selecione a cidade</option>
        </select>
        <select id="" name=""  class="form-control carregando"  style="display:none;margin:20px auto 0px auto;width:400px;height:45px;font-size:14px;">
        	<option value="">carregando...</option>
        </select>
      </div>
      <div class="modal-body" >
		<form action="" method="get" class="form-inline">
		<a href="celulas.fabianospdev.com.br/index.php?pag=site_view_churchReadView"
style="background-color:green;margin: 10px auto 0px auto;width: 200px;height: 60px;font-size: 25px;" class="btn btn-primary btn-lg btn-block" id="btnCriaRelatorio">
 Criar Relatório</a>
		<br />
		</form>
      </div>
      <div class="modal-footer">
      <p style="display: inline-block; float: left;color:green;font-style: inherit;">Filtrado conforme suas permissões de usuário</p>
        <button type="button" class="btn btn-default btn-inline" data-dismiss="modal"><span class="glyphicon glyphicon-remove"> </span> Fechar</button>	       
      </div>
    </div>	
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#btn-estado-cidade').click();
})
</script>

<script type="text/javascript">
$(function(){
	  $('#estados').change(function(){
		  var estados= $('#estados').val();
		if( estados ) {
	      $('#cidades').hide();
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
	  $('#selects').on('change','#cidades',function(){
		var cidades = $('#cidades').val();
	    if( cidades ) { 
	      $('#igrejas').hide();
	      $('.carregando').show();
	      $.getJSON(
	        'site/pesquisa.php',
	        {
	          cidades: cidades,
	          ajax: 'true'
	        }, function(x){
	        	var options = '<option value="selcecionar">selecione a igreja</option>';
	          for (var y = 0; y < x.length; y++) {
	        	   if(x.length == 0){ options = '<option value="nenhuma">nenhuma igreja na cidade</option>'; }
	        	}	        
	          for (var y = 0; y < x.length; y++) {	            
	            options += '<option value="' +
	              x[y].id + '">' +
	              x[y].igreja  + '</option>';
	          }
	          $('#igrejas').html(options).show();
	          $('.carregando').hide();
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

<script type="text/javascript">
//Botão do modal envia id dos selects e o valor do texto para pesquisa1.
$(function(){
	$('#btnCriaRelatorio').click(function(){
		var idestado = $('#estados').val();  
		var idcidade = $('#cidades').val();
		var idigreja = $('#igrejas').val(); 
		var idcelula = $('#celulas').val();
		var estado = $('#estados').find(":selected").text();  
		var cidade = $('#cidades').find(":selected").text(); 
		var igreja = $('#igrejas').find(":selected").text(); 
		var celula = $('#celulas').find(":selected").text();  
      $.getJSON(
  	        'site/pesquisa1.php',
  	        {
  	          idestado:idestado,
  	          idcidade:idcidade,
  	          idigreja:idigreja,
  	          idcelula:idcelula,
  	          estado: estado,
  	          cidade: cidade,
  	          igreja: igreja,
  	          celula: celula, 
  	          ajax: 'true'
  	        }, function(){
	  	        alert('sucesso');
  	        });
		
	});
 });
</script>
<!-- Modal -->