<?php

/**
 * serviceHostess actions.
 *
 * @package    transfer
 * @subpackage serviceHostess
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serviceHostessActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new ServiceHostessForm(array('year'=> $this->getUser()->getSessionYear()));

  }

    public function executeGetData(sfWebRequest $request)
    {

        /*
         * process the search request.
         */
        $form = array();
        $results = array();
        parse_str(urldecode($request->getParameter('form')),$form);
        if(isset($form['serviceHostess']) && !empty($form['serviceHostess'])){
           $serviceHostesForm = new ServiceHostessForm();
           $results =  $this->ProcessSerch($form,$serviceHostesForm);
        }


        $json["aaData"] = array();

        if(isset($results['errors']) && !empty($results['errors'])){
                $json['errors'] = $results['errors'];
        }
        $transfers = $results['transfers'];
        foreach ($transfers as $v)
        {
            $val = array($v->getNumber().'/'.$v->getYear(),date('d-m-Y',strtotime($v->getBookingDate())),$v->getCustomer()->getName(),$v->getContact(),$v->getAdult().'/'.($v->getChild() ? $v->getChild() : 0),$v->getRifFile());
            array_push($json["aaData"],$val);
        }

        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        return $this->renderText(json_encode($json));
  }

  /*
   * process the search form.
   */
  protected function processSerch($parameters, sfForm $form){


      $form->bind($parameters[$form->getName()]);
      if ($form->isValid()){
          $conditions = array();
          foreach($parameters[$form->getName()] as $key => $field){
              switch($key){
                  case 'date_range':
                      $conditions['from'] = $field['from']['year']."-".sprintf("%02d",$field['from']['month'])."-".sprintf("%02d",$field['from']['day']);
                      $conditions['from'] = $field['to']['year']."-".sprintf("%02d",$field['to']['month'])."-".sprintf("%02d",$field['to']['day']);
                      break;
                  case 'contact':
                        if(strlen($field['contact'])){
                            $conditions['contact'] = $field['contact'];
                            issset($parameters[$form->getName()]['contact_off']) ? $conditions['contact_off'] = true : null;
                        }
                      break;
                  case 'rifFile':
                      if(strlen($field['rifFile'])){
                          $conditions['rifFile'] = $field['rifFile'];
                          issset($parameters[$form->getName()]['rifFile_off']) ? $conditions['rifFile_off'] = true : null;
                      }
                      break;
                  case 'customer':
                      if(strlen($field['customer'])){
                          $conditions['customer'] = $field['customer'];
                          issset($parameters[$form->getName()]['customer_off']) ? $conditions['customer_off'] = true : null;
                      }
                      break;
                  case 'locality':
                      if(strlen($field['locality'])){
                          $conditions['locality'] = $field['locality'];
                          isset($parameters[$form->getName()]['locality_off']) ? $conditions['locality_off'] = true : null;
                      }
                      break;
                  case 'vehicle_type_id':
                      $conditions['vehicle_type_id'] = $field['vehicle_type_id'];
                      isset($parameters[$form->getName()]['vehicle_type_id_off']) ? $conditions['vehicle_type_id_off'] = true : null;
                      break;
                  case 'driver_id':
                      $conditions['driver_id'] = $field['driver_id'];
                      isset($parameters[$form->getName()]['driver_id_off']) ? $conditions['driver_id_off'] = true : null;
                      break;
                  case 'transfer_type':
                      $conditions['transfer_type'] = $field['transfer_type'];
                      break;
              }
          }
          ServiceHostess::getServices($conditions);
          return true;

      }
      else{
          $errors = $form->getErrorSchema()->getErrors();
          return $errors;
      }





  }


  public function executeGetContacts(sfWebRequest $request){
      sfConfig::set('sf_web_debug', false);
      $this->getResponse()->setContentType('application/json');

    $param = $request->getParameter('term');
    $result = BookingQuery::create()->select('contact')->findByContact("%$param%");
    $contacts = $result->toArray();
    return $this->renderText(json_encode($contacts));
  }

  public function executeGetRifFiles(sfWebRequest $request){
      sfConfig::set('sf_web_debug', false);
      $this->getResponse()->setContentType('application/json');

      $param = $request->getParameter('term');
      $result = BookingQuery::create()->select('rifFile')->findByRifFile("%$param%");
      $rifFiles = $result->toArray();
      return $this->renderText(json_encode($rifFiles));
  }

    public function executeGetCustomers(sfWebRequest $request){
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $param = $request->getParameter('term');

        $result = CustomerQuery::create()->select('name')->findByName("%$param%");
        $customers = $result->toArray();
        return $this->renderText(json_encode($customers));
    }

    public function executeGetLocalities(sfWebRequest $request){
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $param = $request->getParameter('term');

        $result = LocalityQuery::create()->select('name')->findByName("%$param%");
        $localities = $result->toArray();
        return $this->renderText(json_encode($localities));
    }

}
