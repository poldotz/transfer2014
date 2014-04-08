<?php

class sfGuardFormSignin extends BasesfGuardFormSignin
{
  public function configure()
  {

    $this->setWidgets(array(
      'username_or_email' => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInput(array('type' => 'password')),
      'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
        'password' => new sfValidatorString(array('trim'=>true),array('required'=>'Campo Obbligatorio')),
        //'username_or_email' => new sfGuardValidatorUsernameOrEmail(array('trim' => true), array('required' => 'Numero fidelity o indirizzo Email obbligatori', 'invalid' => 'Numero fidelity o indirizzo Email non trovati, riprova.')),
        'username_or_email' => new sfValidatorString(array('trim'=>true),array('required'=>'Campo Obbligatorio')),
        'remember' => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser(array(),array('invalid'=>'Verificare nome utente e/o password e riprovare.')));

    $this->widgetSchema->setNameFormat('signin[%s]');
  }
}
