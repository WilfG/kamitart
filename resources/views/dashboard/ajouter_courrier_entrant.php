<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Enregistrement d'un courrier entrant<small></small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <?php
                if (!empty($erreurs)) {
                    //                foreach ($erreurs as $error):
                ?>
                    <div class="alert alert-danger message_erreur">
                        <?= $erreurs; ?>
                    </div>
                <?php
                    //                endforeach;
                } elseif (!empty($success)) {
                ?>
                    <div class="alert alert-success message_erreur">
                        <?= $success; ?>
                    </div>
                <?php
                }
                ?>
                <form role="form" method="post" enctype="multipart/form-data" id="form-notif">
                    <div class="row">
                        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label for="id_type">Numéro d'enregistrement du courrier</label>
                            <input type="text" name="numero_registre" class="form-control">
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="id_emetteur"> Expéditeur :</label>
                            <div style="display: inline-flex;">
                                <select name="id_emetteur" class="form-control " data-placeholder="Choisir l'émetteur" id="id_emetteur">
                                </select>
                                <span id="emetteur_plus" class="input-group-btn"><button type="button" title="Ajouter un nouvel émetteur" id="bouton_emetteur" class="btn btn-success bouton_plus btn-sm" data-toggle="modal" data-target="#modal_emetteur"><i class="fa fa-plus"></i></button></span>
                            </div>
                        </div>
                    </div>
                    <input name="type_courrier" type="hidden" value="Entrant">
                    <input name="etat_courrier" type="hidden" value="0">

                    <div class="row">

                        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label for="objet_courrier">Objet</label>
                            <input name="objet_courrier" autocomplete="off" class="form-control" id="objet_courrier" value="<?php if (isset($_POST['objet_courrier'])) {
                                                                                                                                echo $_POST['objet_courrier'];
                                                                                                                            }  ?>">

                        </div>
                        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label for="date_arrivee">Date d'arrivée</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="date_arrivee" class="form-control date_tag" autocomplete="off" id="date_arrivee" value="<?php if (isset($_POST['date_arrivee'])) {
                                                                                                                                                        echo $_POST['date_arrivee'];
                                                                                                                                                    }  ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label for="date_butoir">Date butoir</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" name="date_butoir" class="form-control date_tag" id="date_butoir" value="<?php if (isset($_POST['date_butoir'])) {
                                                                                                                                echo $_POST['date_butoir'];
                                                                                                                            }  ?>">
                            </div>
                        </div>
                        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label for="pieces_jointes">Pièces jointes</label>
                            <input type="file" accept=".png,.gif,.jpg,.webp,.pdf" id="pieces_jointes" name="pieces_jointes[]" multiple value="<?php if (isset($_POST['pieces_jointes'])) {
                                                                                                                                                    echo $_POST['pieces_jointes'];
                                                                                                                                                }  ?>" required="">
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label for="priorite">Priorité</label>
                            <select name="priorite" class="form-control " id="priorite" data-placeholder="Choisir la priorité">
                                <option value=""></option>
                                <option value="Ordinaire">Ordinaire</option>
                                <option value="Urgent">Urgent</option>
                                <option value="Confidentiel">Confidentiel</option>
                            </select>
                        </div>
                        <!-- <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-5">
                            <label for="priorite">Nature du courrier</label>
                            <select name="nature_courrier" class="form-control tag_select2" id="id_nature" data-placeholder="Choisir la nature">
                                
                            </select>
                            <span class="input-group-btn"><button type="button" title="Ajouter une nature de courrier" id="bouton_nature" class="btn btn-success bouton_plus btn-sm" data-toggle="modal" data-target="#modal_nature"><i class="fa fa-plus"></i></button></span>
                        </div> -->
                    </div>

                    <?php
                    $tab = [];
                    foreach ($permissions as $key => $value) {
                        $tab[] =  $value;
                    }
                    $ajout_cour = 'Ajouter un courrier entrant';
                    if (in_array($ajout_cour, $tab)) {
                    ?>
                        <div class="col-lg-12">
                            <button class="btn btn-success" type="submit" id="post">Enregistrer </button>
                        </div>
                    <?php  } else { ?>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <span type="submit" class="btn btn-primary" title="Vous n'avez pas cette permission">Enregistrer</span>
                        </div>
                    <?php  }
                    ?>
            </div>

            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">

    </div>
    <!--/.col (right) -->
</div>
<!-- /.row -->


<!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
<!-- Modal -->
<div class="modal fade" id="modal_emetteur" tabindex="-1" role="dialog" aria-labelledby="modal_clientLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal_clientLabel">Enregistrer un nouvel émetteur</h4>
            </div>
            <div class="modal-body">

                <label>Nom de l'expéditeur</label>
                <input name="nom_emetteur" type="text" class="form-control" id="nom_emetteur_plus" placeholder="">
                <br />

                <label>Téléphone</label>
                <input name="telephone_emetteur_plus" type="text" class="form-control" id="telephone_emetteur_plus">
                <br />

                <label>Email</label>
                <input name="email_emetteur_plus" type="email" class="form-control" id="email_emetteur_plus">
                <br />

                <label>Adresse</label>
                <input name="adresse_emetteur_plus" class="form-control" id="adresse_emetteur_plus" placeholder="">
                <br />

                <input type="hidden" name="id_emetteur_plus" id="id_emetteur_plus" />
                <button type="submit" name="action_emetteur" id="action_emetteur" class="btn btn-success">Enregistrer</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>
        </div>
    </div>
</div>


<!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
<!-- Modal -->
<div class="modal fade" id="modal_nature" tabindex="-1" role="dialog" aria-labelledby="modal_natureLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal_natureLabel">Ajouter une nature de courrier</h4>
            </div>
            <div class="modal-body">

                <label>Libell&eacute; de la nature</label>
                <input type="text" name="libelle_nature_plus" id="libelle_nature_plus" class="form-control" />
                <br />

                <input type="hidden" name="id_nature_plus" id="id_nature_plus" />
                <button type="submit" name="action_nature" id="action_nature" class="btn btn-success">Enregistrer</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>
        </div>
    </div>
</div>