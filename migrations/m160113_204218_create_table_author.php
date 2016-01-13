<?php

use yii\db\Migration;

class m160113_204218_create_table_author extends Migration
{
    public function up()
    {
        $this->createTable(
            'author',
            [
                'id'        => $this->primaryKey(),
                'firstname' => $this->string()->notNull(),
                'lastname'  => $this->string()->notNull(),
            ]
        );

        $this->batchInsert(
            'author',
            ['firstname', 'lastname'],
            [
                [
                    'firstname' => 'Эрнест',
                    'lastname'  => 'Хемингуэй',
                ],
                [
                    'firstname' => 'Патрик',
                    'lastname'  => 'Зюскинд',
                ],
                [
                    'firstname' => 'Александр',
                    'lastname'  => 'Пушкин',
                ],
            ]
        );
    }

    public function down()
    {
        $this->dropTable('author');
    }
}
