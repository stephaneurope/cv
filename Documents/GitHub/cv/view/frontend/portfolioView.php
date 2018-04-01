<?php 

    $this->title = 'serri stephan' ;
    include "menu.php" ;

    ?>

    <br><br><br><br><br><br><br><br>

<?php while ($data = $portfolio->fetch())
    { ?>

    <h3>Titre</h3>
    <?php echo $data['titre']; ?> <br>	
<img src= '<?php  echo $data['image'] ; ?>'> <br>

<h3>Description</h3>

    <?php  echo $data['description'] ; ?> <br>

      <h3>Technologies Utilisées</h3>
    <?php echo $data['techno']; ?> <br>

<p>veuillez cliquer sur le lien: <a href = <?php echo $data['liens']?> >Liens</a> <br></p>

  <?php  } ?>


  
