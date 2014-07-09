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
      $this->getResponse()->setTitle('Servizi Hostess');
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
        $transfers = $results;
        foreach ($transfers as $v)
        {
            $val = array(
                $v['number'],  //0
                date('d-m-Y',strtotime($v['booking_date'])), //1
                date('d-m-Y',strtotime($v['day'])), //2
                $v['hour'], //3
                $v['flight'], //4
                $v['name'], //5
                $v['contact'], //6
                $v['pax'], //7
                $v['rif_file'], //8
                $v['route'], //9
                $v['vehicle_type'], //10
                $v['driver'], // 11
                $v['pay_method'], //12
                $v['note']); // 13
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
                      $conditions['transfer']['date_range']['from'] = $field['from']['year']."-".sprintf("%02d",$field['from']['month'])."-".sprintf("%02d",$field['from']['day']);
                      $conditions['transfer']['date_range']['to'] = $field['to']['year']."-".sprintf("%02d",$field['to']['month'])."-".sprintf("%02d",$field['to']['day']);
                      break;
                  case 'contact':
                        if(strlen($field)){
                            $conditions['booking']['contact'] = $field;
                            isset($parameters[$form->getName()]['contact_off']) ? $conditions['booking']['contact_off'] = true : null;
                        }
                      break;
                  case 'rifFile':
                      if(strlen($field)){
                          $conditions['booking']['rifFile'] = $field;
                          isset($parameters[$form->getName()]['rifFile_off']) ? $conditions['booking']['rifFile_off'] = true : null;
                      }
                      break;
                  case 'customer':
                      if(strlen($field)){
                          $conditions['booking']['customer'] = $field;
                          isset($parameters[$form->getName()]['customer_off']) ? $conditions['booking']['customer_off'] = true : null;
                      }
                      break;
                  case 'locality_hidden':
                      if(strlen($field)){
                          $conditions['transfer']['locality_hidden'] = $field;
                          isset($parameters[$form->getName()]['locality_off']) ? $conditions['transfer']['locality_off'] = true : null;
                      }
                      break;

                  case 'vehicle_type_id':
                      if(strlen($field)){
                        $conditions['booking']['vehicle_type_id'] = $field;
                        isset($parameters[$form->getName()]['vehicle_type_id_off']) ? $conditions['booking']['vehicle_type_id_off'] = true : null;
                      }
                      break;
                  case 'driver_id':
                      if(strlen($field)){
                        $conditions['transfer']['driver_id'] = $field;
                        isset($parameters[$form->getName()]['driver_id_off']) ? $conditions['transfer']['driver_id_off'] = true : null;
                      }
                      break;
                  case 'transfer_type':
                      $conditions['transfer_type'] = $field;
                      break;
              }
          }
          return ServiceHostess::getServices($conditions);

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
    $result = BookingQuery::create()->select('contact')->distinct()->findByContact("%$param%");
    $contacts = $result->toArray();
    return $this->renderText(json_encode($contacts));
  }

  public function executeGetRifFiles(sfWebRequest $request){
      sfConfig::set('sf_web_debug', false);
      $this->getResponse()->setContentType('application/json');

      $param = $request->getParameter('term');
      $result = BookingQuery::create()->select('rifFile')->distinct()->findByRifFile("%$param%");
      $rifFiles = $result->toArray();
      return $this->renderText(json_encode($rifFiles));
  }

    public function executeGetCustomers(sfWebRequest $request){
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $param = $request->getParameter('term');

        $result = CustomerQuery::create()->select('name')->distinct()->findByName("%$param%");
        $customers = $result->toArray();
        return $this->renderText(json_encode($customers));
    }

    public function executeGetLocalities(sfWebRequest $request){
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');
        $param = $request->getParameter('term');

        $result = LocalityQuery::create()->select(array('label','value'))->withColumn('name','label')->withColumn('name','value')->withColumn('id','id')->findByName("%$param%");
        $localities = $result->toArray();
        return $this->renderText(json_encode($localities));
    }

    /**
     * Export service hostess.
     *
     * @param sfWebRequest $request
     * @return bool
     *
     *
     */
    public function executeExport(sfWebRequest $request){
        $headers = str_getcsv(json_decode($request->getPostParameter('headers')),',',"'");
        $values  =  json_decode($request->getPostParameter('values'));
        $type = "export".ucfirst($request->getPostParameter('type'));
        // call the correct function.
        $this->$type($headers,$values);
    }

    /**
     * @param array $headers
     * @param array $values
     *
     */
    private function exportCsv($headers = array(),$values = array()){

        $xls = new ExcelExport();
        $xls->addRow(array("Servizi:"));
        $xls->addRow($headers);
        for($i = 0; $i < count($values); $i++){
            $xls->addRow($values[$i]);
        }
        $xls->download('export.xls');
        exit;

    }
    /**
     * @param array $headers
     * @param array $values
     *
     */
    private function exportPdf($headers = array(),$values = array()){

        $pdf = new CustomPdf();

        $pdf->AddPage();
        $pdf->SetAutoPageBreak(1,0.5);

        $w = array_fill(0,count($headers),1);
        $sum = array_fill(0,count($headers),1);
        $average = array_fill(0,count($headers),0);
        $divider = array_fill(0,count($headers),0);
        if($values && is_array($values) && count($values)){
          foreach($values as $num => $row){
            foreach($row as $index => $val){
                $val = trim($val) ? $val : "     ";
                $val = $pdf->GetStringWidth($val,'courier','',10);
                if($val > $w[$index]){
                    $sum[$index] += $val;
                    $w[$index] = $val; // max of row n
                    $divider[$index] +=1;
                }
            }
          }
          foreach($sum as $index => $value){
              $average[$index] = $value / $divider[$index];
              if($average[$index]>52){
                  $average[$index] = 52;
              }
          }
        }

        $pdf->FancyTable($headers, $values,$average,false,false);
        $pdf->Output("servizi.pdf","I");

    }
}
