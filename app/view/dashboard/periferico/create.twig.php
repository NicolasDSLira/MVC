{% extends "partials/dash.twig.php" %}
{% block title %}Cadastro Periférico{% endblock %}
{% block body %}
      <div class="table-active paddingt">
        <form action="{{BASE}}dashboard/periferico/create" method="POST">
          <fieldset>
          <legend>Cadastre um periférico</legend>
            <div class="form-group mt-3">
              <label  class="form-label mt-4">Nome</label>
                <input type="text" name="name" class="form-control bg-gray">
            </div>
            <div class="form-group mt-3">
              <label >Descrição</label>
                <textarea class="form-control bg-gray" rows="3" name="descript"></textarea>
            </div>
            <div class="form-group mt-3">
              <label >Url da imagem</label>
                <textarea class="form-control bg-gray" rows="3" name="urlImg"></textarea>
            </div>
            <div class="form-group mt-3">
              <label for="exampleSelect1" class="form-label mt-4">Example select</label>
                <select class="form-select bg-gray" id="exampleSelect1" name="IdMachine">
                  {% set array = session.MachineArray %}

                  {% for row in array %}

                    <option value="{{ row.id }}"> {{ row.id|e }} </option>
 
                  {% endfor %}

                </select>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </fieldset>
        </form>
      </div>

      <script type="text/javascript">
        document.getElementById("slidebar-home").classList.remove('active');
         document.getElementById("slidebar-home").classList.add('text-white');
        const element = document.getElementById("slidebar-periferico");
        element.classList.add('active');
        element.classList.remove('text-white');
      </script>

{% endblock %}