<?php

class RequireLogin extends CBehavior
{

    public $allowed = array('home/index', 'user/signin', 'user/forgetPassword', 'user/resetPassword', 'user/signout', 'gii/model');

    public function attach($owner)
    {
        $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
    }

    public function handleBeginRequest($event)
    {
        if (Yii::app()->user->isGuest && !$this->isAllowed()) {
            Yii::app()->user->setFlash('error', 'You must sign in first.');
            //Yii::app()->user->loginRequired();
        }
    }

    public function isAllowed()
    {
        return (isset($_GET['r']) && in_array($_GET['r'], $this->allowed));
    }

}

?>
