<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181111_185617_itemtofcats
 */
class m181111_185617_itemtofcats extends Migration
{

    public function up()
    {
         $this->createTable('itemtofcats', [
            'id' => Schema::TYPE_PK,
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'fcid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-iid-itemtofcats',
            'itemtofcats',
            'iid',
            'items',
            'id',
            'CASCADE'
        );
         $this->addForeignKey(
            'fk-fcid-itemtofcats',
            'itemtofcats',
            'fcid',
            'fcategorys',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('itemstofcats');
         $this->dropForeignKey(
            'fk-iid-itemtofcats',
            'itemtofcats'
            );
        
         $this->dropForeignKey(
            'fk-fcid-itemtifcats',
            'itemtifcats'
        );
    }
}
