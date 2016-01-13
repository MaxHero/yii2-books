<?php

namespace app\models\forms;

use app\models\Book;
use yii\data\ActiveDataProvider;
use yii\data\DataProviderInterface;

class BookSearch extends Book
{
    /**
     * @return DataProviderInterface
     */
    public function search()
    {
        return new ActiveDataProvider([
                'query' => Book::find(),
            ]
        );
    }
}
