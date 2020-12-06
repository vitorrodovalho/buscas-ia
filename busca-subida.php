<?php require 'header.php'; ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row my-3">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Custo Uniforme</h1>
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
							Busca Subida da Colina
						</div> <!-- /.card-header -->
						<div class="card-body">
							Sempre seleciona o caminho que tenha: o menor valor heurístico e também o valor for menor que o valor heuristico no nó anterior.
							<?php require 'form.php'; 
							if(!isset($result_caminho)){ ?>
								<span id="caminho" value=""></span><br>
								<span id="custo" value=""></span>
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
	$temp_caminho = $inicial;
	$caminho[] = $inicial;
	$temp_valor = 9999;	//Variavel de controle para comparar maior valor entre nós

	while(!in_array($objetivo, $caminho)){ 	//Enquanto o objetivo nao estiver na lista, faça
		foreach ($dado as $ponto => $valor) {	//Percorre o array de dados
			if(!empty($valor) && $ponto == $temp_caminho){	//Verifica se o nó possui filho
				foreach ($valor as $vetor => $valor) {	//Percorre os filhos do nó
					if(!empty($valor)){
						if($vetor == $objetivo){ 	// Verifica se o nó é o objetivo
							$temp_caminho = $vetor;
							$temp_custo = $valor;
						}else if($heuristica[$vetor] < $temp_valor && $heuristica[$vetor] < $heuristica[$temp_caminho]){ //Verifica valor heuristico e se menor que o do no anterior
							$temp_valor = $heuristica[$vetor];	
							$temp_caminho = $vetor;
							$temp_custo = $valor;
						}
					}
				}
				$custo += $temp_custo;	//Armazena o custo
				array_push($caminho, $temp_caminho);	//Armazena o nó no caminho
				if(in_array($objetivo, $caminho))
					break;
			}	
		}
	}

	foreach ($caminho as $caminhos => $valor) {
		if (end(array_keys($caminho)) == $caminhos)
			$result_caminho .= $valor;	
		else
			$result_caminho .= ($valor . " => ");	
	}

	if(in_array($objetivo, $caminho)){
		echo "<script>$('#caminho').text('Caminho: ".$result_caminho."')</script>";
		echo "<script>$('#custo').text('Custo: ".$custo."')</script>";
	}else{
		echo "<script>$('#caminho').text('Sem Solução!')</script>";
	}

}

require_once 'footer.php'; ?>