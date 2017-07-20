<?php

namespace app\controllers;

use Yii;
use app\models\Data;

class DataController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $data = new Data();

        if ($data->load(Yii::$app->request->post())) {
            if ($data->validate()) {
                $data->save();
                return $this->redirect("index.php?r=site/profile");
            }
        }

        return $this->render('create', [
            'data' => $data,
        ]);
    }

    public function actionEdit($id)
    {
         $data = Data::findOne($id);

        if ($data->load(Yii::$app->request->post())) {
            if ($data->validate()) {
                $data->save();

                Yii::$app->getSession()->setFlash('info_edit', 'Info  edited successfully');
                return $this->redirect("index.php?r=site/profile");
            }
        }

        return $this->render('create', [
            'data' => $data,
        ]);
    }

    public function actionIndex()
    {   
        $id = Yii::$app->user->identity->id;
        $data = findOne($id);
        return $this->render('index', ['data'=>$data]);
    }

}
