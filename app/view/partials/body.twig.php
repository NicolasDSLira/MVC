<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{BASE}}vendor/bootstrap/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{BASE}}css/style.css"/>
	<title>
		{% block title %}{% endblock %}
	</title>
</head>
<body>
	{% include "partials/header.twig.php" %}

	{% block body %}{% endblock %}
</body>
</html>