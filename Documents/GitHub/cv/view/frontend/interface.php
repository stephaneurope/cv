<?php  include "menu.php" ?>
        <div>
            <div class="container admin">
               
               <br><br><br>
                <div class="flashconnect">
                    <?php $session->flash();?>
                </div>
                <div class="row">
                    <h1><strong>Tableau de Bord Général </strong></h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sections</th>
                     
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                   
                                <tr>
                                    <td>
                                          Projets du PortFolio
                                    </td>
                                    
                                    <td width=50%> <a class="btn btn-success btn-reduc" href="index.php?action=boardFolio">Accéder aux Projets</a> </td>
                                </tr>
                                <tr>
                                    <td>
                                          Curiculum Vitae
                                    </td>
                                    
                                    <td width=50%> <a class="btn btn-success btn-reduc" href="index.php?action=boardCv">Accéder au CV</a> </td>
                                </tr>
                                <tr>
                                    <td>
                                          Profil
                                    </td>
                                    
                                    <td width=50%> <a class="btn btn-success btn-reduc" href="index.php?action=profil">Accéder au Profil</a> </td>
                                </tr>
                               
                          
                        </tbody>
                    </table>
                </div>
            </div>