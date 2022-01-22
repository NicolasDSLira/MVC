{% extends "partials/dash.twig.php" %}
{% block title %}Area secreta{% endblock %}
{% block body %}

  <h1 class=" text-center mt-5">Bem vindo de volta {{ session.idUser }}</h1>

  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

  <hr>

    <a name="machine">
      <div class="machines mt-5">

        <!-- Local mostrando as maquinas do cliente -->

        {% set array = session.MachineArray %}
        {% for row in array %}

        <div class="card mb-3 max-card" style="width: 50%; margin-left: 10%;">
          <h3 class="card-header text-center"> {{ row.nome|e }} </h3>
    
          <div class="card-body">
            <p class="card-text">{{ row.desc|e }}</p>
          </div>
          <img src="{{ row.url|e }}" width="100%" style="margin: 0 auto;">
          <div class="mt-3 mb-3 text-end" style="margin-right: 10px;">
            <a href="" class="btn btn-info">Visualizar</a>
          </div>
        </div>

        {% endfor %}

      </div>
    </a>

    <hr>

    <a name="product">
      <div class="products mt-5">
        <!-- Mostrando os produtos -->

         <div class="card mb-3 max-card" style="width: 50%; margin-left: 10%;">
          <h3 class="card-header text-center"> Title </h3>
    
          <div class="card-body">
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
            <rect width="100%" height="100%" fill="#868e96"></rect>
            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
          </svg>
          <div class="mt-3 mb-3 text-end" style="margin-right: 10px;">
            <a href="" class="btn btn-danger">Visualizar</a>
          </div>
        </div>
      </div>
    </a>


{% endblock %}