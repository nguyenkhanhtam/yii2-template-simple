<?php

namespace app\controllers\admin;

use app\traits\{LanguageTrait, AdminBeforeActionTrait};
use yii\web\NotFoundHttpException;
use app\models\{About, AboutSearch};
use Itstructure\AdminModule\controllers\CommonAdminController;

/**
 * Class AboutController
 * AboutController implements the CRUD actions for About model.
 *
 * @package app\controllers\admin
 */
class AboutController extends CommonAdminController
{
    use LanguageTrait, AdminBeforeActionTrait;

    /**
     * @var bool
     */
    protected $isMultilanguage = true;

    /**
     * Set about record as default.
     *
     * @param $aboutId
     *
     * @return \yii\web\Response
     *
     * @throws NotFoundHttpException
     */
    public function actionSetDefault($aboutId)
    {
        $about = About::findOne($aboutId);

        if (null === $about) {
            throw  new NotFoundHttpException('Record with id ' . $aboutId . ' does not exist');
        }

        $about->default = 1;
        $about->save();

        return $this->redirect('index');
    }

    /**
     * Returns About model name.
     *
     * @return string
     */
    protected function getModelName():string
    {
        return About::class;
    }

    /**
     * Returns AboutSearch model name.
     *
     * @return string
     */
    protected function getSearchModelName():string
    {
        return AboutSearch::class;
    }
}