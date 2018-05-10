<?php  include "menu.php" ;

?>
<br><br><br><br>
        <div class="container admin">
            <div class="row">
              
                <h1><strong>Modifier ce projet </strong></h1>
                    <br>
                    <h1 class="my-4"><?= $portfolio['titre'] ?>
        
      </h1>

      <!-- Portfolio Item Row -->
   
      <div class="row">

        <div class="col-md-6">

          <img class="rounded mx-auto d-block img-thumbnail img-responsive" style='max-height:350px;max-width: 350px;' src='/cv/public/images/<?= $portfolio['image'] ?>' alt="">
        </div>
        <div class="col-md-6">
        <form class="form" role="form" action="index.php?action=imageModif&id=<?php echo $portfolio['id'] ;?>" method="post" enctype="multipart/form-data">
<div class="form-group">
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?= $imageError;?></span>
                    
                        </div>
                        </div>
<div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                    <a class="btn btn-primary" href="index.php?action=boardFolio"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a>
                    </div>
</form>
</div>
                </div>
            </div>