<?php
class DonviController extends Controller
{
    public function actionView($id)
    {
        $dataProviderCanBo = new CActiveDataProvider(
            'DoanVien',
            array('criteria' => array(
                'condition' => "don_vi_id = $id AND chuc_vu_doan_id is not NULL",
            ))
        );
        $dataProviderDoanVien = new CActiveDataProvider(
            'DoanVien',
            array('criteria' => array(
                'condition' => "don_vi_id = $id AND chuc_vu_doan_id is NULL",
            ))
        );
        $don_vi = $this->loadModel($id);
        $this->render(
            'view', 
            array(
                'dataProviderCanBo' => $dataProviderCanBo,
                'dataProviderDoanVien' => $dataProviderDoanVien,
                'don_vi' => $don_vi,
            )
        );
    }
    
    public function loadModel($id)
    {
        $model = DonVi::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }
    
    /*@author Nguyen Van Cuong
     */
    public function actionCreate()
    {
        $donvi = new DonVi;
        if(isset($_POST['DonVi']) && $_POST['DonVi']['loai_don_vi'] != 'none') {
            $donvi->attributes = $_POST['DonVi'];
            if ($donvi->save()){
                Yii::app()->user->setFlash('success', 'Tạo mới thành công !');
                $this->redirect(array('donvi/create'));
            }
        }
        $this->render('create', array(
            'donvi' => $donvi,
        ));
    }
    
    public function actionDataDonVi() {
        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('/site/error', array(
                'code' => 403,
                'message' => 'Forbidden',
            ));
            Yii::app()->end();
        }
        
        if (isset($_POST['loai_don_vi'])) {
           $results = array();
           $criteria = new CDbCriteria();
           $criteria->condition = "loai_don_vi = ({$_POST['loai_don_vi']} - 1)";
           $kqs = DonVi::model()->findAll($criteria);
           foreach ($kqs as $kq) {
                $results[$kq->id] = $kq->ten;
           }
           echo json_encode($results);
        }
    }
}
?>
