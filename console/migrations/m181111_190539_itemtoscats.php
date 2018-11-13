<?php

use yii\db\Migration;
use yii\db\Schema;


/**
 * Class m181111_190539_itemtoscats
 */
class m181111_190539_itemtoscats extends Migration
{
    public function up()
    {
         $this->createTable('itemtoscats', [
            'id' => Schema::TYPE_PK,
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'scid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-iid-itemtoscats',
            'itemtoscats',
            'iid',
            'items',
            'id',
            'CASCADE'
        );
         $this->addForeignKey(
            'fk-fcid-itemtoscats',
            'itemtoscats',
            'scid',
            'scategorys',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('itemstoscats');
         $this->dropForeignKey(
            'fk-iid-itemtoscats',
            'itemtoscats'
            );
        
         $this->dropForeignKey(
            'fk-fcid-itemtiscats',
            'itemtiscats'
        );
    }

}
