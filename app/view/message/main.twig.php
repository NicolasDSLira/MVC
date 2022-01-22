{% extends "partials/body.twig.php" %}
{% block title %}ERRO{% endblock %}
{% block body %}


<div class="max-width center-screen padding">

<div class="card text-white bg-danger mb-3" >
  <div class="card-header"> <h4 class="card-title">{{title}}</h4> </div>
  <div class="card-body">
  
    <p class="card-text">{{message}}.</p>
  </div>
</div>

</div>

{% endblock %}