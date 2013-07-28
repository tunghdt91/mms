<?php

class UserController extends Controller
{

    /**
     * @author QuanNT
     */
    public function actionSignIn()
    {
        $form = new SigninForm;
        if (isset($_POST['SigninForm'])) {
            $form->attributes = $_POST['SigninForm'];
            if ($form->validate() && $form->login()) {
                    $this->afterSignIn();
                    Yii::app()->request->redirect(Yii::app()->user->returnUrl);
                }
        }
        $this->render('signin', array('form' => $form));
    }

    /*
     * @author QuanNT
     */

    private function afterSignIn()
    {
        
    }

    /*
     * @author QuanNT
     */

    public function actionSignUp()
    {
        $form = new SignUpForm;
        $this->render('signup', array('form' => $form));
    }

}

?>