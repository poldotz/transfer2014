<?php

/**
 * PluginsfGuardFormForgotPassword
 * @package    symfony
 * @subpackage form
 */
class PluginsfGuardFormForgotPassword extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'username_or_email' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'username_or_email' => new sfGuardValidatorUsernameOrEmail(array('trim' => true), array('required' => 'Campo username o e-mail obbligatorio', 'invalid' => 'Username o e-mail non trovato.')),
    ));

    $this->widgetSchema->setNameFormat('forgot_password[%s]');
  }
}
