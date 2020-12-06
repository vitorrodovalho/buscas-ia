<?php require 'header.php'; ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row my-3">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Extensão</h1>
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
							Busca em Extensão
						</div> <!-- /.card-header -->
						<div class="card-body">
							<ul>
								<li>Percorre a árvore em largura ao invés de profundidade</li>
								<li>Começam examinando todos os nós de um nível abaixo do nó raiz</li>
								<li>Se não encontrar o objetivo, buscam um nível abaixo</li>
								<li>Melhor em árvores que tenham caminhos mais profundos</li>
							</ul>
							<?php require 'form.php'; 
							if(!isset($result_caminho)){ ?>
								<span id="passos" value=""></span><br>
								<span id="caminho" value=""></span><br>
							<?php } ?>
						</div> <!-- /.card-body -->
					</div> <!-- /.card -->
				</div> <!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php 

if(!empty($dado)){
	$objetivo = $_POST["objetivo"];
	$inicial = $_POST["ponto"][0];
	$caminho[] = $inicial;
	$fila[] = $inicial;
	$cont = 0;
	$passos = "Passo 1:". $inicial . "<br>";

	while($controle <> 1){
		foreach ($dado as $ponto => $valor) {		//Percorre o array de dados
			if(!empty($valor) && $ponto == $fila[$cont]){	//Verifica se o nó possui filho
				foreach ($valor as $vetor => $valor) {		//Percorre os filhos do nó
					if(!empty($vetor))
						array_push($fila, $vetor);
				}
				if($fila[$cont] == $objetivo)
					$controle = 1;
				else {
					unset($fila[$cont]);
					$cont += 1;
					$passos .= "Passo " . ($cont + 1) . ": ";
					foreach ($fila as $key => $value) {
						if (end(array_keys($fila)) == $key)
							$passos .= $value;
						else
							$passos .= $value . ", ";
					}
					$passos .= "<br>";
				}
			}
		}
		if(!in_array($fila[$cont], $caminho))
			array_push($caminho, $fila[$cont]);		//Armazena o nó no caminho
	}

	foreach ($caminho as $caminhos => $valor) {
		if (end(array_keys($caminho)) == $caminhos)
			$result_caminho .= $valor;	
		else
			$result_caminho .= ($valor . " => ");	
	}

	echo "<script>$('#passos').html('".$passos."')</script>";
	echo "<script>$('#caminho').text('Caminho: ".$result_caminho."')</script>";
}

require_once 'footer.php'; ?>