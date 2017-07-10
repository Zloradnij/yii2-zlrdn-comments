<?php

namespace app\modules\comments\controllers;

use app\modules\comments\models\Comments;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * CommentController implements the CRUD actions for Comments model.
 */
class CommentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Creates a new Comment model.
     * @return mixed
     */
    public function actionAddComment()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = new Comments();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return [
                    'model' => $model,
                ];
            } else {
                return [
                    'errors' => $model->errors,
                ];
            }
        }
    }

    /**
     * Deletes an existing Comments model.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if (Yii::$app->user->identity->getId() == $model->created_by) {
                $model->delete();
                return ['OK'];
            } else {
                return ['error' => 'This is not your comment'];
            }
        }
    }

    /**
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
