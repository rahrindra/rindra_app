$(function () {
    var container = $('div#fos_user_profile_form_utilisateurAdresses');

    var addAdresse = $('#ajouter_adresse');
    container.append(addAdresse);

    addAdresse.click(function (e) {
        ajouterAdresse(container);
        e.preventDefault();
    });

    function ajouterAdresse(container) {
        var prototype = $(container.attr('data-prototype')
            .replace(/__name__label__/g, '1')
            .replace(/__name__/g, '1'));

        container.append(prototype);
    }

    container.on('click', 'a.supprimer_adresse', function (e) {
        e.preventDefault();
        $(this).closest('.form-group').remove();
    });
});