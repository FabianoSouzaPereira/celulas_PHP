<?php ob_start(); //Carregar sempre o buffer para poder usar a vontade o header("url");
include_once 'init.php';?>
<!Doctype html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1" charset="utf-8">
<title>Células</title>
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Applicação web para gerenciamento de Células da igreja.">
<meta name="keywords" content="Developer">
<meta name="author" content="Fabianospdev.com">
        <!-- Chamada do CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- Outros -->
<script type="text/javascript" src="../js/functions.js"></script>
<script src="../js/selects.js"></script>
<script>
$(function maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
});
</script>
<script> 
$(function(){
    $(document).ready(function(){   				 			
    $(".mascaraData").mask("99/99/9999");
    $(".mascaraTelefone").mask("(99) 99999-9999");			
    });	
});
</script>
</head>
<body class="">
	    <?php include "top.php"; ?> 

		<!-- START SITE CONTEND -->
		<div id="conteudo-principal">
			<?php include $fullpath; ?>
		</div>
		<!-- END SITE CONTEND -->
		<?php include "footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
