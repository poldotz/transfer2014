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

    static protected $composerLoaded = false;

    static public function registerComposer()
    {
        if (self::$geocoderLoaded) {
            return;
        }

        require_once sfConfig::get('sf_lib_dir') . '/vendor/vendor/autoload.php';

        self::$composerLoaded = true;
    }




  public function setup()
  {
      $this->getEventDispatcher()->connect(
          'form.validation_error',
          array('BaseForm', 'listenToValidationError')
      );

      $this->dispatcher->connect(
          'mailer.configure',
          array($this, 'configureMailer')
      );


    $this->enablePlugins('sfPropelORMPlugin');
    $this->enablePlugins('sfGuardPlugin');
    $this->enablePlugins('sfGuardExtraPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfTCPDFPlugin');
    $this->enablePlugins('sfPhpExcelPlugin');
  }

    public function configureMailer(sfEvent $event)
    {
        $mailer = $event->getSubject();

        // fare qualcosa col mailer
    }

}
