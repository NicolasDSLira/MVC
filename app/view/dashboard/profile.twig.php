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
		    	<button type="button" class="btn btn-outline-danger" onclick="modal()">Excluir conta</button>
		    </div>
		  </fieldset>
		</div>


<div class="modal">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Excluir </h5>
        <button type="button" onclick="closeModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja excluir sua conta ? Está ação será irreversível.</p>
      </div>
      <div class="modal-footer">
        <a href="{{BASE}}dashboard/delete" class="btn btn-danger">Excluir</a>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="closeModal()">Não excluir</button>
      </div>
    </div>
  </div>
</div>

		<hr>

<script type="text/javascript">
function modal() {
	document.querySelector('.modal').style.display = 'block';
}

function closeModal(){
	document.querySelector('.modal').style.display = 'none';
}
</script>

{% endblock %}