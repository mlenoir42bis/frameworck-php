
    <?php include_once("includes/headerBack.php"); ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gallery</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="panel">
            <div id="msgGallery">
            </div>

            <form id="addGallery" enctype="multipart/form-data">
                <div class="form-group-g form-group form-group-form-proposition">
                    <label for="name">Ajouter des fichiers</label>
                    <input type="file" name="file[]" id="file" class="form-input form-control" multiple>
                </div>
                <button type="submit" class="btn btn-primary btn-sm col-sm-6 col-sm-offset-3">Go</button>
                <hr>
            </form>
        </div>
        <pre>
            <?php
                //print_r($data['all']);
                //echo phpinfo();
            ?>
        </pre>
        <?php 
            $arrayImg = ['jpg', 'jpeg', 'png'];
            $arrayFiles = ['doc', 'docx', 'pdf', 'txt'];
            foreach($data['all'] as $key => $value){
                if (!$data['all'][$key]['isDir']) {
                    //echo $data['all'][$key]['realPath'] . '</br>';
                    //print_r (pathinfo($data['all'][$key]['realPath'], PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME)) . '</br>';
                    $extension = pathinfo($data['all'][$key]['realPath'], PATHINFO_EXTENSION);
                    if(in_array($extension, $arrayImg)) {
                        $realPath = $data['all'][$key]['basename'];
                        echo "<div class='col-lg-3 col-md-4 col-xs-6 gallery img'> <img src='../../../../webroot/upload/gallery/$realName'></div>";
                    }
                    if(in_array($extension, $arrayFiles)) {
                        $realPath = $data['all'][$key]['basename'];
                        $name = $data['all'][$key]['val'];
                        echo "<div class='col-lg-3 col-md-4 col-xs-6 gallery icon'><a href='../../../../webroot/upload/gallery/$realName'><span style='margin=0 auto;' class='fa fa-file-o fa-5x'></span></br>$name</a></div>";
                    }
                }
            }
        ?>
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<script type="text/javascript" src="../../assets/javascripts/gallery.js"></script>
<?php include_once("includes/footerBack.php"); ?>
