<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{BASE}}vendor/bootstrap/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{BASE}}public/css/style.css"/>
	<title>
		{% block title %}{% endblock %}
	</title>
</head>
<body>

	  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark slidebar-perso" >
    <a href="{{BASE}}dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">Usuário - {{ session.nameUser }}</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{BASE}}dashboard/#" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="{{BASE}}dashboard#"/></svg>
          Casa
        </a>
      </li>
      <li>
        <a href="#machine" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="{{BASE}}dashboard/#machine"/></svg>
          Máquinas
        </a>
      </li>
      <li>
        <a href="#product" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="{{BASE}}dashboard/#product"/></svg>
          Produtos
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>{{ session.nameUser }}</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="{{BASE}}dashboard/cadastraProductr">Novo produto...</a></li>
        <li><a class="dropdown-item" href="{{BASE}}dashboard/cadastrarMachine">Nova Máquina...</a></li>
        <li><a class="dropdown-item" href="{{BASE}}dashboard/profile">Perfil</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{BASE}}dashboard/sing_out">Sair</a></li>
      </ul>
    </div>
  </div>

 <div class="conteudo-dash">

	{% block body %}{% endblock %}

</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>