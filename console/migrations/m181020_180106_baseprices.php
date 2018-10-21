<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_180106_baseprices
 */
class m181020_180106_baseprices extends Migration
{
    public function up()
    {
         $this->createTable('baseprices', [
            'id' => Schema::TYPE_PK,
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'purchase_price' => Schema::TYPE_DECIMAL.'(6,2)'.' NOT NULL',
            'base_pice' => Schema::TYPE_DECIMAL.'(6,2)'.' NOT NULL',
            'active_from' => Schema::TYPE_DATE, 
            'active_till' => Schema::TYPE_DATE, 


        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-iid-baseprices',
            'baseprices',
            'iid',
            'items',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('baseprices');
         $this->dropForeignKey(
            'fk-iid-baseprices',
            'baseprices');
    }

}
