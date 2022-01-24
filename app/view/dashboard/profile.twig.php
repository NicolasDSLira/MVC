{% extends "partials/dash.twig.php" %}
{% block title %} {{session.nameUser}} {% endblock %}
{% block body %}

  <hr>
        <!-- Local mostrando os dados do user  -->

        
		<div class="form-group">
		  <fieldset>
		  	<legend>DADOS</legend>
		  	<div class="form-group">
		    	<label class="form-label mt-4" for="readOnlyInput">Nome:</label>
		    	<input class="form-control" id="readOnlyInput" type="text" value="{{ session.nameUser }}" readonly="">
		    </div>
		    <div class="form-group">
		    	<label class="form-label mt-4" for="readOnlyInput">E-mail:</label>
		    	<input class="form-control" id="readOnlyInput" type="text" value="{{ session.emailUser }}" readonly="">
		    </div>
		    <div class="form-group">
		    	<label class="form-label mt-4" for="readOnlyInput">Senha:</label>
		    	<input class="form-control" id="readOnlyInput" type="password" value="{{ session.pass_user }}" readonly="">
		    </div>
		    <div class="mt-3 form-group-row" style="text-align: right;">
		    	<a href="{{BASE}}dashboard/alterar" class="btn btn-outline-success" style="margin-left: 20px;">editar conta</a>
		    </div>
		  </fieldset>
		</div>

		<hr>


{% endblock %}