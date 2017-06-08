<?php
/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 07.06.2017
 * Time: 22:57
 * @var $page page
 * @var $pages page[]
 */
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><? echo $page->getName()?></a>
</div>
<!-- /.navbar-header -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <?foreach($pages as $key => $p){
                if($p->showinnav){?>
                    <li>
                        <a href="/?p=<?echo $key?>"><i class="fa <?echo $p->getNavicon()?>"></i> <?echo $p->getName(false)?></a>
                    </li>
                <?}
            }?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>