{% extends "partials/dash.twig.php" %}
{% block title %}Area secreta{% endblock %}
{% block body %}

  <h1 class=" text-center mt-5">Bem vindo de volta {{ session.nameUser }}</h1>

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
        

        {% if array == "" %}

          <div class="mt-5 mb-5">
            <h1>Cadastre uma máquina</h1>
              <a class="btn btn-success" href="{{BASE}}dashboard/cadastrarMachine">Cadastrar</a>
          </div>

        {% else %}
          
          {% for row in array %}

            <div class="card mb-3 max-card" style="width: 50%; margin-left: 10%;">
              <h3 class="card-header text-center"> {{ row.nome|e }} </h3>
    
              <div class="card-body">
                <p class="card-text">{{ row.desc|e }}</p>
              </div>
                <img src="{{ row.url|e }}" width="100%" style="margin: 0 auto;">
              <div class="mt-3 mb-3 text-end" style="margin-right: 10px;">
                <button onclick="modal('{{ row.id }}', 'Machine')" class="btn btn-danger">Excluir</button>
              </div>
            </div>

          {% endfor %}

        {% endif %}

      </div>
    </a>

    <hr>

    <a name="product">
      <div class="products mt-5">
        <!-- Mostrando os perifericos -->

      {% set arrayPerife = session.PerifericoArray %}
        
        <h1 class="mb-3 text-center"> Periféricos </h1>
          <div class="text-end mb-5" style="margin-right: 5rem;">
            <a href="{{BASE}}dashboard/cadastraPeriferico" class="btn btn-success"> Registrar Periférico </a>
          </div>

         
          {% for row in arrayPerife %}

            {% for line in row %}



            <div class="card mb-3 max-card" style="width: 50%; margin-left: 10%;">
              <h3 class="card-header text-center"> {{ line.name|e }} </h3>
    
              <div class="card-body">
                <p class="card-text">{{ line.description|e }}</p>
                 <p class="card-text">Máquina ID #{{ line.MachineId|e }}</p>
              </div>
                <img src="{{ line.urlImg|e }}" width="100%" style="margin: 0 auto;">
              <div class="mt-3 mb-3 text-end" style="margin-right: 10px;">
                <button onclick="modal('{{ line.id }}', 'Periferico')" class="btn btn-danger">Excluir</button>
              </div>
            </div>

            {% endfor %}

          {% endfor %}


      </div>
    </a>


{# Modal #}

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
        <a href="" class="btn btn-danger" id="link-delete">Excluir</a>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="closeModal()">Não excluir</button>
      </div>
    </div>
  </div>
</div>

    <hr>

<script type="text/javascript">
function modal(value, page) {
  document.querySelector('.modal').style.display = 'block';
  document.getElementById("link-delete").href = '{{BASE}}dashboard/'+page+'/delete?'+value;
}

function closeModal(){
  document.querySelector('.modal').style.display = 'none';
}
</script>


{% endblock %}