<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181118_145406_favorite
 */
class m181118_145406_favorite extends Migration
{
    public function up()
    {
         $this->createTable('favorites', [
            'id' => Schema::TYPE_PK,
            'favid' => Schema::TYPE_STRING.' NOT NULL',
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-iid-favorites',
            'favorites',
            'iid',
            'items',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-iid-favorites',
            'favorite'
        );
        $this->dropTable('favorite');
        
    }
}
