<?php  include "menu.php" ;

?>
<br><br><br><br>
        <div class="container admin">
            <div class="row">
              
                <h1><strong>Ajouter un projet </strong></h1>
                    <br>
                    <form class="form" role="form" action="index.php?action=portfolioInsertAction" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                        <label for="titre">Titre:</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" value="">
                             <span class="help-inline"><?php echo $titreError ;?></span>

                        </div>  
                          <div class="form-group">   
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="">
                             <span class="help-inline"><?php echo $descriptionError ;?></span>
                        </div>


                         <!--<div class="form-group">
                        <label for="category">Technologies:</label>
                        <select class="form-control" id="technologies" placeholder="technologies" name="techno" >    <option value="<i class='fab fa-html5 fa-3x'></i>">html</option> 
                           <option value="<i class='fab fa-css3-alt fa-3x'></i>">css</option>   
                           <option value="<i class='fab fa-js fa-3x'></i>">javascript</option> 
                        </select>
                             <span class="help-inline"></span>
                        </div>-->


   <div class="form-group">
      <label for="techno">Technologies:</label><br>
      <input type="checkbox" checked="checked" name="techno" id="techno" value="<i class='fab fa-html5 fa-3x'></i>" /> <label for="techno">html</label><br>
       <input type="checkbox" name="techno" id="techno" value="<i class='fab fa-css3-alt fa-3x'></i>"/> <label for="techno">css</label><br>
       <input type="checkbox" name="techno" id="techno" value="<i class='fab fa-js fa-3x'></i>"/> <label for="techno">javascript</label>
       <span class="help-inline"></span>
   </div>
                 

                        <div class="form-group">
                        <label for="comment">Commentaire:</label>
                        <input type="" step="" class="form-control" id="" name="comment" value="">
                             <span class="help-inline"><?php echo $commentError ;?></span>
                        </div>
                        
                        <div class="form-group">
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?php echo $imageError ;?></span>
                        </div>
                       
                    <div class="form-group">   
                        <label for="liens">liens:</label>
                        <input type="text" class="form-control" id="description" name="liens" placeholder="liens" value="">
                             <span class="help-inline"><?php echo $liensError ;?></span>
                        </div>
                    <br>
                    <div class="form-actions">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                    <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"> Retour</span></a>
                    </div>
                </form>
                <br> <br>
                
            
            </div>
        
        </div>