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
}
?>
