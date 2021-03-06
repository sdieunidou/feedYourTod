
$(document).ready(function() {
    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container = $('div#child_childFoods');

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container.find(':input').length;

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('#add_childfood').click(function(e) {
        addChildFood($container);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'un nouveau child par exemple).
    if (index == 0) {
        //addChildFood($container);
    } else {
        // S'il existe déjà des childFoods, on ajoute un lien de suppression pour chacun d'entre eux
        $container.children('div').each(function() {
            addDeleteLink($(this));
        });
    }


    // La fonction qui ajoute un formulaire ChildFoodType
    function addChildFood($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var template = $container.attr('data-prototype')
                .replace(/__name__label__/g, 'ChildFood n°' + (index-1))
                .replace(/__name__/g, index)
            ;

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On ajoute au prototype un lien pour pouvoir supprimer le childFood
        addDeleteLink($prototype);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);

        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        index++;
    }



    // La fonction qui ajoute un lien de suppression d'un childFood
    function addDeleteLink($prototype) {
        // Création du lien
        var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');

        // Ajout du lien
        $prototype.find('>div:first-child').append($deleteLink);

        // Ajout du listener sur le clic du lien pour effectivement supprimer le childFood
        $deleteLink.click(function(e) {
            $prototype.remove();

            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }


});
