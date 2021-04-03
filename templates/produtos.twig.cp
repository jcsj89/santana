{% extends 'base/base.twig' %}
{% block content %}

<div class="row bg-image"> <!-- LINHA -->
	<div class="container">
		<div class="row justify-content-center"> <!-- LINHA -->
			<div class="col justify-content-center text-center">
				<h3>PRODUTOS</h3>
			</div>
		</div>

		<div class="row pt-2 pb-2"> <!-- LINHA GLOBAL -->
			<!-- COLUNA DOS MENUS - LADO ESQUERDO 
			d-none d-sm-block
		-->
			<div class="col-4 col-sm-3 border-right">

				<div class="row "> 
					<div class="col-12 pt-2 text-right text-sm-left">
						<h6 class="font-weight-bold">Linha Automotiva</h6>
					</div>
					<div class="col pt-2 text-right text-sm-left">
						<ul class="">	
							<h6 class="pb-1 font-weight-bold">Neutro</h6>						
							<li class=""><a class="color-blue menu-produtos" href="/site/produtos/sanq-mol-ls">Sanq Mol LS</a></li>
							<li class=""><a class="color-blue" href="#">Sanq Mol</a></li>
						<!--	<li class=""><a class="color-blue" href="#">Sanclear</a></li>	-->						
						</ul>
					</div>
				</div>

				<div class="row pt-2 text-right text-sm-left">
					<div class="col ">
						<ul class="">	
							<h6 class="pb-1 font-weight-bold">Desincrustante</h6>						
							<li class=""><a class="color-blue" href="">Ativado 220</a></li>
							<li class=""><a class="color-blue" href="">Ativado LS</a></li>
							<li class=""><a class="color-blue" href="">Ativado 110</a></li>						
						</ul>
					</div>					
				</div>

				<div class="row pt-2 text-right text-sm-left">
					<div class="col  ">
						<ul class=" ">	
							<h6 class="font-weight-bold">Desengraxante</h6>						
							<li class=""><a class="color-blue" href="">Samix 220</a></li>
							<li class=""><a class="color-blue" href="">Samix LS</a></li>				
							<li class=""><a class="color-blue" href="">Sanq Chassis 110</a></li>
						<!--	<li class=""><a class="color-blue" href="">Sancamix</a></li> -->
						</ul>
					</div>					
				</div>

				<div class="row pt-2 text-right text-sm-left">
					<div class="col  ">
						<ul class=" ">	
							<h6 class="font-weight-bold">Acabamentos</h6>						
						<!--	<li class=""><a class="color-blue" href="">Silicone Gel</a></li> -->
							<li class=""><a class="color-blue" href="">Pneu Brill</a></li>
							<li class=""><a class="color-blue" href="">Mult Max</a></li>							
						</ul>
					</div>					
				</div>

				<div class="row mt-2 text-right text-sm-left border-top">
					<div class="col-12 pt-2">
						<h6 class="font-weight-bold">Linha Industrial</h6>
					</div>
					<div class="col  ">
						<ul class=" ">												
							<li class=""><a class="color-blue" href="">R2 - 686</a></li>
							<li class=""><a class="color-blue" href="">R2 - 164</a></li>
							<li class=""><a class="color-blue" href="">R2 - 184</a></li>
							<li class=""><a class="color-blue" href="">R2 - 878</a></li>
							<li class=""><a class="color-blue" href="">R2 - 492</a></li>
							<li class=""><a class="color-blue" href="">R2 - 544</a></li>
							<li class=""><a class="color-blue" href="">R2 - 772</a></li>
						</ul>
					</div>
				</div>

			</div>



			<!-- COLUNA DOS PRODUTOS - LADO DIREITO -->
			<div class="col-8 col-sm-9 ">
				<!-- CADA LINHA CONTEM 3 COLUNAS COM CADA COLUNA 1 PRODUTO -->
				<!-- PRIMEIRA LINHA	-->
				<div class="row">
					<!-- ATIVADO LS	-->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href="/site/produtos"><img src="/img/prod/at.ls.300.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Ativado LS</a> </h5>
						<p class="m-0"><span class="badge badge-info mr-1">limpa baú</span><span class="badge badge-light mr-1">automotivo</span><span class="badge badge-warning mr-1">desincrustante</span></p>						
					</div> 
					<!-- SAMIX LS	-->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href="/site/produtos"><img src="/img/prod/samix.5l.300.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Samix LS</a> </h5>
						<p class="m-0"><span class="badge badge-danger mr-1">motor</span><span class="badge badge-dark mr-1">desengraxante</span><span class="badge badge-light mr-1">automotivo</span></p>
					</div> 
					<!-- SANQ MOL LS	-->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href="/site/produtos/sanq-mol-ls"><img src="/img/prod/sh.5l.3
						00.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="/site/produtos/sanq-mol-ls">Sanq Mol LS</a> </h5>
						<p class="m-0"><span class="badge badge-success mr-1">lataria</span><span class="badge badge-secondary mr-1">neutro</span><span class="badge badge-warning mr-1">automotivo</span></p>
					</div>
				</div>
				<!-- CADA LINHA CONTEM 3 COLUNAS COM CADA COLUNA 1 PRODUTO -->
				
				<div class="row">
					<!-- ATIVADO 220	-->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href="/site/produtos"><img src="/img/prod/ativado.220.png" class="img-fluid mx-auto" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Ativado 220</a> </h5>
						<p class="m-0"><span class="badge badge-warning mr-1">automotivo</span><span class="badge badge-danger mr-1">desincrustante</span><span class="badge badge-info mr-1">limpa baú</span></p>
					</div>
					<!-- SAMIX 220	-->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href="/site/produtos"><img src="/img/prod/samix.220.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Samix 220</a> </h5>
						<p class="m-0"><span class="badge badge-primary mr-1">desengraxante</span><span class="badge badge-dark mr-1">motor</span><span class="badge badge-light mr-1">automotivo</span></p>
					</div>
					<!-- SANQ MOL 	-->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href="/site/produtos"><img src="/img/prod/sanq.mol.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Sanq Mol</a> </h5>
						<p class="m-0"><span class="badge badge-success mr-1">lataria</span><span class="badge badge-warning mr-1">neutro</span><span class="badge badge-secondary mr-1">automotivo</span></p>
					</div>
				</div> 
				<!-- CADA LINHA CONTEM 3 COLUNAS COM CADA COLUNA 1 PRODUTO -->
				
				<div class="row">
					<!-- SANQ CHASSIS 110 -->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href=""><img src="/img/prod/sanq.chassis.110.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Sanq Chassis 110</a> </h5>
						<p class="m-0"><span class="badge badge-info mr-1">desengraxante</span><span class="badge badge-warning mr-1">azul</span><span class="badge badge-light mr-1">automotivo</span></p>
					</div>
					<!-- MULT MAX	-->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href=""><img src="/img/prod/mult.max.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Mult Max</a> </h5>
						<p class="m-0"><span class="badge badge-secondary mr-1">mult uso</span><span class="badge badge-success mr-1">concentrado</span><span class="badge badge-primary mr-1">automotivo</span></p>
					</div>
					<!-- PNEU BRILL	-->
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href=""><img src="/img/prod/pneu.brill.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Pneu Brill</a> </h5>
						<p class="m-0"><span class="badge badge-info mr-1">brilho</span><span class="badge badge-dark mr-1">pneus</span><span class="badge badge-danger mr-1">automotivo</span><span class="badge badge-primary mr-1">borracha</span></p>
					</div>
				</div> 

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href=""><img src="/img/prod/ativado.110.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Ativado 110</a> </h5>
						<p class="m-0"><span class="badge badge-info mr-1">desincrustante</span><span class="badge badge-danger mr-1">limpa baú</span><span class="badge badge-warning mr-1">automotivo</span></p>
					</div>
					<!--
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href=""><img src="/img/prod/mult.max.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Sanq Chassis 110</a> </h5>
						<p class="m-0"><span class="badge badge-info mr-1">desengraxante</span><span class="badge badge-warning mr-1">alcalino</span><span class="badge badge-light mr-1">automotivo</span></p>
					</div>
					<div class="col-12 col-sm-4 mb-3 mx-auto text-center">
						<a href=""><img src="/img/prod/pneu.brill.png" class="img-fluid" alt="Santana Química"></a>						
						<h5 class="m-0"> <a class="color-red" href="#">Sanq Chassis 110</a> </h5>
						<p class="m-0"><span class="badge badge-info mr-1">desengraxante</span><span class="badge badge-warning mr-1">alcalino</span><span class="badge badge-light mr-1">automotivo</span></p>
					</div>
					-->
				</div> 

			</div>				
		</div> <!-- END LINHA GLOBAL -->
	</div>
</div>

{%endblock%}