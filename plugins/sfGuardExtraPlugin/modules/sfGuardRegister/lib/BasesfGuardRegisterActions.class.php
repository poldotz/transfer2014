<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Gordon Franke <gfranke@savedcite.com>
 * @version    SVN: $Id: BasesfGuardRegisterActions.class.php 31653 2010-12-10 14:03:38Z garak $
 */
class BasesfGuardRegisterActions extends sfActions
{
  /**
   * preExecute
   *
   * @access public
   * @return void
   */
  public function preExecute()
  {
    if($this->getUser()->isAuthenticated())
    {
      $this->redirect('@homepage');
    }
  }

  public function executeSelectComune(sfWebRequest $request){

        if ($request->isXmlHttpRequest())
        {
            $this->form = new sfGuardFormRegister();
            return $this->renderPartial('comune_profile', array('form' => $this->form));

        }
    }

  /**
   * executeRegister
   *
   * @access public
   * @return void
   */
  public function executeRegister(sfWebRequest $request)
  {

    $this->form = new sfGuardFormRegister();

      if ($request->isXmlHttpRequest())
      {
          return $this->renderPartial('comune_profile', array('form' => $this->form));

      }


    if ($request->isMethod(sfRequest::POST))
    {
      $this->form->bind($request->getParameter('register'));

      $req = $request->getParameter('register');

      if(isset($req['comune'])){
          $this->getUser()->setFlash('comune', $req['comune']);
      }

      if ($this->form->isValid())
      {
        $values = $this->form->getValues();

        $sfGuardUser = new sfGuardUser();
        $sfGuardUser->fromArray($values, BasePeer::TYPE_FIELDNAME);
        if (isset($values['email']))
        {
          $sfGuardUser->setUsername($values['email']);
          $sfGuardUser->setEmail($values['email']);
        }
        $sfGuardUser->setIsActive(false);
        $sfGuardUser->setIpAddress($_SERVER['REMOTE_ADDR']); // log the ip address of the user
        $sfGuardUser->save();

        // aggiunta del gruppo cliente all'utente che si sta creando.
        $sfGuardGroupCliente = sfGuardGroupQuery::create()->filterByName('cliente')->findOne();
        $sfUserGroupCliente = new sfGuardUserGroup();
        $sfUserGroupCliente->setsfGuardUser($sfGuardUser);
        $sfUserGroupCliente->setsfGuardGroup($sfGuardGroupCliente);
        $sfUserGroupCliente->save();

        // aggiunta del profilo.
        $sfGuardUserProfile = new sfGuardUserProfile();
        $sfGuardUserProfile->setUserId($sfGuardUser->getId());
        $sfGuardUserProfile->setFirstName($values['first_name']);
        $sfGuardUserProfile->setLastName($values['last_name']);
        $sfGuardUserProfile->setGenre($values['genre']);
        $birthday = $values['birthday'];
        $birthday = str_pad($birthday['year'],4,'0',STR_PAD_LEFT)."-".str_pad($birthday['month'],2,'0',STR_PAD_LEFT)."-".str_pad($birthday['day'],2,'0',STR_PAD_LEFT);
        $sfGuardUserProfile->setBirthday($birthday);
        $sfGuardUserProfile->setCountry($values['country']);
        $sfGuardUserProfile->setAddress($values['address']);
        $sfGuardUserProfile->setCap($values['cap']);
        $sfGuardUserProfile->setComuneId($values['comune']);
        $sfGuardUserProfile->setPhone($values['phone']);
        $sfGuardUserProfile->setMobile($values['mobile']);
        $sfGuardUserProfile->setPrivacy(1);
        isset($values['newsletter']) ? $newsletter = 1 : $newsletter = 0;
        $sfGuardUserProfile->setNewsletter($newsletter);
        $sfGuardUserProfile->save();

        $messageParams = array(
          'sfGuardUser' => $sfGuardUser,
          'sfGuardUserProfile' => $sfGuardUserProfile,
          'password' => $values['password']
        );
        $body = $this->getComponent($this->getModuleName(), 'send_request_confirm', $messageParams);

        $from = ConfigurationQuery::create()->findOneByName('smtp_mail_from');
        if(!isset($from) && !is_object($from) && strlen($from->getValue()) == 0){
            $from = sfConfig::get('app_sf_guard_extra_plugin_mail_from', 'fidelity@mysme.it');
        }
        else{
          $from = $from->getValue();
        }

        $fromName = sfConfig::get('app_sf_guard_extra_plugin_name_from', 'noreply');
        $to = $sfGuardUser->getEmail();
        //$mySme = sfConfig::get('app_contact_form_email');
        $toName = $sfGuardUser->getUsername();
        $subject = sfConfig::get('app_sf_guard_extra_plugin_subject_confirm', 'Confirm Registration');
        //$mailer = $this->getMailer();
        //$message = $mailer->compose(array($from => $fromName), array($to => $toName,$mySme=>'Registrazione MySME'), $subject, $body);
        //$mailer->send($message);

          $mensagem = Swift_Message:: newInstance()
              ->setFrom(array($from=>$fromName))
              ->setTo(array($to=>$toName))
              //->setBcc($mySme)
              ->setSubject($subject)
              ->setBody($body,'text/html');
          $res = $this->getMailer()->send($mensagem);

        $this->getUser()->setFlash('values', $values);
        $this->getUser()->setFlash('sfGuardUser', $sfGuardUser);

        return $this->redirect('@sf_guard_do_register');
      }
    }
  }

