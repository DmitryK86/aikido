<?php

namespace app\modules\admin\controllers;

use app\components\Translit;
use app\modules\admin\models\forms\LoginForm;
use app\modules\admin\components\AdminBaseController;
use yii\web\Response;

/**
 * Class AdminController
 * @package app\modules\controllers
 */
class AdminController extends AdminBaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['index']);
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @param $str string
     */
    public function actionSlug($str)
    {
        $translit = new Translit();

        $result = $translit->translit($str, true, 'ru-en');
        $result = preg_replace('/[`\'\"]+/', '', $result);
        $result = preg_replace('/[^a-zA-Z0-9_\x7f-\xff]+/', '-', $result);
        $result = mb_strtolower($result, \Yii::$app->charset);
        $result = trim($result, '-');

        $this->ajaxResponse($result);
    }
}
