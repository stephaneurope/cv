  <?php  include "menu.php" ?>
<div class="container all">
  <br> <br>
    <h1>Profil</h1>
  	<hr>
    <?php while ($data0 = $result->fetch()){  ?>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <form class="form-horizontal" role="form" action="index.php?action=updateProImg" method="post" enctype="multipart/form-data">
        <div class="img_profil text-center">

          <img src="public/images/<?=$data0['profil_img']?>"  class=" avatar img-circle img-responsive" alt="avatar">
          <h6>Changer sa photo de profil...</h6>
           <input type="file" name='profil_image' class="form-control">
            <span class="help-inline"><?= $imageError;?></span>
        </div>
        <div class="form-actions">
                    <button type="submit" class="btn btn-default"> Modifier</button>               
                    </div>
                  </form>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
      
        <div class="flashconnect">
            <?php $session->flash();?>
        </div>
        <h3>infos Personnelle</h3>
        
        <form class="form-horizontal" role="form" action="index.php?action=updateProfil" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-lg-3 control-label">Prénom:</label>
            <div class="col-lg-8">
              <input class="form-control" name='prenom' type="text" value="<?=$data0['prenom']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nom:</label>
            <div class="col-lg-8">
              <input class="form-control" name='nom' type="text" value="<?=$data0['nom']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Site Web:</label>
            <div class="col-lg-8">
              <input class="form-control" name='web' type="text" value="<?=$data0['web']?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name='mail' type="text" value="<?=$data0['mail']?>">
            </div>
          </div>
   
          <div class="form-group">
            <label class="col-md-3 control-label">Pseudo:</label>
            <div class="col-md-8">
              <input class="form-control" name='pseudo' type="text" value="<?=$data0['pseudo']?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-md-3 control-label">Mobile:</label>
            <div class="col-md-8">
              <input class="form-control" name='mobile' type="text" value="<?=$data0['mobile']?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-md-3 control-label">Activité:</label>
            <div class="col-md-8">
              <input class="form-control" name='works' type="text" value="<?=$data0['works']?>">
            </div>
          </div>
          <?php } ?>        
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Mettre à jour"><a href="index.php?action=boardPrincipal" type="button" class= "btn btn-default btn4">Retour</a>
              <span></span>
              
            </div>
          </div>
        </form>
        
      </div>
  </div>
</div>
<hr>