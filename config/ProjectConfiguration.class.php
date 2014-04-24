<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{

    static protected $geocoderLoaded = false;

    static public function registerGeocoder()
    {
        if (self::$geocoderLoaded) {
            return;
        }

        require_once sfConfig::get('sf_lib_dir') . '/vendor/Geocoder/autoload.php';

        self::$geocoderLoaded = true;
    }




  public function setup()
  {
    $this->enablePlugins('sfPropelORMPlugin');
    $this->enablePlugins('sfGuardPlugin');
    $this->enablePlugins('sfGuardExtraPlugin');
  }
}
