<?php

use yii\db\Migration;

class m160113_204814_create_table_book extends Migration
{
    public function up()
    {
        $this->createTable(
            'book',
            [
                'id'          => $this->primaryKey(),
                'name'        => $this->string()->notNull(),
                'date_create' => $this->dateTime()->notNull(),
                'date_update' => $this->dateTime()->notNull(),
                'preview'     => $this->string()->notNull(),
                'date'        => $this->date()->notNull(),
                'author_id'   => $this->integer()->notNull(),
            ]
        );

        $this->batchInsert(
            'book',
            [
                'name',
                'date_create',
                'date_update',
                'preview',
                'date',
                'author_id',
            ],
            [
                [
                    'name'        => 'Старик и море',
                    'date_create' => new \yii\db\Expression('NOW() - INTERVAL 1 DAY'),
                    'date_update' => new \yii\db\Expression('NOW()'),
                    'preview'     => '',
                    'date'        => '1952-01-01',
                    'author_id'   => 1,
                ],
                [
                    'name'        => 'Парфюмер',
                    'date_create' => new \yii\db\Expression('NOW() - INTERVAL 3 DAY'),
                    'date_update' => new \yii\db\Expression('NOW() - INTERVAL 3 HOUR'),
                    'preview'     => '',
                    'date'        => '1985-03-20',
                    'author_id'   => 2,
                ],
                [
                    'name'        => 'Капитанская дочка',
                    'date_create' => new \yii\db\Expression('NOW() - INTERVAL 5 DAY'),
                    'date_update' => new \yii\db\Expression('NOW() - INTERVAL 5 HOUR'),
                    'preview'     => '',
                    'date'        => '1836-06-22',
                    'author_id'   => 3,
                ],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('book');
    }
}
