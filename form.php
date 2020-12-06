<?php 
if(!empty($_POST)){
	$size_ponto = count($_POST["ponto"]);
	$dado = array();
	$heuristica = array();
	for ($i = 0; $i < $size_ponto; $i++) {
		$dado[$_POST["ponto"][$i]] = array(	$_POST["ponto_filho1"][$i] => $_POST["valor_filho1"][$i],
											$_POST["ponto_filho2"][$i] => $_POST["valor_filho2"][$i],
											$_POST["ponto_filho3"][$i] => $_POST["valor_filho3"][$i]);
		$heuristica[$_POST["ponto"][$i]]  = $_POST["heuristica"][$i];
	}
}
?>
<hr class="pt-1">
<a class="btn btn-sm btn-secondary text-white mb-3" onclick="preencherExemplo();">Preencher Exemplo</a>
<form role="form" method="POST">
	<div id="ponto" class="mb-3">
		<div class="form-row">
			<div class="form-group col-md-1 col-5 mb-1">
				<input class="form-control form-control-sm ponto" type="text" id="ponto" name="ponto[]" placeholder="Nó" required>
			</div>
			<div class="form-group col-md-2 col-5 mb-2">
				<input class="form-control form-control-sm heuristica" type="number" name="heuristica[]" placeholder="Valor Heuristico" required>
			</div>
			<div class="form-group col px-1 mb-1">
				<a class="btn btn-sm btn-secondary text-white" onclick="duplicarPonto();"><i class="fas fa-plus-circle"></i> Nó</a>
				<a class="btn btn-sm btn-secondary text-white" onclick="removerPonto(this);"><i class="fas fa-minus-circle"></i> Nó</a>
			</div>	
		</div>
		<div id="filho">
			<div class="form-row">
				<div class="form-group col-md-1 p-0 m-0">
				</div>
				<span class="text-small" id="text-filho[]">Filho 1:</span>
				<div class="form-group col-md-1 col-5 mb-1">
					<input class="form-control form-control-sm ponto_filho1" type="text" id="ponto_filho1" name="ponto_filho1[]" placeholder="Nó">
				</div>
				<div class="form-group col-md-1 col-5 mb-1">
					<input class="form-control form-control-sm valor_filho1" type="number" id="valor_filho1" name="valor_filho1[]" placeholder="Valor">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-1 p-0 m-0">
				</div>
				<span class="text-small" id="text-filho[]">Filho 2:</span>
				<div class="form-group col-md-1 col-5 mb-1">
					<input class="form-control form-control-sm ponto_filho2" type="text" id="ponto_filho2" name="ponto_filho2[]" placeholder="Nó">
				</div>
				<div class="form-group col-md-1 col-5 mb-1">
					<input class="form-control form-control-sm valor_filho2" type="number" id="valor_filho2" name="valor_filho2[]" placeholder="Valor">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-1 p-0 m-0">
				</div>
				<span class="text-small" id="text-filho[]">Filho 3:</span>
				<div class="form-group col-md-1 col-5 mb-1">
					<input class="form-control form-control-sm ponto_filho3" type="text" id="ponto_filho3" name="ponto_filho3[]" placeholder="Nó">
				</div>
				<div class="form-group col-md-1 col-5 mb-1">
					<input class="form-control form-control-sm valor_filho3" type="number" id="valor_filho3" name="valor_filho3[]" placeholder="Valor">
				</div>
			</div>
		</div>
	</div>
	<div id="destino-ponto">
	</div>
	<div class="form-row">
		<span>Nó Objetivo:</span>
		<div class="form-group col-md-2">
		<input class="form-control form-control-sm" type="text" name="objetivo" id="objetivo" placeholder="Objetivo" required>
		</div>
	</div>
	<div class="form-group col-md-12 px-0">
		<button type="submit" class="btn btn-sm btn-primary mx-0">Calcular</button>
	</div>	
