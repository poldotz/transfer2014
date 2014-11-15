<?php

/**
 * area actions.
 *
 * @package    transfer
 * @subpackage area
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class areaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

  }

  public function executeGet_data(sfWebRequest $request)
  {
        sfConfig::set('sf_web_debug', false);
        $this->getResponse()->setContentType('application/json');

        //start: sorting
        $type_colnames = array(AreaPeer::NAME);
        $iSortCol_0 = $request->getParameter('iSortCol_0');
        if($iSortCol_0 > max(array_keys($type_colnames)) || $iSortCol_0 < 0) $iSortCol_0 = 0;
        $c = new Criteria();
        if ($query = $request->getParameter('sSearch'))
        {
            $c->addOr(AreaPeer::NAME,"%".$query."%",Criteria::LIKE);
        }
        if ('asc' === $request->getParameter('sSortDir_0', 'asc'))
        {
            $c->addAscendingOrderByColumn($type_colnames[$iSortCol_0]);
        }
        else
        {
            $c->addDescendingOrderByColumn($type_colnames[$iSortCol_0]);
        }
        //end: sorting
        //start: paging
        $item_per_page = $request->getParameter('iDisplayLength', 10);
        $page = ($request->getParameter('iDisplayStart', 0) / $item_per_page) + 1;
        $pager = AreaPeer::doSelectPager($page, $item_per_page, $c);
        //end: paging
        $json["iTotalRecords"] = $pager->getNbResults();
        $json["iTotalDisplayRecords"] = $pager->getNbResults();
        $json["aaData"] = array();
        foreach ($pager->getResults() as $v)
        {
            $status = $v->getIsActive() ? '<span class="badge badge-success"> ATTIVO</span>' : '<span class="badge badge-warning"> NON ATTIVO</span>';
            $url = $this->generateUrl('area_edit',array('id'=>$v->getId()));
            $action = '<input class="btn btn-info" style="float:left; margin: 5px;" value="Modifica" type="button" onclick="document.location.href=\''.$url.'\'">';
            $val = array($v->getName(),$status,$action);
            array_push($json["aaData"],$val);
        }
        return $this->renderText(json_encode($json));
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new AreaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new AreaForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
  }

    public function executeEdit(sfWebRequest $request)
    {
        $area = AreaQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($area, sprintf('Object Area does not exist (%s).', $request->getParameter('id')));
        $this->form = new AreaForm($area);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $area = AreaQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($area, sprintf('Object Area does not exist (%s).', $request->getParameter('id')));
        $this->form = new AreaForm($area);

        $error = $this->processForm($request, $this->form);
        if($error){
            $this->getUser()->setFlash('error',$error);
        }
        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $area = AreaQuery::create()->findPk($request->getParameter('id'));
        $this->forward404Unless($area, sprintf('Object Area does not exist (%s).', $request->getParameter('id')));
        $area->delete();

        $this->redirect('area/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            try{
                $area = $form->save();
            }
            catch(Exception $e){
                return "Verificate l'indirizzo inserito e riprovare";
            }

            $this->redirect('area/edit?id='.$area->getId());
        }
    }
}
