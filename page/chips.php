<?php
/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 07.06.2017
 * Time: 23:23
 *
 * @var $db sqlitedb
 * Chips
    int ID ++
    string ChipID
    string Pin
    string Name
    string EMail
 */
    $msg = false;
    if(isset($_GET["del"])){
        $db->delChipByChipID($_GET["del"]);
        $msg = msg::alert_success("Chip entfernt");
    }
    if(isset($_POST["save"])){
        $db->updateChip($_POST["dbid"],$_POST["pin"],$_POST["name"],$_POST["email"]);
        $msg = msg::alert_success("Chip geändert");
    }
?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">RFID Chips</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?if($msg != false){
                    echo $msg;
                }
                ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ChipID</th>
                                    <th>Pin</th>
                                    <th>Name</th>
                                    <th>EMail</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?
                                foreach($db->getChips() as $chip){
                                    if(isset($_GET["edit"]) && $_GET["edit"] == $chip->getDbid()){?>
                                        <tr>
                                            <form method="post" action="/?p=<?echo $_GET["p"]?>">
                                                <input type="hidden" name="dbid" value="<?echo $chip->getDbid()?>">
                                                <td><?echo $chip->getDbid()?></td>
                                                <td><?echo $chip->getChipid()?></td>
                                                <td><input class="form-control" name="pin" value="<?echo $chip->getPin()?>"/></td>
                                                <td><input class="form-control" name="name" value="<?echo $chip->getName()?>"/></td>
                                                <td><input class="form-control" name="email" value="<?echo $chip->getEmail()?>"/></td>
                                                <td>
                                                    <input class="form-control" type="submit" name="save" value="Speichern">
                                                </td>
                                            </form>
                                        </tr>

                                    <?}else{?>
                                <tr>
                                    <td><?echo $chip->getDbid()?></td>
                                    <td><?echo $chip->getChipid()?></td>
                                    <td><?echo $chip->getPin()?></td>
                                    <td><?echo $chip->getName()?></td>
                                    <td><?echo $chip->getEmail()?></td>
                                    <td>
                                        <a href="/?p=<?echo $_GET["p"]?>&edit=<?echo $chip->getDbid()?>">Editieren</a>
                                        |
                                        <a href="/?p=<?echo $_GET["p"]?>&del=<?echo $chip->getDbid()?>">Entfernen</a>
                                    </td>
                                </tr>
                                <?}}?>
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

