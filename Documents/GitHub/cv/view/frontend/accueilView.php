<?php 
    session_start();
    $this->title = 'serri stephan' ;
 include "menu.php" ;
    ?>

               
  
    <section id="about" class="container-fluid">
        <div class="col-xs-8 col-md-4 profile-picture"> <img src="/cv/public/images/me1.jpg" alt="Stephan" class="img-circle"> </div>
        <div class="heading">
            <h1>Bonjour, c'est moi Stephan</h1>
            <h3>Développeur Web</h3> <a href="" class="button1">Télécharger CV</a> </div>
    </section>
    <section id="skills">
        <div class="red-divider"></div>
        <div class="heading">
            <h2>Compétences</h2> </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
                            <h5>HTML 85%</h5> </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
                            <h5>CSS 85%</h5> </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                            <h5>JAVASCRIPT 90%</h5> </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
                            <h5>JQUERY 85%</h5> </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                            <h5>BOOTSTRAP 80%</h5> </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
                            <h5>PHP 75%</h5> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="experience">
        <div class="container">
            <div class="white-divider"></div>
            <div class="heading">
                <h2>Expérience Professionelle</h2> </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"><span class="glyphicon glyphicon-briefcase"></span></div>
                    <div class="timeline-panel-container">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h3>Freelance</h3>
                                <h4>Développeur Web Junior</h4>
                                <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 2018</p>
                            </div>
                            <div class="timeline-body">
                                <p>Dévellopement de plusieurs projets web.</p>
                                <p>Langages utilisées: CSS/HTML/Javascript/Php</p>
                                <p>Framework utilisés: Bootstrap/JQuery</p>
                                <p>Bonnes pratique utilisées: POO/MVC</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge"><span class="glyphicon glyphicon-briefcase"></span></div>
                    <div class="timeline-panel-container-inverted">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h3>Haribo Ricqles Zan</h3>
                                <h4>Conducteur de ligne automatisée</h4>
                                <p class="text-muted"><small class="glyphicon glyphicon-time"></small> 1999-Aujourd'hui</p>
                            </div>
                            <div class="timeline-body">
                                <p>Maîtrise du procédé industriel de fabrication de produits alimentaires. Qualités nécessaires : respect des délais, des cadences, de la qualité et du coût des produits. </p>
                                <p>Animation d'une équipe d'opérateurs de fabrication </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section id="education">
        <div class="red-divider"></div>
        <div class="heading">
            <h2>Education</h2> </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="education-block">
                        <h5>1998</h5> <span class="glyphicon glyphicon-education"></span>
                        <h3>Lycée St Exupéry - Marseille</h3>
                        <h4>Baccalauréat économique et social</h4>
                        <div class="red_divider"></div>
                        <p>Intelligence Artificielle</p>
                        <p>Systeme d'informations</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="education-block">
                        <h5>2018</h5> <span class="glyphicon glyphicon-education"></span>
                        <h3>OpenClassRooms</h3>
                        <h4>Intégrateur Web Junior</h4>
                        <div class="red_divider"></div>
                        <p>HTML/CSS, Javascript, JQuery,PHP</p>
                        <p>Responsive Design</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio">
        <div class="container">
            <div class="red-divider"></div>
            <div class="heading">
               <section id="portfolio">
        <div class="container">
            <div class="red-divider"></div>
            <div class="heading">
                <h2>Portfolio</h2> </div>
    
               <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                     <li data-target="#myCarousel" data-slide-to="3"></li>
                
                </ol>
               
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                        <a class="thumbnail" href="" target="_blank"> <img src="/cv/public/images/forteroche.png" > </a></div>
                    
             
                     <?php while ($data = $portfolio->fetch())
                      { ?>
                    <div class="item ">
                        <a class="thumbnail" href="index.php?action=portfolio&amp;id= <?php echo $data['id'] ?>" target="_blank"> <img src= <?php  echo $data['image'] ; ?> alt="site agence web"> </a></div><?php  } ?>
                    
                </div>
               <a class="left carousel-control" href="#myCarousel" data-slide="prev" role="button"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next" role="button"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
            </div>
        </div>
    </section>
    



    