  /**
   * executeRequest_confirm_register
   *
   * @access public
   * @return void
   */
  public function executeRequest_confirm_register(sfWebRequest $request)
  {
  }

  /**
   * executeRegister_confirm
   *
   * @access public
   * @return void
   */
  public function executeRegister_confirm(sfWebRequest $request)
  {
    $c = new Criteria();
    $c->add(sfGuardUserPeer::PASSWORD, $request->getParameter('key'));
    $c->add(sfGuardUserPeer::ID, $request->getParameter('id'));
 	$sfGuardUser = sfGuardUserPeer::doSelectOne($c);
    $this->forward404Unless($sfGuardUser, 'user not found');
    $sfGuardUser->setIsActive(true);

    // Generazione fidelity

    $fidelity = new FidelityCard();
    $fidelity->generateFidelityCardNumber();
    $fidelity->setCreatedAt(date('Y-m-d H:i:s'));
    $fidelity->setFidelityCardStatusId(1);
    $fidelity->save();
    $sfGuardUser->setUsername($fidelity->getBarcode());
    $sfGuardUser->save();
    $user_profile = $sfGuardUser->getProfile();
    $user_profile->setFidelityCardId($fidelity->getId());
    $user_profile->save();
    $nome = $user_profile->getFirstName()."".$user_profile->getLastName();

    $pdf = $fidelity->generatePdf($nome);
    $pdf->Output('uploads/'.$fidelity->getBarcode().'.pdf', 'F');

    $messageParams = array(
      'sfGuardUser' => $sfGuardUser,
      'sfGuardUserProfile'=>$user_profile
    );
    $body = $this->getComponent($this->getModuleName(), 'send_complete', $messageParams);
    $from = ConfigurationQuery::create()->findOneByName('smtp_mail_from');
    if(!isset($from) && !is_object($from) && strlen($from->getValue()) == 0){
        $from = sfConfig::get('app_sf_guard_extra_plugin_mail_from', 'fidelity@mysme.it');
    }
    else{
        $from = $from->getValue();
    }
    $fromName = sfConfig::get('app_sf_guard_extra_plugin_name_from', 'noreply');

    $to = $sfGuardUser->getEmail();
    $toName = $sfGuardUser->getUsername();
    $subject = sfConfig::get('app_sf_guard_extra_plugin_subject_complete', 'Registrazione Completata');
    $mySme = sfConfig::get('app_contact_form_email');

      $message = Swift_Message:: newInstance()
          ->setFrom(array($from=>$fromName))
          ->setTo(array($to=>$toName))
          ->setBcc($mySme)
          ->setSubject($subject)
          ->setBody($body,'text/html');

    //$mailer = $this->getMailer();
    //$message = $mailer->compose(array($from => $fromName), array($to => $toName), $subject, $body);

    $attachment = Swift_Attachment::fromPath('uploads/'.$fidelity->getBarcode().'.pdf', 'application/pdf');
    //	Attach it to the message
    $message->attach($attachment);
    $res = $this->getMailer()->send($message);

    //$mailer->send($message);


     // elimino il file
     unlink('uploads/'.$fidelity->getBarcode().'.pdf');

    $this->getUser()->signin($sfGuardUser);

    $this->redirect('@sf_guard_register_complete?id='.$sfGuardUser->getId());
  }

  /**
   * executeRegister_complete
   *
   * @access public
   * @return void
   */
  public function executeRegister_complete(sfWebRequest $request)
  {
  }
}
