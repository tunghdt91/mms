<?php
class BanController extends Controller
{
    public function actionDanhSachThanhVien($id)
    {
        $ban = $this->loadModel($id);
        $dataProvider = new CActiveDataProvider(
            'DoanVien',
            array('criteria' => array(
                'condition' => "ban_id = $id",
            ))
        );
        $this->render(
            'danh_sach_thanh_vien', 
            array(
                'dataProvider' => $dataProvider,
                'ban' => $ban,
            )
        );
    }
    
    public function loadModel($id)
    {
        $model = Ban::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }
}
?>
