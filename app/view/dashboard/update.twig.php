{% extends "partials/dash.twig.php" %}
{% block title %} {{session.nameUser}} {% endblock %}
{% block body %}

  	<hr>
    	<!-- Local editar dados  -->
		<form method="POST" action="{{BASE}}dashboard/update">
		  <fieldset>
		  	<legend>DADOS</legend>
		  	<div class="form-group">
		    	<label class="form-label mt-4" for="readOnlyInput">Nome:</label>
		    	<input class="form-control bg-gray" name="updateName" type="text" value="{{ session.nameUser }}">
		    </div>
		    <div class="form-group">
		    	<label class="form-label mt-4" for="readOnlyInput">E-mail:</label>
		    	<input class="form-control bg-gray" name="updateEmail" type="text" value="{{ session.emailUser }}">
		    </div>
		    <div class="form-group">
		    	<label class="form-label mt-4" for="readOnlyInput">Senha:</label>
		    	<input class="form-control bg-gray" name="updatePassword"  type="password" value="{{ session.pass_user }}">
		    </div>
		    <div class="mt-3 form-group-row" style="text-align: right;">
		    	<button type="submit" class="btn btn-success">Enviar</button>
		    </div>
		  </fieldset>
		</form>
	<hr>

{% endblock %}