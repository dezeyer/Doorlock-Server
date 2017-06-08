<?php
/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 08.06.2017
 * Time: 09:41
 *DoorClient
    int ID ++
    string DoorID
    string Name
 */
    $msg = false;
    if(isset($_GET["del"])){
        $db->delDoorClient($_GET["del"]);
        $msg = msg::alert_success("Tür entfernt");
    }
    if(isset($_POST["save"])) {
        if (trim($_POST["doorid"]) == "") {
            $msg = msg::alert_danger("Tür ID benötigt");
        } elseif (trim($_POST["doorname"]) == "") {
            $msg = msg::alert_danger("Tür Name benötigt");
        } else {
            $db->updateDoorClient($_POST["dbid"], $_POST["doorid"], $_POST["doorname"]);
            $msg = msg::alert_success("Tür geändert");
        }
    }
    if(isset($_POST["add"])){
        if(trim($_POST["doorid"])==""){
            $msg = msg::alert_danger("Tür ID benötigt");
        }elseif (trim($_POST["doorname"])==""){
            $msg = msg::alert_danger("Tür Name benötigt");
        }else{
            $db->addDoorClient($_POST["doorid"],$_POST["doorname"]);
            $msg = msg::alert_success("Tür hinzugefügt");
        }
    }
?>
<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Türen</h1>
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
                                    <th>DB ID</th>
                                    <th>Tür ID</th>
                                    <th>Tür Name</th>
                                    <th>Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?
                                foreach($db->getDoorClients() as $doorclient){
                                    if(isset($_GET["edit"]) && $_GET["edit"] == $doorclient->getDbid()){?>
                                        <tr>
                                            <form method="post" action="/?p=<?echo $_GET["p"];?>">
                                                <td><?echo $doorclient->getDbid()?></td>
                                                <input type="hidden" name="dbid" value="<?echo $doorclient->getDbid()?>"/>
                                                <td><input class="form-control" name="doorid" value="<?echo $doorclient->getDoorid()?>"/></td>
                                                <td><input class="form-control" name="doorname" value="<?echo $doorclient->getName()?>"/></td>
                                                <td><input class="form-control"  type="submit" name="save" value="Speichern"/></td>
                                            </form>
                                        </tr>
                                    <?}else{?>
                                    <tr>
                                        <td><?echo $doorclient->getDbid()?></td>
                                        <td><?echo $doorclient->getDoorid()?></td>
                                        <td><?echo $doorclient->getName()?></td>
                                        <td>
                                            <a href="/?p=<?echo $_GET["p"]?>&edit=<?echo $doorclient->getDbid()?>">Editieren</a>
                                            |
                                            <a href="/?p=<?echo $_GET["p"]?>&del=<?echo $doorclient->getDbid()?>">Entfernen</a>
                                        </td>
                                    </tr>
                                <?}}?>
                                <tr>
                                    <form method="post" action="/?p=<?echo $_GET["p"];?>">
                                        <td></td>
                                        <td><input class="form-control" name="doorid" value=""/></td>
                                        <td><input class="form-control" name="doorname" value=""/></td>
                                        <td><input class="form-control"  type="submit" name="add" value="Hinzufügen"/></td>
                                    </form>
                                </tr>
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

