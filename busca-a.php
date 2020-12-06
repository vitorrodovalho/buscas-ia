<?php require 'header.php'; ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row my-3">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> A*</h1>
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
							Busca A*
						</div> <!-- /.card-header -->
						<div class="card-body">
							Utiliza a seguinte função para avaliar nós:<br>
							<ul>
								<li>f ( nó ) = g ( nó ) + h ( nó )<br>
									g ( nó ) → custo do caminho que leva ao nó atual<br>
									h ( nó ) → subestimativa da distância desse nó até um estado objetivo.<br>
								É uma heurística que prevê a distância desse nó até o nó objetivo</li>
								<li>f ( nó ) = função de avaliação baseada em caminho</li>
							</ul>
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
		foreach ($dado as $ponto => $valor) {		//Percorre o array de dados		
			if(!empty($valor) && $ponto == $temp_caminho && $controle <> 1){	//Verifica se o nó possui filho
				foreach ($valor as $vetor => $valor) {		//Percorre os filhos do nó
					$keys = array_keys($heuristica);		//Armazena chaves do array heuristica
					$size = count($heuristica);		//Armazena tamanho do array heuristica
					for ($i = 0; $i < $size; $i++) {	//Percorre o array heuristica
						if($keys[$i] == $vetor && $heuristica[$keys[$i]] < $temp_valor){	//Verifica se o valor da heuristica e menor
							$temp_valor = $heuristica[$keys[$i]] + $valor;
							$temp_caminho = $keys[$i];
							$temp_custo = $valor;
						}
					}
				}
				array_push($caminho, $temp_caminho);	//Armazena o nó no caminho
				$custo += $temp_custo;	//Armazena o custo
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