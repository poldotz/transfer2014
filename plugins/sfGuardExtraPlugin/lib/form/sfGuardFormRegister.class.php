<?php

class sfGuardFormRegister extends PluginsfGuardFormRegister
{
    public function configure()
    {
        $provincia_id = 0;
        $register = sfContext::getInstance()->getRequest()->getParameter('register');
        if(isset($register)){
            $provincia_id = $register['provincia'];
        }
        else{
            $provincia_id = sfContext::getInstance()->getRequest()->getParameter('provincia');
        }
        $c = new Criteria();
        $c->add(ComunePeer::PROVINCIA_ID, $provincia_id);
        $c->addAscendingOrderByColumn('nome');


        $this->setWidgets(array(
            'first_name'       => new sfWidgetFormInputText(array('label' => 'Nome')),
            'last_name'        => new sfWidgetFormInputText(array('label' => 'Cognome')),
            'genre'            => new sfWidgetFormSelectRadio(array('choices'=>array(1=>'M',2=>'F'))),
            'country'          => new sfWidgetFormI18nChoiceCountry(array('add_empty'=>true,'culture' => 'it','default'=>'IT')),
            'address'          => new sfWidgetFormInputText(array('label' => 'Indirizzo')),
            'provincia'        => new sfWidgetFormPropelChoice(array('model'=>'Provincia','add_empty'=>true, 'order_by' => array('nome','asc')),array('label'=> 'Provincia')),
            'comune'           => new sfWidgetFormPropelChoice(array('model'=> 'Comune','add_empty' => true,'criteria'  => $c)),
            'cap'              => new sfWidgetFormInputText(array('label' =>'Cap')),
            'phone'            => new sfWidgetFormInputText(array('label' =>'Telefono')),
            'mobile'           => new sfWidgetFormInputText(array('label' =>'Cellulare')),
            'privacy'          => new sfWidgetFormInputCheckbox(),
            'newsletter'       => new sfWidgetFormInputCheckbox(),
            'is_employee'      => new sfWidgetFormInputCheckbox(),
            'email'            => new sfWidgetFormInputText(array('label'=> 'Email')),
            'email_confirm'    => new sfWidgetFormInputText(array('label'=> 'Ripeti Email')),
            'password'         => new sfWidgetFormInputPassword(array('label' => 'Password')),
            'password_confirm' => new sfWidgetFormInputPassword(array('label' =>'Ripeti password')),
        ));

        $years = range(1920, date('Y')-15);
        $this->widgetSchema['birthday'] = new sfWidgetFormJQueryDate(
            array('date_widget' => new sfWidgetFormDate(
                array('years' => array_combine($years, $years),
                      'format' => '%day%/%month%/%year%'))
            ));

        /*$this->setWidget('birthday',
            new sfWidgetFormJQueryDate(
                array(
                    'config' => '{buttonText: "<span class=\"icon-calendar\" aria-hidden=\"true\"></span>"}',
                    'date_widget' => new sfWidgetFormDate()
                )
            )
        );*/

        $this->setValidators(array(
            'first_name'       => new sfValidatorString(array('trim' => true), array('required' => 'Campo obbligatorio.')),
            'last_name'        => new sfValidatorString(array('trim' => true), array('required' => 'Campo obbligatorio.')),
            'password'         => new sfValidatorString(array('min_length' => 8), array('min_length' => 'Password troppo corta (%min_length% minimo).', 'required' => 'Campo obbligatorio')),
            'password_confirm' => new sfValidatorString(array(), array('required' => 'Campo obbligatorio')),
            'email'            => new sfValidatorEmail(array('trim' => true), array('required' => 'Campo obbligatorio.', 'invalid' => 'Formato email non valido.')),
            'email_confirm'    => new sfValidatorEmail(array('trim' => true), array('required' => 'Campo obbligatorio.', 'invalid' => 'Formato email non valido.')),
            'address'          => new sfValidatorString(array('trim' => true), array('required' => 'Campo obbligatorio.')),
            'provincia'        => new sfValidatorPropelChoice(array('model'=>'Provincia'),array('required'=>'Campo obbligatorio')),
            'comune'           => new sfValidatorPropelChoice(array('model'=>'Comune'),array('required'=>'Campo obbligatorio')),
            'country'          => new sfValidatorI18nChoiceCountry(array(),array('required'=>'Campo obbligatorio')),
            'cap'              => new sfValidatorString(array('trim' => true),array('required' => 'Campo obbligatorio.')),
            'privacy'          => new sfValidatorBoolean(array('required'=>true),array('required'=>'Campo obbligatorio')),
            'phone'            => new sfValidatorString(array('required'=>false)),
            'mobile'           => new sfValidatorString(array('required'=>false)),
            'genre'            => new sfValidatorPass(),
            'birthday'         => new sfValidatorPass(),
            'newsletter'       => new sfValidatorPass(),
            'is_employee'       => new sfValidatorPass()
        ));


        $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
            new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_confirm', array(), array('invalid' => 'I due campi password devono essere uguali')),
            new sfValidatorSchemaCompare('email', sfValidatorSchemaCompare::EQUAL, 'email_confirm', array(), array('invalid' => 'I due campi email devono essere uguali')),
            new sfValidatorPropelUnique(array('trim' => true,'model'  => 'sfGuardUser', 'column' => 'email'),array('required'=>'Campo Obbligatorio','invalid'=>'Email già presente.'))
        )));

        $this->widgetSchema->setNameFormat('register[%s]');
    }



}
