<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_190037_discounts
 */
class m181020_190037_discounts extends Migration
{

    public function up()
    {
         $this->createTable('discounts', [
            'id' => Schema::TYPE_PK,
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'discount' => Schema::TYPE_FLOAT,
            'description' => Schema::TYPE_STRING.' NOT NULL',
            'created_at' => Schema::TYPE_DATE,
            'start_at' => Schema::TYPE_DATE,
            'stop_at' => Schema::TYPE_DATE,
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );

         $this->addForeignKey(
            'fk-iid-district',
            'discounts',
            'iid',
            'items',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('discounts');
    }
}
