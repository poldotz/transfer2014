<?php

/**
 * company actions.
 *
 * @package    transfer
 * @subpackage company
 * @author     Poldotz
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class companyActions extends sfActions
{
 /**
  * Executes index action
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $company = CompanyQuery::create()->findOne();
      $this->form = new CompanyForm($company);
  }
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */

    public function executeCreate(sfWebRequest $request){

        $this->form = new CompanyForm();
        $this->processForm($request, $this->form);
        $this->setTemplate('index');
    }

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */

    public function executeEdit(sfWebRequest $request)
    {
        $this->form = new CompanyForm($this->getRoute()->getObject());
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $company = $request->getParameter('company');
        $company = CompanyPeer::retrieveByPK($company['id']);
        $this->form = new CompanyForm($company);
        $this->processForm($request, $this->form);
        $this->setTemplate('index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
        );

        if ($form->isValid())
        {
            $company = $form->save();

            $this->redirect('company', $company);
        }
    }
}
