<?php
/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 08.06.2017
 * Time: 09:40
 * Log
    int ID ++
    int Chips::ID
    int DoorClient::ID
    int status
    string timestamp
 */?>
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Log</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>DB-ID</th>
                                    <th>Chip-DBID</th>
                                    <th>DoorClient-DBID</th>
                                    <th>Status-Code</th>
                                    <th>Timestamp</th>
                                    <th>Bild</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?
                                $status = array(
                                        0=>"CHECK: Chip ADD-DISALLOW",
                                        1=>"CHECK: Chip DISALLOW",
                                        2=>"CHECK: Chip ALLOWED",
                                        3=>"LOGIN: Chip ACCESS",
                                        4=>"LOGIN: Chip DENIED",
                                );
                                foreach($db->getLogs() as $log){?>
                                    <tr>
                                        <td><?echo $log->getDbid()?></td>
                                        <td><?
                                            $chip = $db->getChipByDBID($log->getChipdbid());
                                        if($chip == null){
                                            echo "<strong style='color:orange;'>DELETED: ".$log->getChipdbid()." (Chip-DBID)</strong>";
                                        }elseif($chip->getName() != ""){
                                            echo $chip->getName();
                                        }else{
                                            echo "<strong style='color:red;'>NO INIT".$db->getChipByDBID($log->getChipdbid())->getChipid()." (Chip-ID)</strong>";
                                        }
                                        ?></td>
                                        <td><?echo $db->getDoorClientByDBID($log->getDoorclientdbid())->getName()?></td>
                                        <td><?echo $status[$log->getStatus()]?></td>
                                        <td><?echo date("Y-m-d H:i:s",$log->getTimestamp())?></td>
                                        <td><a href="<?echo $log->getPicture()?>"><img height="50" src="<?echo $log->getPicture()?>"</a></td>
                                    </tr>
                                <?}?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

