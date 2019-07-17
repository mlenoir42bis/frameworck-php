
    <?php include_once("includes/headerBack.php"); ?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Proposition</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
            <?php 
                $ct = count($data['proposition']);
                for ($i = 0; $i < $ct; $i++):
            ?>
                    <div class="panel table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td class="col-md-2">
                                    <?php echo $data['proposition'][$i]['denomination'];?>
                                </td>
                                <td class="col-md-6">
                                    <?php 
                                        if (strlen($data['proposition'][$i]['descriptionProject']) > 150) {
                                            echo substr($data['proposition'][$i]['descriptionProject'],0,150) . "...";
                                        }
                                        else {
                                            echo $data['proposition'][$i]['descriptionProject'];
                                        }
                                    ?>
                                </td>
                                <td class="col-md-2" style="text-align:center;">
                                    <?php
                                        $arch = "../../archive/" . $data['proposition'][$i]['id'] . '.zip';
                                        $rootArch = ROOT . '/webroot/archive/' . $data['proposition'][$i]['id'] . '.zip';
                                        if (file_exists($rootArch)) :
                                    ?>
                                        <button type="button"><a href="<?php echo $arch; ?>">Down</button>
                                    <?php
                                        endif;
                                    ?>
                                   <?php
                                        $pdf = "../../pdf/ch" . $data['proposition'][$i]['id'] . '.pdf';
                                        $rootPdf = ROOT . '/webroot/pdf/ch' . $data['proposition'][$i]['id'] . '.pdf';
                                        if (file_exists($rootPdf)) :
                                    ?>
                                        <button type="button"><a href="<?php echo $pdf; ?>">Pdf</button>
                                    <?php
                                        endif;
                                    ?>
                                </td>
                                <td class="col-md-2">
                                    <?php
                                        $rootPdf = ROOT . '/webroot/pdf/ch' . $data['proposition'][$i]['id'] . '.pdf';
                                        if (file_exists($rootPdf)) {
                                            echo date("d/m/Y H:i:s", filemtime($rootPdf));
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
            <?php 
                endfor;
            ?>

    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->


<?php include_once("includes/footerBack.php"); ?>
