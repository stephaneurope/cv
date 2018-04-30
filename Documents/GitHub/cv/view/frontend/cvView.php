<?php 
    
    $this->title = 'serri stephan' ;
 include "menu.php" ;?>
    
 <div id="top">
    <div id="cv" class="instaFade">
        <div class="mainDetails">
            <div id="headshot" class="quickFade"> <img src="public/images/me2.jpg" alt="Alan Smith" /> </div>
            <div id="name">
                <?php while ($data0 = $result->fetch()){  ?>
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
        <div id="mainArea" class="quickFade delayFive">
            <section>
                <article>  
                    <div class="sectionTitle">
                        <h1> Profil Personnel</h1> </div>
                    <div class="sectionContent">
                        <?php while ($data = $proCv->fetch()){  
                echo $data['profil'];} ?>
                             </div>
                </article>
                <div class="clear"></div>
            </section>
            <section>
                <div class="sectionTitle">
                    <h1>Experience Professionelle</h1> </div>
                <div class="sectionContent">
                     <?php while ($data1 = $expCv->fetch()){ ?>
                    <article>
                        <h2><?=$data1['title'];?></h2>
                        <p class="subDetails"><?=$data1['period'];?></p>
                        <p><?=$data1['description'];?></p>
                    </article>
                   <?php }  ?>
                </div>
                <div class="clear"></div>
            </section>
            <section>
                <div class="sectionTitle">
                    <h1>Compétences</h1> </div>
                <div class="sectionContent">
                    <ul class="keySkills">
                        <?php while ($data2 = $avCv->fetch()){ ?>
                        <li><?=$data2['avantage'];?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="clear"></div>
            </section>
            <section>
                <div class="sectionTitle">
                    <h1>Education</h1> </div>
                <div class="sectionContent">
                    <?php while ($data3 = $edCv->fetch()){ ?>
                    <article>
                        <h2><?=$data3['title_education'];?></h2>
                        <p class="subDetails"><?=$data3['title_secondary'];?></p>
                        <p><?=$data3['description_education'];?></p>
                    </article>
                    <?php } ?>  
                </div>
                <div class="clear"></div>
            </section>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
        var pageTracker = _gat._getTracker("UA-3753241-1");
        pageTracker._initData();
        pageTracker._trackPageview();
    </script>
