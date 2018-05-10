
    <?php  include "menu.php" ?>
        <div class="all">
            <div class="container admin">
                <br><br>
                <div class="flashconnect">
             
                </div>
                <div class="row">
                    <h1><strong>Projets </strong><a href="index.php?action=portfolioInsert" class="btn btn-success btn-lg pad"><span class="glyphicon glyphicon-plus"></span>  Ajout Projet</a></h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Projets</th>
                     
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = $portfolio->fetch()){ ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($data['titre']) ?>
                                    </td>
                                    
                                    <td width=50%> <a class="btn btn-info btn-reduc" href="index.php?action=projectView&id=<?= $data['id']?>"><span class="glyphicon glyphicon-eye-open"></span> Voir</a> <a class="btn btn-primary btn-reduc" href="index.php?action=portfolioModif&id=<?= $data['id']?>"><span class="glyphicon glyphicon-pencil"></span> Modifier information</a> <a class="btn btn-primary btn-reduc" href="index.php?action=imageFolio&id=<?= $data['id']?>"></span> Modifier image</a> <a class="btn btn-danger btn-reduc" href="index.php?action=cleanProject&id=<?= $data['id']?>"><span class="glyphicon glyphicon-remove"></span> Suprimer</a> </td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?action=boardPrincipal" class="btn btn-primary  pad"><span class="glyphicon glyphicon-arrow-left">  Retour</a>
            </div>