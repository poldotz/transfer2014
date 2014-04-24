<?php

/**
 * Company filter form base class.
 *
 * @package    transfer
 * @subpackage filter
 * @author     Poldotz
 */
abstract class BaseCompanyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vat_number'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'             => new sfWidgetFormFilterInput(),
      'fax'               => new sfWidgetFormFilterInput(),
      'mobile'            => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'site'              => new sfWidgetFormFilterInput(),
      'formatted_address' => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'latitude'          => new sfWidgetFormFilterInput(),
      'longitude'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'vat_number'        => new sfValidatorPass(array('required' => false)),
      'phone'             => new sfValidatorPass(array('required' => false)),
      'fax'               => new sfValidatorPass(array('required' => false)),
      'mobile'            => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'site'              => new sfValidatorPass(array('required' => false)),
      'formatted_address' => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'latitude'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('company_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Company';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'vat_number'        => 'Text',
      'phone'             => 'Text',
      'fax'               => 'Text',
      'mobile'            => 'Text',
      'email'             => 'Text',
      'site'              => 'Text',
      'formatted_address' => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'latitude'          => 'Number',
      'longitude'         => 'Number',
    );
  }
}
