<?php  include "menu.php" ?>
<br><br><br>
<div class="container delete">
    <div class="row">
        <div class="clear">
            <h1><strong>Supprimer un projet </strong></h1>
            <br>
            <form class="form" role="form" action="index.php?action=eraseProject&id=
<?= $portfolio['id']?>" method="post">
                <p class="alert-warning">Etes vous sur de vouloir supprimer?</p>
                <div class="form-actions">
                    <div class="warning">
                        <input type="submit" class="btn btn-warning" href="index.php?action=boardFolio" value='Oui' /> <a class="btn btn-danger" href="index.php?action=boardFolio">Non</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>