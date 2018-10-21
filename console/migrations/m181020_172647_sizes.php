<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_172647_sizes
 */
class m181020_172647_sizes extends Migration
{

    public function up()
    {
         $this->createTable('sizes', [
            'id' => Schema::TYPE_PK,
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'description' => Schema::TYPE_TEXT,
            'weigth' => Schema::TYPE_DECIMAL.'(3,2)'.' NOT NULL',
            'width' => Schema::TYPE_DECIMAL.'(3,2)'.' NOT NULL',
            'height' => Schema::TYPE_DECIMAL.'(3,2)'.' NOT NULL',
            'length' => Schema::TYPE_DECIMAL.'(3,2)'.' NOT NULL',

        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-iid-sizes',
            'sizes',
            'iid',
            'items',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('sizes');
         $this->dropForeignKey(
            'fk-iid-sizes',
            'sizes');
    }
}
