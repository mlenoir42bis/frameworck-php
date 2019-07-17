
<?php include_once("includes/header_g.php"); ?>

<!--/Debut container  -->
<div class="container">
  <!--/Row container  -->
    <div class="row">
    <!--/Name Page id - class container  -->
        <div id="proposition" class="proposition">

            <!--/Content container  -->
            <div class="content content-g">
            <!--/Description content container  -->
                <div class="description-content-g">
                    <div class="description-header-content-g"></div>
                </div>
            <!--/End Description content container  -->
            
            <!--/Form container  -->
            <form id="formProposition" enctype="multipart/form-data">
            
                <!--/Form TITLE container  -->
                <hr>
                <h3 class="midle-g">Description de projet</h3>
                <hr>
                <!--/END Form TITLE container  -->

                <div class='alert alert-info'>
                <ul class="ul-g">
                    <li>
                     -> Les champs définit par <span class="colorRed">(*)</span> sont obligatoires.
                    </li>
                    <li>
                     -> Je peux vous aider à réaliser votre cahier des charges. Définissez au mieux votre projet à partir de ce formulaire.
                    </li>
                </ul>
                </div>

                <hr>
                
                <!--/Msg container  -->
                <div id="msg">
                    <?php
                        echo $data['msg'];
                    ?>
                </div>
                <!--/End Msg container  -->

                <div id="personalInfo" class="form-group-multiple-g form-group-multiple-g-1"> 
                    <h5>Information Personnel</h5>
                    <hr class="hr">

                    <!--/startcontainer fluid break -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                        <div class="form-group-g form-group form-group-form-proposition">
                        <label for="name">nom <span class="colorRed">(*)</span></label>
                        <input type="text" name="name" value="" id="name" class="form-input form-control">
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group-g form-group form-group-form-proposition">
                        <label for="firstname">prenom <span class="colorRed">(*)</span></label>
                        <input type="text" name="firstname" value="" id="firstname" class="form-input form-control">
                        </div>
                    </div> 
                        
                    </div>
                    </div>
                    </div>
                    <!--/End container fluid break -->

                    <!--/start container fluid Content -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <div class="form-group-g form-group form-group-form-proposition">
                                <label for="country">Pays <span class="colorRed">(*)</span></label>
                                <input type="text" name="country" value="" id="country" class="form-input form-control">
                            </div>
                            <div class="form-group-g form-group form-group-form-proposition">
                                <label for="adress">adresse <span class="colorRed">(*)</span></label>
                                <input type="text" name="adress" value="" id="adress" class="form-input form-control">
                            </div>
                            <div class="form-group-g form-group form-group-form-proposition">
                                <label for="cp">code postal <span class="colorRed">(*)</span></label>
                                <input type="number" name="cp" value="" id="cp" class="form-input form-control">
                            </div>
                        </div> 
                        <div class="col-md-6" id="mapSection">
                            <div class="form-group-g form-group form-group-form-proposition">
                                <div id="msgMap"></div>
                                <label for=form-proposition>geolocalisation-map</label>
                                <span id="lat" class="hide"></span>
                                <span id="lng" class="hide"></span>
                                <button type="button" class="btn btn-sm btn-blue" id="btn-map">Verifier votre adresse sur google map</button>
                                <div class="map-g midle-g map" id="map"><span style="text-align=center;">Google map non chargé</span></div>
                            </div>
                        </div> 

                    </div> 
                    </div><!--/row-->
                    </div>
                    <!--/End container fluid Content -->

                    <!--/start container fluid Content -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <label for="statusLegal">Status legal du contactant <span class="colorRed">(*)</span></label>
                            <ul class="list-group list-group-bool" id="statusLegal">
                                <li class="list-group-item list-group-item-bool list-group-item-bool-yes active form-group-multiple-g" value="particulier" id="particulier">Privé</li>
                                <li class="list-group-item list-group-item-bool list-group-item-bool-no" value="entreprise" id="entreprise">professionnel</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-g form-group form-group-form-proposition">
                                <label for="denomination">Information contact - dénomination légal - nom d'usage <span class="colorRed">(*)</span></label>
                                <input type="text" name="denomination" value="" id="denomination" class="form-input form-control">
                            </div>
                            <div class="form-group-g form-group form-group-form-proposition">
                                <label for=form-proposition>Information contact - dénomination légal - nom d'usage - carte de visite (format file)(format file multiple) ( format fichier Accepted: 'jpg', 'jpeg', 'png', 'doc', 'docx', 'pdf' )</label>
                                <input type="file" name="denominationFile[]" value="" id="denominationFile" class="form-file-g form-file-multiple-g form-control" multiple>
                            </div>
                        </div>

                    </div> 
                    </div><!--/row-->
                    </div>
                    
                    <!--/End container fluid Content -->
                    <!--/start container fluid Content -->
                    <div class="container-fluid form-group-multiple-g presentation form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                            <div class="form-group-g form-group form-group-form-proposition">
                                <label for="presentation">Présentation de votre entreprise</label>
                                <textarea name="presentation" id="presentation" class="form-control form-textarea form-textarea" rows="4"></textarea>
                            </div>

                    </div> 
                    </div><!--/row-->
                    </div>
                    <!--/End container fluid Content -->
                </div><!--/End personalInfo -->
                <hr>

                <!--/start container fluid break -->
                <div class="container-fluid form-group-multiple-g form-group-multiple-g-1">
                <div class="row">
                <div class="col-md-12">

                    <h5>Type Application</h5>
                    <hr class="hr">

                    <div class="form-group-g form-group form-group-form-proposition">
                        <label for="typeApp">Selectionner vos reponses parmi ces choix</label>
                        <ul class="list-group list-group-multi" id="typeApp">
                            <li class="list-group-item list-group-item-multi web no-exist" value="applicationWebNoExist" id="applicationWebNoExist">Application Web (non existante)</li>
                            <li class="list-group-item list-group-item-multi web exist" value="applicationWebExist" id="applicationWebExist">Application Web (existante)</li>
                            <li class="list-group-item list-group-item-multi mobile no-exist" value="applicationMobileNoExist" id="applicationMobileNoExist">Application Mobile (non existante)</li>
                            <li class="list-group-item list-group-item-multi mobile exist" value="applicationMobileExist" id="applicationMobileExist">Application Mobile (existante)</li>
                            <li class="list-group-item list-group-item-multi autres no-exist exist" value="autres" id="autres">Autres</li>
                        </ul>               
                    </div>
                    
                </div>
                </div>
                </div>
                <hr>
                <!--/End container fluid break -->

                <!--/start container fluid break -->
                <div class="container-fluid form-group-multiple-g form-group-multiple-g-1">
                <div class="row">
                <div class="col-md-12">

                    <h5>Description Project</h5>
                    <hr class="hr">

                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">
                    <div class="form-group-g form-group form-group-form-proposition">
                        <label class="text-left" for="projectFile">
                            Avez-vous un document/des documents a m'envoyer ? <br/>
                            <i>Un cahier des charges - description projet - maquete - croquis - brouillon (format file)(format file multiple) ( format fichier Accepted: 'jpg', 'jpeg', 'png', 'doc', 'docx', 'pdf')</i>
                        </label>
                        <input type="file" name="projectFile[]" id="projectFile" class="form-g-upload form-g-upload-multpile form-control form-input" multiple></textarea>
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">                    
                    <div class="col-md-12">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="contextProject">Description du contexte du projet</label>
                            <textarea name="contextProject" id="contextProject" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="objectifProject">Description des objectifs du projet</label>
                            <textarea name="objectifProject" id="objectifProject" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="constraintProject">Description des contraintes du projet</label>
                            <textarea name="constraintProject" id="constraintProject" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for=form-proposition>Avez vous une date maximum de fin de réalisation ?</label>
                            <ul class="list-group list-group-bool" id="dateEndProjectBool">
                                <li id="dateEndProjectBoolTrue" value="true" class="list-group-item list-group-item-horiz col-md-6 list-group-item-bool list-group-item-dateMax list-group-item-bool list-group-item-bool-yes form-group-multiple-g">oui</li>
                                <li id="dateEndProjectBoolFalse" value="false" class="list-group-item list-group-item-horiz col-md-6 list-group-item-bool list-group-item-dateMax list-group-item-bool list-group-item-bool-no active">Non</li>
                            </ul>   
                            <input name="dateEndProject" id="dateEndProject" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="descriptionProject">Description du projet</label>
                            <textarea name="descriptionProject" id="descriptionProject" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="usersProject">Description des différents utilisateurs du projet</label>
                            <textarea name="usersProject" id="usersProject" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 wm-no-exist">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="stat">Avez-vous des attentes particulières en matière de statistiques de fréquentation / suivi utilisateur ?</label>
                            <textarea name="stat" id="stat" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 wm-no-exist">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="maintenance">Suivi / maintenance / mise à jour |-> Quels type de suivi de l'application voulez-vous mettre en place ?</label>
                            <textarea name="maintenance" id="maintenance" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>    
                    </div>
                    </div>
                    </div>

                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="language">Langue</label>
                            <ul class="list-group list-group-bool" id="language">
                                <li id="multiple" value="multiple" class="list-group-item-horiz list-group-item-bool col-md-6 list-group-item ist-group-item-bool-yes form-group-multiple-g">multi-langue</li>
                                <li id="unique" value="unique" class="list-group-item-horiz list-group-item-bool col-md-6 list-group-item ist-group-item-bool-no active">Unique langue</li>
                            </ul>               
                        </div>
                    </div>
                    </div>
                    </div>
                    <!--/start container fluid Content -->
                    <div class="container-fluid form-group-multiple-g multiLanguage form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                            <div class="form-group-g form-group form-group-form-proposition">
                                <label for="multiLanguage">Liste des langues de l'application</label>
                                <textarea name="multiLanguage" id="multiLanguage" class="form-control form-textarea form-textarea" rows="4"></textarea>
                            </div>
                            <div class="form-group-g form-group form-group-form-proposition">
                                <label for="traduction">Moyen de traduction</label>
                                <textarea name="traduction" id="traduction" class="form-control form-textarea form-textarea" rows="4"></textarea>
                            </div>
                    </div> 
                    </div><!--/row-->
                    </div>
                    <!--/End container fluid Content -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">
                        <label>fonctionnalitées principal du projet</label>
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-blue more" id="moreFunctionnality" type="button">+</button>
                        </div>
                        <div class="col-md-12" id="group-proposition-functionnality">
                            
                        </div>
                    </div>    
                    </div>
                    </div>                
                </div>
                </div>
                </div>
                <hr>
                <!--/End container fluid break -->

                <div class="form-group-multiple-g form-group-multiple-g-1" id="templating">
                    <!--/Debut container fluid break -->
                    <h5>Templating</h5>
                    <hr class="hr">

                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <label>Créations de pages et définition des fonctionnalitées</label>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-sm btn-blue more" id="morePage">+</button>
                        </div>
                        <div class="col-md-12">
                            <div id="proposition-page">  
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                    <!--/End container fluid break -->
                    <!--/Debut container fluid break -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <div class="form-group-g  form-group form-group-form-proposition">
                            <label for="designBool"> Avez-vous un design / template défini</label>
                            <ul class="list-group list-group-bool" id="designBool">
                                <li id="designBoolTrue" value="true" class="list-group-item-horiz col-md-6 list-group-item list-group-item-bool list-group-item-bool-yes form-group-multiple-g">oui</li>
                                <li id="designBoolFalse" value="false" class="list-group-item-horiz col-md-6 list-group-item list-group-item-bool list-group-item-bool-no active">Non</li>
                            </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-g form-group form-group-form-proposition">               
                            <label class="text-left" for="designFile">
                                design / template (format file)(format file multiple) (format fichier Accepted: 'jpg', 'jpeg', 'png', 'doc', 'docx', 'pdf')</i>
                            </label>
                                <input type="file" id="designFile" name="designFile[]" class="form-g-upload form-g-upload-multpile form-control" multiple></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group-g form-group form-group-form-proposition infoDesign">
                                <label for="infoDesign">Information sur le design</label>
                                <textarea name="infoDesign" id="infoDesign" class="form-control form-textarea form-textarea" rows="4"></textarea>
                            </div>
                        </div> 
                    </div>
                    </div>
                    </div><!--/End container fluid break -->
                </div><!--/End templating -->
                <hr>

                <!--/start hosting -->
                <div class="form-group-multiple-g form-group-multiple-g-1" id="hosting">

                    <h5>Description Environnement technique</h5>
                    <hr class="hr">
                    
                    <!--/Debut container fluid break -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="nameField">Nom de domaine</label>
                            <textarea name="nameField" id="nameField" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                        
                    </div>
                    </div>
                    </div>
                    <!--/End container fluid break -->
                    <!--/Debut container fluid break -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="accomodation">Informations hébergeurs / hébergement</label>
                            <textarea name="accomodation" id="accomodation" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                        
                    </div>
                    </div>
                    </div>
                    <!--/End container fluid break -->
                    <!--/Debut container fluid break -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="security">Sécurité</label>
                            <textarea name="security" id="security" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                        
                    </div>
                    </div>
                    </div>
                    <!--/End container fluid break -->
                    <!--/Debut container fluid break -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="technology">Technologie / languages code / API / CMS</label>
                            <textarea name="technology" id="technology" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                        
                    </div>
                    </div>
                    </div>
                    <!--/End container fluid break -->
                    <!--/Debut container fluid break -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="bdd">Base de données</label>
                            <textarea name="bdd" id="bdd" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                        
                    </div>
                    </div>
                    </div>
                    <!--/End container fluid break -->
                </div> <!--/End hosting -->
                <hr>

                <!--/start container fluid break -->
                <div class="container-fluid form-group-multiple-g form-group-multiple-g-1">
                <div class="row">
                <div class="col-md-12">
                    
                    <h5>Budget</h5>
                    <hr class="hr">
                    
                    <div class="col-md-12 form-group-multiple-g form-group-multiple-g-2">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="budget">Avez vous un budget ?</label>
                            <input type="number" name="budget" id="budget" class="form-control form-input">
                        </div>
                    </div>

                    <div class="col-md-12 form-group-multiple-g form-group-multiple-g-2">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="billing">Adresse de facturation</label>
                            <textarea name="billing" id="billing" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                    
                </div>
                </div>
                </div>
                <hr>
                <!--/End container fluid break -->
                <div id="answer" class="form-group-multiple-g form-group-multiple-g-1">
                    <h5>Réponse</h5>
                    <hr class="hr">
                    <!--/Debut container fluid break -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="form-group-g  form-group form-group-form-proposition">
                            <label for="answer">Avez-vous des attentes particulières concernant la réponse a se formulaire ?</label>
                            <textarea name="answer" id="answer" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                        
                    </div>
                    </div>
                    </div>
                    <!--/End container fluid break -->
                    <!--/Debut container fluid Content -->
                    <div class="container-fluid form-group-multiple-g form-group-multiple-g-2">
                    <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-6">
                            <div class="form-group-g  form-group form-group-form-proposition">
                                <label for="email">Moyen de réponse: email <span class="colorRed">(*)</span></label>
                                <input type="email" name="email" id="email" class="form-control form-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-g  form-group form-group-form-proposition">
                                <label for="tel">Moyen de réponse: phone <span class="colorRed">(*)</span></label>
                                <input type="text" name="tel" id="tel" class="form-control form-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-g  form-group form-group-form-proposition">
                                <label for="preference_answer">Moyen de réponse prefere</label>
                                <input type="text" name="preference_answer" id="preference_answer" class="form-control form-input">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group-g  form-group form-group-form-proposition">
                                <label for=form-proposition>Créneau horraire de réponses</label><br/>
                                <div class="col-md-6">
                                    <label for=start_preference_answer>Debut</label>
                                    <input type="time" name="start_preference_answer" id="start_preference_answer" class="form-control form-input">
                                </div>
                                <div class="col-md-6">
                                    <label for=end_preference_answer>Fin</label>
                                    <input type="time" name="end_preference_answer" id="end_preference_answer" class="form-control form-input">
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
                    </div><!--/End container fluid break -->
                </div><!--/End answer fluid break -->
                <hr>
                <!--/Debut container fluid break -->
                <div class="container-fluid form-group-multiple-g form-group-multiple-g-1">
                <div class="row">
                <div class="col-md-12">

                    <div class="col-md-6">
                        <div class="form-group-g  form-group form-group-form-proposition">
                            <label for=form-proposition>Demande de devis</label>
                            <ul class="list-group list-group-bool" id="quotation">
                                <li value="true" id="quotationTrue" class="list-group-item-horiz col-md-6 list-group-item list-group-item-bool-yes active form-group-multiple-g">oui</li>
                                <li value="false" id="quotationFalse" class="list-group-item-horiz col-md-6 list-group-item list-group-item-bool list-group-item-bool-no ">Non</li>
                            </ul>   
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group-g  form-group form-group-form-proposition">
                        <label for=form-proposition>Demande d'inscription a "www.marceaulenoir.fr"</label>
                        <ul class="list-group list-group-bool" id="registration">
                          <li value="true" id="registrationTrue" class="list-group-item-horiz col-md-6 list-group-item list-group-item-bool-yes active form-group-multiple-g">oui</li>
                          <li value="false" id="registrationFalse" class="list-group-item-horiz col-md-6 list-group-item list-group-item-bool-no ">Non</li>
                        </ul>   
                        </div>
                    </div>
                    
                </div>
                </div>
                </div>
                <!--/End container fluid break -->
                <hr>
                
                <!--/start container fluid break -->
                <div class="container-fluid form-group-multiple-g form-group-multiple-g-1">
                <div class="row">
                <div class="col-md-12">
                    
                    <h5>Retour formulaire</h5>
                    <hr class="hr">
                    
                    <div class="col-md-12 form-group-multiple-g form-group-multiple-g-2">
                        <div class="form-group-g form-group form-group-form-proposition">
                            <label for="upgrade">Avez vous des idées pour améliorer se formulaire ?</label>
                            <textarea name="upgrade" id="upgrade" class="form-control form-textarea form-textarea" rows="4"></textarea>
                        </div>
                    </div>
                
                </div>
                </div>
                </div>

                <hr class="hr-g"></hr>
                <div class="g-recaptcha" data-sitekey="6LfxuyIUAAAAAOy4Uur1mmCxHO5krPcmjZ2Sq29M"></div>
                <!-- /submit form -->
                <hr class="hr-g"></hr>
                <button type="submit" class="btn-form-g btn-blue btn-form-proposition btn btn-sm col-sm-6 col-sm-offset-3">send</button>
                <!-- /end submit form -->


            </form>
            
            
            </div><!--/End Content  -->
        </div><!--/End Proposition  --> 
    </div><!--/End Row  -->
</div><!--/End Container  -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZrOArua5Xw1y2LZYquB6sg05_oKXOkh0&libraries=places"
async defer></script>

<script type="text/javascript" src="../../assets/javascripts/resize.js"></script>
<script type="text/javascript" src="../../assets/javascripts/listGroup.js"></script>    
<script type="text/javascript" src="../../assets/javascripts/proposition.js"></script>

<?php include_once("includes/footerFront.php"); ?>
