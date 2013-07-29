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
        $this->render('signin', array(
            'form' => $form
            )
        );
    }

    /*
     * @author QuanNT
     */

    private function afterSignIn()
    {
        
    }

    /**
     * Logs out the current user and redirect to homepage.
     * @author QuanNT
     */
    public function actionSignout()
    {
        Yii::app()->user->logout();
        Yii::app()->request->redirect($this->createUrl('home/index'));
    }

    /*
     * @author HieuND
     * Đổi mật khẩu
     */

    public function actionChangepassword()
    {
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->createUrl('user/signin'));
            exit;
        }
        $form = new ChangePassword;
        if (isset($_POST['ChangePassword'])) {
            $form->attributes = $_POST['ChangePassword'];
            if ($form->validate()) {
                $user = User::model()->findByPk(Yii::app()->user->id);
                if (!$user->isValiPassword($form->oldPassword)) {
                    $form->addError('oldPassword', 'Mật khẩu cũ không đúng.');
                } else {
                    $user->password = $user->encryptPassword($form->newPassword);
                    $user->save();
                    $this->redirect(Yii::app()->homeUrl);
                }
            }
        }
        $this->render('changepassword', array(
            'form' => $form
            )
        );
    }

}

?>