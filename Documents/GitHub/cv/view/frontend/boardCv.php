<?php  include "menu.php" ?>
<br><br><br>
        <div>
            <div class="container admin">
               
                <div class="row">
                    <h1><strong>CV </strong></h1>
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
                                          Profil Personnel
                                    </td>
                                    
                                    <td width=50%> <a class="btn btn-primary btn-reduc" href="index.php?action=profilPersonnel"><span class="glyphicon glyphicon-pencil"></span> Modifier</a> </td>
                                </tr>
                                <tr>
                                    <td>
                                          Expérience Professionnelle
                                    </td>
                                    
                                    <td width=50%> <a class="btn btn-primary btn-reduc" href="index.php?action=experienceProfessionnel"><span class="glyphicon glyphicon-pencil"></span> Modifier</a> <a class="btn btn-success btn-reduc" href="index.php?action=ajoutExPro"><span class="glyphicon glyphicon glyphicon-plus"></span> Ajouter</a> <a class="btn btn-danger btn-reduc" href="index.php?action=deleteExp"> Suprimer</a></td>
                                </tr>
                                <tr>
                                    <td>
                                          Compétences
                                    </td>
                                    
                                    <td width=50%> <a class="btn btn-primary btn-reduc" href="index.php?action=competences"><span class="glyphicon glyphicon-pencil"></span> Modifier</a> <a class="btn btn-success btn-reduc" href="index.php?action=ajoutComp"><span class="glyphicon glyphicon-plus"></span> Ajouter</a> <a class="btn btn-danger btn-reduc" href="index.php?action=deleteComp"> Suprimer</a></td>
                                </tr>
                                <tr>
                                    <td>
                                          Education
                                    </td>
                                    
                                    <td width=50%> <a class="btn btn-primary btn-reduc" href="index.php?action=education"><span class="glyphicon glyphicon-pencil"></span> Modifier</a> <a class="btn btn-success btn-reduc" href="index.php?action=ajoutEduc"><span class="glyphicon glyphicon glyphicon-plus"></span> Ajouter</a> <a class="btn btn-danger btn-reduc" href="index.php?action=deleteEduc"> Suprimer</a></td>
                                </tr>
                          
                        </tbody>
                    </table>
                </div>
                <a href="index.php?action=boardPrincipal" class="btn btn-primary  pad"><span class="glyphicon glyphicon-arrow-left">  Retour</a>
            </div>