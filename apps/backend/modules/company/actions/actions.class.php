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
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

      $company = CompanyQuery::create()->findOne();
      $this->companyForm = new CompanyForm($company);

  }
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */

    public function executeCreate(sfWebRequest $request){

        $this->form = new CompanyForm();
        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind(
            $request->getParameter($form->getName()),
            $request->getFiles($form->getName())
        );

        if ($form->isValid())
        {
            $job = $form->save();

            $this->redirect('@company', $job);
        }
    }
}
