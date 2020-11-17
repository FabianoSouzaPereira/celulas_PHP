<?php 	include_once 'init.php'; $tipo=$_SESSION['tipo']; ?>
<nav
	class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
	<a class="navbar-brand text-info" href="index.php">Células</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto d-flex container">
			<li class="nav-item active"><a class="nav-link" href="index.php">Início
					<span class="sr-only">(current)</span>
			</a></li>
			<li class="ml-1 nav-item dropdown"><a
				class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
				role="button" data-toggle="dropdown" aria-haspopup="true"
				aria-expanded="false"> Cadastro </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item"
						href="index.php?pag=site_view_churchReadView">Igrejas</a> <a
						class="dropdown-item"
						href="index.php?pag=site_view_celulasReadView">Células</a> <a
						class="dropdown-item" href="index.php?pag=site_view_userReadView">Usuários</a>
				</div></li>
			<li class="nav-item"><a class="nav-link"
				href="index.php?pag=site_view_relatorioView">Relatórios</a></li>
			<li class="nav-item"><a class="nav-link"
				href="index.php?pag=site_view_sobreView">Sobre</a></li>
			<li class="nav-item ml-auto"><a id="link-user"
				title="Clique aqui para trocar usuario" href="" data-toggle="modal"
				data-target="#modal-login"> <i class="material-icons"
					style="font-size: 24px; color: green;">person</i> <label
					class="acessoSmart" style='display: none'>Acessar</label></span> <!-- Acesso -->
			</a></li>
			<li class="nav-item"><a class="nav-link" href="logoutView.php">Logout</a></li>
		</ul>
		<!--     <form class="form-inline my-2 my-lg-0"> -->
		<!--       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
		<!--       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
		<!--     </form> -->
	</div>
</nav>
<!-- Modal para pesquisa de produtos -->
<div style="margin-top: 10%;" id="modal-login" class="modal fade"
	role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">
				<form action="loginView.php" class="form-inline">
					<button title="Clique para logar como usuário" type="submit"
						class="btn btn-primary  btn-lg  btn-block">
						Trocar usuário <span class=""></span>
					</button>
					<button title="Clique para logar como administrador" type="submit"
						class="btn btn-primary btn-lg  btn-block disabled">
						Logar como administrador( em construção ) <span class=""></span>
					</button>
					<br />
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove"> </span> Fechar
				</button>

			</div>
		</div>

	</div>
</div>
<!-- Modal -->

<!-- Modal para pesquisa de produtos -->
<div style="margin-top: 10%;" id="modal-pesquisa" class="modal fade"
	role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Pesquisa</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form-inline">
					<input value="<?php echo @$_GET['p']; ?>" type="text" name="p"
						id="fpesquisa" class="form-control" size="50"
						placeholder="Digite aqui.">
					<button title="Clique para efetuar a pesquisa" type="submit"
						class="btn btn-success">
						<span class="glyphicon glyphicon-search"> </span>
					</button>
					<br />
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove"> </span> Fechar
				</button>

			</div>
		</div>

	</div>
</div>
<!-- Modal -->