</form>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
	function duplicarPonto(){
		var clone = document.getElementById('ponto').cloneNode(true);
		var destino = document.getElementById('destino-ponto');
		destino.appendChild (clone);
		var camposClonados = clone.getElementsByTagName('input');
		for(i=0; i<camposClonados.length;i++){
			camposClonados[i].value = '';
		}
	}
	function removerPonto(id){
		var node1 = document.getElementById('destino-ponto');
		node1.removeChild(node1.childNodes[0]);
	}
	function preencherExemplo(){
		$('.ponto').val('A');
		$('.heuristica').val('30');
		$('.ponto_filho1').val('B');
		$('.valor_filho1').val('12');
		$('.ponto_filho2').val('C');
		$('.valor_filho2').val('14');

		var clone = document.getElementById('ponto').cloneNode(true);
		var destino = document.getElementById('destino-ponto');
		destino.appendChild (clone);
		var camposClonados = clone.getElementsByTagName('input');
		camposClonados['ponto[]'].value = 'B';
		camposClonados['heuristica[]'].value = '26';
		camposClonados['ponto_filho1[]'].value = 'C';
		camposClonados['valor_filho1[]'].value = '9';
		camposClonados['ponto_filho2[]'].value = 'D';
		camposClonados['valor_filho2[]'].value = '38';
		camposClonados['ponto_filho3[]'].value = '';
		camposClonados['valor_filho3[]'].value = '';

		var clone = document.getElementById('ponto').cloneNode(true);
		var destino = document.getElementById('destino-ponto');
		destino.appendChild (clone);
		var camposClonados = clone.getElementsByTagName('input');
		camposClonados['ponto[]'].value = 'C';
		camposClonados['heuristica[]'].value = '21';
		camposClonados['ponto_filho1[]'].value = 'D';
		camposClonados['valor_filho1[]'].value = '24';
		camposClonados['ponto_filho2[]'].value = 'E';
		camposClonados['valor_filho2[]'].value = '7';
		camposClonados['ponto_filho3[]'].value = '';
		camposClonados['valor_filho3[]'].value = '';

		var clone = document.getElementById('ponto').cloneNode(true);
		var destino = document.getElementById('destino-ponto');
		destino.appendChild (clone);
		var camposClonados = clone.getElementsByTagName('input');
		camposClonados['ponto[]'].value = 'D';
		camposClonados['heuristica[]'].value = '7';
		camposClonados['ponto_filho1[]'].value = 'G';
		camposClonados['valor_filho1[]'].value = '9';
		camposClonados['ponto_filho2[]'].value = '';
		camposClonados['valor_filho2[]'].value = '';
		camposClonados['ponto_filho3[]'].value = '';
		camposClonados['valor_filho3[]'].value = '';

		var clone = document.getElementById('ponto').cloneNode(true);
		var destino = document.getElementById('destino-ponto');
		destino.appendChild (clone);
		var camposClonados = clone.getElementsByTagName('input');
		camposClonados['ponto[]'].value = 'E';
		camposClonados['heuristica[]'].value = '22';
		camposClonados['ponto_filho1[]'].value = 'G';
		camposClonados['valor_filho1[]'].value = '29';
		camposClonados['ponto_filho2[]'].value = 'D';
		camposClonados['valor_filho2[]'].value = '13';
		camposClonados['ponto_filho3[]'].value = 'F';
		camposClonados['valor_filho3[]'].value = '9';

		var clone = document.getElementById('ponto').cloneNode(true);
		var destino = document.getElementById('destino-ponto');
		destino.appendChild (clone);
		var camposClonados = clone.getElementsByTagName('input');
		camposClonados['ponto[]'].value = 'F';
		camposClonados['heuristica[]'].value = '26';
		camposClonados['ponto_filho1[]'].value = '';
		camposClonados['valor_filho1[]'].value = '';
		camposClonados['ponto_filho2[]'].value = '';
		camposClonados['valor_filho2[]'].value = '';
		camposClonados['ponto_filho3[]'].value = '';
		camposClonados['valor_filho3[]'].value = '';

		var clone = document.getElementById('ponto').cloneNode(true);
		var destino = document.getElementById('destino-ponto');
		destino.appendChild (clone);
		var camposClonados = clone.getElementsByTagName('input');
		camposClonados['ponto[]'].value = 'G';
		camposClonados['heuristica[]'].value = '0';
		camposClonados['ponto_filho1[]'].value = '';
		camposClonados['valor_filho1[]'].value = '';
		camposClonados['ponto_filho2[]'].value = '';
		camposClonados['valor_filho2[]'].value = '';
		camposClonados['ponto_filho3[]'].value = '';
		camposClonados['valor_filho3[]'].value = '';

		$('#objetivo').val('G');
	}
</script>