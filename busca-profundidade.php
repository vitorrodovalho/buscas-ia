<?php require 'header.php'; ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row my-3">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Profundidade</h1>
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
							Busca em Profundidade
						</div> <!-- /.card-header -->
						<div class="card-body">
							<ul>
								<li>Segue cada caminho até sua maior profundidade antes de seguir para o próximo caminho</li>
								<li>Se a folha não representar um estado objetivo,a busca retrocederá ao primeiro nó anterior que tenha um caminho não explorado</li>	
								<li>Utiliza um método chamado de <b>retrocesso cronológico:</b></li>
								<ul>
									<li>Volta na árvore de busca, uma vez que um caminho sem saída seja encontrado</li>
									<li>É assim chamado por desfazer escolhas na ordem contrária ao momento em que foram tomadas</li>
								</ul>
								<li>É um método de <u>busca exaustiva</u> ou de força bruta</li>
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

	foreach ($dado as $ponto => $valor) {	//Percorre o array de dados
		if(!empty($valor) && $ponto == $temp_caminho && $controle <> 1){	//Verifica se o nó possui filho
			foreach ($valor as $vetor => $valor) {	//Percorre os filhos do nó
				if($vetor == $objetivo){
					$controle = 1;
				}
				$temp_caminho = $vetor;
				$temp_custo = $valor;
				array_push($caminho, $temp_caminho);	//Armazena o nó no caminho
				$custo += $temp_custo;	//Armazena o custo
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
	echo "<script>$('#caminho').text('Caminho: ".$result_caminho."')</script>";
	echo "<script>$('#custo').text('Custo: ".$custo."')</script>";
}

require_once 'footer.php'; ?>