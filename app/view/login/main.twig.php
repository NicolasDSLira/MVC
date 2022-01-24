{% extends "partials/body.twig.php" %}
{% block title %}login{% endblock %}
{% block body %}


<div class="max-width center-screen padding">

<form class="form-margin" action="{{BASE}}verifica" method="POST">
  <fieldset>
    <legend>Entrar no sistema</legend>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Email </label>
      <input type="email" class="form-control bg-gray" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@email.com" name="email" required>
      <small id="emailHelp" class="form-text text-muted">Utilize seu email cadastrado.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Senha</label>
      <input type="password" name="pass" class="form-control bg-gray" id="exampleInputPassword1" placeholder="Password" required>
    </div>
    <div class="mt-3 text-right">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </fieldset>
</form>

</div>

{% endblock %}