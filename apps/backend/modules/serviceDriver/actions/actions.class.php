<?php

/**
 * serviceDriver actions.
 *
 * @package    transfer
 * @subpackage serviceDriver
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serviceDriverActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->form = new ServiceDriverForm();
      $this->driverServices = array();
  }


    /**
     * set the current session arrival date.
     */
    public function executeChangeDate(sfWebRequest $request){
        $date =$request->getParameter('day_change');
        $day = date('Y-m-d',strtotime($date));

        $this->getUser()->setCurrentArrivalDate($day);
        $this->getUser()->setCurrentDepartureDate($day);
        $this->getUser()->setCurrentDriverDate($day);
        $this->form = new ServiceDriverForm(array('day_change'=>$date));
        $this->services = array();
        $this->setTemplate('index');
    }

    public function executeServicesDriversPdf(sfWebRequest $request){

        $day = $this->getUser()->getCurrentDriversDate();

        $services = Driver::getDriversServices($day);
        try{

            $pdf = new CustomPdf("L","mm","A4");
        foreach($services as $service){
            $data = date('d-m-Y',strtotime($day));
            $giorno =  explode('-',$day);
            $giorno = Driver::translateToItaDayOfWeek(date('D',mktime(0, 0, 0, $giorno[1], $giorno[2], $giorno[0])));

            $con = Propel::getConnection();
            $con->useDebug(true);

            $select = "(SELECT if(a.cancelled,'si','no') as 'Annullato', b.number, 'Arrivo' as 'Arrivo', substr(a.hour,1,5) as 'hour', a.flight, substr(c.name, 1,15) as 'customer', substr(b.contact,1,15) as 'contact', concat(b.adult,'/',b.child) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', v.name, concat(driver.first_name,'/',substr(driver.last_name,1,1),'.') as 'driver', p.name,a.note ";
            $from = " FROM arrival as a JOIN booking as b on (a.booking_id = b.id) ".
                " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
                " JOIN locality as locfrom on (a.locality_from = locfrom.id) ".
                " JOIN locality as locto ON (a.locality_to = locto.id) ".
                " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
                " LEFT JOIN sf_guard_user as driver on (a.driver_id = driver.id) ".
                " LEFT JOIN payment_method as p on (a.payment_method_id = p.id) ";
            $where = " WHERE a.day ='".$day."' AND a.driver_id = ".$service['DRIVER_ID']." AND a.cancelled = 0 ";
            $order_by = " ORDER BY a.hour, v.id, b.number)";

            $queryArrivals = $select.$from.$where.$order_by;


            $select = "(SELECT if(d.cancelled,'si','no') as 'Annullato', b.number, if(locto.is_vector,'Partenza','Taxi') as 'servizio', substr(d.hour,1,5) as 'hour', d.flight, substr(c.name, 1,15) as 'customer', substr(b.contact,1,15) as 'contact', concat(b.adult,'/',b.child) as 'pax', concat(substr(locfrom.name,1,15),'/',substr(locto.name,1,15)) as 'route', v.name, concat(driver.first_name,'/',substr(driver.last_name,1,1),'.') as 'driver', p.name,d.note ";
            $from = " FROM departure as d JOIN booking as b on (d.booking_id = b.id) ".
                " JOIN sf_guard_user_profile as c on (b.customer_id = c.id) ".
                " JOIN locality as locfrom on (d.locality_from = locfrom.id) ".
                " JOIN locality as locto ON (d.locality_to = locto.id) ".
                " JOIN vehicle_type as v ON (b.vehicle_type_id = v.id) ".
                " LEFT JOIN sf_guard_user as driver on (d.driver_id = driver.id) ".
                " LEFT JOIN payment_method as p on (d.payment_method_id = p.id) ";
            $where = " WHERE d.day ='".$day."' AND d.driver_id = ".$service['DRIVER_ID'] ." AND d.cancelled = 0 ";
            $order_by = " ORDER BY d.hour, v.id, b.number)";

            $queryDepature = $select.$from.$where.$order_by;

                $statement = $con->prepare($queryArrivals . "UNION" . $queryDepature);
                $statement->execute();


                $title = 'Autista: '.$service["driver"].' numero servizi:  ('.$statement->rowCount().') - '.$giorno.' '.$data;
                $pdf->setHeaderTitle($title);
                $pdf->AddPage();
                $pdf->SetAutoPageBreak(1,0.5);

                if($statement->rowCount()){
                    $header = array(
                        'N.',
                        'PRA',
                        'Servizio',
                        'Orario',
                        'Vettore',
                        'Cliente',
                        'Referente',
                        'Pax',
                        'Tragitto',
                        'Categoria Mezzo',
                        'Autista',
                        'Tipo',
                        'Nota');
                    $w = array (
                        8,
                        11,
                        14,
                        15,
                        15,
                        40,
                        40,
                        10,
                        45,
                        28,
                        25,
                        9,
                        35
                    );
                    $rows = $statement->fetchAll(PDO::FETCH_NUM);
                    $pdf->FancyTable($header, $rows,$w);
                   }
            }

            $pdf->Output("servizi_autisti"."_".$giorno."_".$data.".pdf","I");
            exit;

            }
            catch(Exception $e){
                $e->getMessage();
            }
            sfView::NONE;
            exit;
    }

    /**
     * show driver's services list.
     */
    public function executeDriverServiceList(sfRequest $request){
        $day = $request->getParameter('day');
        $driver_id = $request->getParameter('driver_id');
        $services = Driver::getDriverServicesDay($day,$driver_id);
        return $this->renderPartial('driverServiceList',array('driverService'=>$services));
        exit;
        sfView::SUCCESS;

    }



}
