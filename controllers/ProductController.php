<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use Yii;
use yii\web\HttpException;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');

        //$product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();
        $product = Product::findOne($id);
        if (empty($product)) {
            throw new HttpException(404, 'Такой категории нет');
        }
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-Shopper | ' . $product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product', 'hits'));
    }
}