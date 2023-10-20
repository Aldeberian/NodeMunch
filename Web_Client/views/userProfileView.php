<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile de {{ username }}</title>
</head>

    <body>

    <!-- Check data existence -->
    {% if dataUser is defined %}

    <!-- Error handling -->
    {% if dVueEreur is defined and dVueEreur|length >0 %}
          <h2>ERREUR !!!!!</h2>
          {% for value in dVueEreur %}
            <p>{{value}}</p>
          {% endfor %}
    {% endif %}

        <h1>Profil de {{ username }}</h1> 
        <h2>Nombre de parties : {{ nbGames }}</h2>
        <h2>Nombre de graphes : {{ nbGraph }}</h2>
        <h2> Graphes favoris : </h2>

        <table>
        {% for graph in listGraph %}
            <td>{{ graph }}</td>
        {% endfor %}
        </table>

    {% else %}
        <h1>Erreur dans le passage des données utilisateur entre le controlleur et la vue</h1>
    {% endif %}

    </body> 

</html>