<?php
/**
 * Created by PhpStorm.
 * User: poldotz
 * Date: 09/05/14
 * Time: 15.39
 */

class serviceHostessSearchFrom extends sfForm {

    public function configure(){
        $this->setWidgets(array(
            'dateRange'		=> 	new sfWidgetFormDateRange(array(
                'from_date'	=> new sfWidgetFormJQueryDate(array('format'=>'%day%/%month%/%year%')),
                'to_date'	=> new sfWidgetFormJQueryDate(array('format'=>'%day%/%month%/%year%')),
            )),
            'notDateRange' => new sfWidgetFormInputCheckbox()

        ));

        $this->setValidators(array(
            'dateRange'		=> new sfValidatorDateRange(array(
                'from_date'	=> new sfValidatorDate(),
                'to_date'	=> new sfValidatorDate(),
            )),

        ));
    }
}