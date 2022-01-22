{% extends "partials/body.twig.php" %}
{% block title %}login{% endblock %}
{% block body %}


<div class="max-width center-screen padding">

<form class="form-margin" action="{{BASE}}verifica" method="POST">
  <fieldset>
    <legend>Login in the system</legend>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
      <input type="email" class="form-control bg-gray" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
      <input type="password" name="pass" class="form-control bg-gray" id="exampleInputPassword1" placeholder="Password" required>
    </div>
    <div class="mt-3 text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </fieldset>
</form>

</div>

{% endblock %}