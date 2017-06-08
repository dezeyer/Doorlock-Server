<?php

/**
 * Created by PhpStorm.
 * User: simonz
 * Date: 07.06.2017
 * Time: 21:10
 */

class page{
    public $name = "404";
    public $name_suffix = " :: Hackaton Doorlock Server";
    public $template = "404.php";
    public $showinnav = true;
    public $shownav = true;
    public $navicon = "fa-dashboard fa-fw";

    /**
     * @param $name
     * @param $template
     * @return page
     */
    public static function i($name, $template, $navicon = "fa-dashboard fa-fw"): page
    {
        $instance = new self();
        $instance->setName($name);
        $instance->setTemplate($template);
        $instance->setNavicon($navicon);
        return $instance;
    }

    /**
     * @param $name
     * @param $template
     * @param $showinnav
     * @param $shownav
     * @return page
     */
    public static function in($name, $template,$showinnav,$shownav, $navicon = "fa-dashboard fa-fw"): page
    {
        $instance = new self();
        $instance->setName($name);
        $instance->setTemplate($template);
        $instance->setShowinnav($showinnav);
        $instance->setShownav($shownav);
        $instance->setNavicon($navicon);
        return $instance;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param $showsuffix
     * @return string
     */
    public function getName($showsuffix = true): string
    {
        if($showsuffix){
            return $this->name.$this->name_suffix;
        }
        return $this->name;
    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template)
    {
        $this->template = $template;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return "page/".$this->template;
    }

    /**
     * @param bool $showinnav
     */
    public function setShowinnav(bool $showinnav)
    {
        $this->showinnav = $showinnav;
    }

    /**
     * @return boolean
     */
    public function getShowinnav(): boolean
    {
        return $this->showinnav;
    }

    /**
     * @param bool $shownav
     */
    public function setShownav(bool $shownav)
    {
        $this->shownav = $shownav;
    }

    /**
     * @return boolean
     */
    public function getShownav(): boolean
    {
        return $this->shownav;
    }

    /**
     * @param string $navicon
     */
    public function setNavicon(string $navicon)
    {
        $this->navicon = $navicon;
    }

    /**
     * @return string
     */
    public function getNavicon(): string
    {
        return $this->navicon;
    }
}