<?php

class HomeController extends Controller
{

    public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionContact() {
        $this->render('contact');
    }

}
?>
