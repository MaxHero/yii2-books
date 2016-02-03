<?php

namespace app\models\forms;

use app\models\Book;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * BookSearch represents the model behind the search form about `app\models\Book`.
 */
class BookSearch extends Book
{
    public $from;
    public $to;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from'], 'date', 'format' => 'd.m.Y'],
            [['to'], 'date', 'format' => 'd.m.Y'],
            [['name', 'author_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function formName()
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
                'from' => 'Дата выхода книги',
            ]
        );
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Book::find()->joinWith('author');

        $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'sort'  => [
                    'attributes' => [
                        'id',
                        'name',
                        'author' => [
                            'asc'  => ['author.firstname' => SORT_ASC, 'author.lastname' => SORT_ASC],
                            'desc' => ['author.firstname' => SORT_DESC, 'author.lastname' => SORT_DESC],
                        ],
                        'date',
                        'date_create',
                    ],
                ],
            ]
        );

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['author_id' => $this->author_id])
              ->andFilterWhere(['like', 'name', $this->name]);

        if (!empty($this->from)) {
            $from = \DateTime::createFromFormat('d.m.Y', $this->from);
            $query->andFilterWhere(['>=', 'date', $from->format('Y-m-d')]);
        }
        if (!empty($this->to)) {
            $to = \DateTime::createFromFormat('d.m.Y', $this->to);
            $query->andFilterWhere(['<=', 'date', $to->format('Y-m-d')]);
        }

        return $dataProvider;
    }
}
