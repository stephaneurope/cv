<?php 
    
    $this->title = 'serri stephan' ;
 include "menu.php" ;?>
    
 <div id="top">
    <div id="cv" class="instaFade">
    <div class="mainDetails">
          <?php while ($data0 = $result->fetch()){  ?>  
            <div id="headshot" class="img_profil quickFade"> <img src="public/images/<?=$data0['profil_img']?>"  alt="Serri Stephan" /> </div>
            <div id="name">
                
                <h1 class="quickFade delayTwo"><?=$data0['nom'].' '.$data0['prenom'] ?></h1>
                <h2 class="quickFade delayThree"><?=$data0['works']?></h2> </div>
            <div id="contactDetails" class="quickFade delayFour">
                <ul>
                    <li>email: <a href="mailto:serri-stephan@gmail.com" target="_blank"><?=$data0['mail']?></a></li>
                    <li>web: <a href="<?=$data0['web']?>"><?=$data0['web']?></a></li>
                    <li>mobile: <?=$data0['mobile']?></li>
                </ul>
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
         <div class="flashconnect">
            <?php $session->flash();?>
        </div>
        <div id="mainArea" class="quickFade delayFive">
             <section>
                
                <div class="sectionTitle">
                    <h1>Experience Professionelle</h1> </div>
                    <?php while ($data1 = $expCv->fetch()){ ?>
                <div class="sectionContent">
                     
                    <article>
                        <form action='index.php?action=updateExperienceProfessionnel&id=<?= $data1['id']?>' method="post">
                        <h2><input name="title" value="<?=$data1['title'];?>"/></h2>
                        <p class="subDetails"><input name="period" value="<?=$data1['period'];?>"/></p>
                        <p><textarea name="description"><?=$data1['description'];?></textarea></p>
                         <input href="" type="submit" class="btn btn-success " value=" Modifier">
                    </article>
                   
                </div>
           
                <div class="clear"></div>
                    <div class="form-actions">
                   </div>
                
            </form>
<?php }  ?>
            <a class="btn btn-primary" href="index.php?action=boardCv"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a> 
            </section>
            
        
  
    </div>
</div>


