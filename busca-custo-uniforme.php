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
							Busca de Custo Uniforme
						</div> <!-- /.card-header -->
						<div class="card-body">
							Usa a função f( nó ) = g ( nó ) + h ( nó ), assim como A*, porém, zera o valor de h ( nó )
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
	$custo = 9999;

	foreach ($dado as $ponto => $valor) {		
		foreach ($valor as $vetor1 => $valor1) {		
			foreach ($dado[$vetor1] as $vetor2 => $valor2) {	
				foreach ($dado[$vetor2] as $vetor3 => $valor3) {	
					foreach ($dado[$vetor3] as $vetor4 => $valor4) {	
						$valorTotal = $valor1 + $valor2 + $valor3 + $valor4;
						if($valorTotal < $custo && $vetor4 == $objetivo){
							$custo = $valorTotal;
							$caminho = $ponto . " => " . $vetor1 . " => ". $vetor2 . " => " . $vetor3 . " => " . $vetor4; 
						}
					}
				}
			}	
		}
		break;
	}

		echo "<script>$('#caminho').text('Caminho: ".$caminho."')</script>";
		echo "<script>$('#custo').text('Custo: ".$custo."')</script>";
	}

	require_once 'footer.php'; ?>