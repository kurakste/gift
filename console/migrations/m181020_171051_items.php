<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_171051_items
 */
class m181020_171051_items extends Migration
{

    public function up()
    {
         $this->createTable('items', [
            'id' => Schema::TYPE_PK,
            'vid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'exid' => Schema::TYPE_STRING.' NOT NULL',
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'cpu' => Schema::TYPE_STRING.' NOT NULL',
            'short_description' => Schema::TYPE_STRING.' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'lifetime' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'rank' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'phisical' => Schema::TYPE_BOOLEAN.' NOT NULL',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->createIndex('items_fcid','items','fcid', false);
         $this->createIndex('items_scid','items','scid', false);
         $this->createIndex('items_vid','items','vid', false);
         $this->execute("ALTER TABLE items ADD CONSTRAINT unique_item_cpu UNIQUE(cpu)");
         
         $this->addForeignKey(
            'fk-items-vender',
            'items',
            'vid',
            'venders',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('items');
        $this->addForeignKey(
            'fk-items-vendor',
            'items');
    }
}
