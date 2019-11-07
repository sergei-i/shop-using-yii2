<?php


namespace app\controllers;


use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-Shopper');

        return $this->render('index', compact('hits'));
    }

    public function actionView($id)
    {
        //$id = Yii::$app->request->get('id');

        $category = Category::findOne($id);
        if (empty($category)) {
            throw new HttpException(404, 'Такой категории нет');
        }

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('E-Shopper | ' . $category->name, $category->keywords, $category->description);

        return $this->render('view', compact('products', 'pages', 'category'));
    }

    public function actionSearch()
    {
        $query = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-Shopper | Поиск: ' . $query);
        if (!$query) {
            return $this->render('search');
        }

        $result = Product::find()->where(['like', 'name', $query]);
        $pages = new Pagination([
            'totalCount' => $result->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $result->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', compact('products', 'pages', 'query'));
    }
}