$(function () {
    // alert('test');
    var container = $('div#collectionContainer');

    var addAdresse = $('<a href="#" id="add_category" class="btn btn-info">Ajouter une adresse</a>');
    container.append(addAdresse);

    addAdresse.click(function (e) {
        ajouterAdresse(container);
        e.preventDefault();
        return false;
    });

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = container.find(':input').length;

    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
    if (index == 0) {
        AjouterAdresse(container);
    } else {
        // Pour chaque catégorie déjà existante, on ajoute un lien de suppression
        container.children('div').each(function() {
            addDeleteLink($(this));
        });
    }

    function ajouterAdresse(container) {
        var prototype = $(container.attr('data-prototype').replace(/__name__label__/g, '<h3 class="text-info">Adresse n°' + (index+1) + '</h3>')
            .replace(/__name__/g, index));

        addDeleteLink(prototype);
        container.append(prototype);
    }

    function addDeleteLink(prototype) {
        deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');
        prototype.append(deleteLink);
        // Ajout du listener sur le clic du lien
        deleteLink.click(function(e) {
            prototype.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
});