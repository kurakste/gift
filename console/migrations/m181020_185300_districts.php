<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_185300_districts
 */
class m181020_185300_districts extends Migration
{

    public function up()
    {
         $this->createTable('districts', [
            'id' => Schema::TYPE_PK,
            'cid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'notes' => Schema::TYPE_STRING.' NOT NULL',


        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );

         $this->addForeignKey(
            'fk-cid-district',
            'districts',
            'cid',
            'citys',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('districts');
    }
}
