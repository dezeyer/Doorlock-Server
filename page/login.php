<?
/**
 * @var $page page
 *
 */
$msg = false;
if(isset($_POST["adminlogin"])){
    if(loginSession::login($_POST["password"])){
        $msg = msg::alert_success_link("Login erfolgreich, Sie werden eingeloggt.<br>","/","Sollten Sie nicht weitergeleitet werden, hier klicken");
        header("refresh: 2; /");
    }else{
        $msg = msg::alert_danger("Login fehlgeschlagen");
    }
}

?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><? echo $page->getName()?></h3>
                    </div>
                    <div class="panel-body">
                        <?if($msg != false){
                            echo $msg;
                        }?>
                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Admin Passwort" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="form-control btn-success"  type="submit" name="adminlogin" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
