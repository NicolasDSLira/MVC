{% extends "partials/dash.twig.php" %}
{% block title %}Cadastro Machine{% endblock %}
{% block body %}
      <div class="table-active paddingt">
        <form action="{{BASE}}dashboard/machine/create" method="POST">
          <fieldset>
          <legend>Cadastre sua máquina</legend>
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
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </fieldset>
        </form>
      </div>

{% endblock %}