<div id="toast">
    <?php if (isset($_GET['succes'])) { ?>
        <div id="toast-success">
            <img src="/ProjetXML/views/ourAssets/images/toast-save.png" />
            <span>
                L'ajout est effectué avec succés
            </span>
        </div>
    <?php } elseif (isset($_GET['info'])) { ?>
        <div id="toast-info">
            <img src="/ProjetXML/views/ourAssets/images/toast-info.png" />
            <span>
                les modifications ont été enregistrés
            </span>
        </div>
    <?php } elseif (isset($_GET['attention'])) { ?>
        <div id="toast-warning">
            <img src="/ProjetXML/views/ourAssets/images/toast-warning.png" />
            <span>
                La suppression est effectuée avec succés
            </span>
        </div>
    <?php } elseif (isset($_GET['erreur'])) { ?>
        <div id="toast-error">
            <img src="/ProjetXML/views/ourAssets/images/toast-error.png" />
            <span>
                Les informations ne sont pas enregistrées
            </span>
        </div>
    <?php } ?>
</div>
