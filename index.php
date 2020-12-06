<?php require 'header.php'; ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row my-3">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Inteligência Artificial</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div><!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container">	
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							Buscas Inteligência Artificial
						</div> <!-- /.card-header -->
						<div class="card-body">
							<h5>Busca Cega</h5>
							<ul>
								<li><a href="busca-extensao.php">Busca em Extensão</a></li>
								<li><a href="busca-profunidade.php">Busca em Profundidade</a></li>
								<li><a href="busca-custo-uniforme.php">Busca de Custo Uniforme</a></li>
							</ul>
							<h5>Busca Heurística</h5>
							<ul>
								<li><a href="busca-gulosa.php">Busca Gulosa</a></li>
								<li><a href="busca-a.php">Busca A*</a></li>
								<li><a href="busca-subida.php">Busca Local Subida de Encosta</a></li>
							</ul>
							<hr>
							<h5>Solução de problemas como Busca</h5>
							<ul>
								<li>Um problema pode ser considerado como um objetivo</li>
								<li>Um conjunto de ações podem ser praticadas para alcançar esse objetivo</li>
								<li>Ao buscar um objetivo, estamos em um determinado estado</li>
								<ul>
									<li>O estado inicial é quando iniciamos a busca</li>
									<li>O estado que satisfaz a meta é o estado objetivo</li>
								</ul>
								<li>Busca</li>
								<ul>
									<li>Método que examina o espaço de um problema,buscando um objetivo</li>
								</ul>
								<li>O espaço de um problema é seu Estado de Busca</li>
							</ul>
						</div> <!-- /.card-body -->
					</div> <!-- /.card -->
				</div> <!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require_once 'footer.php' ?>