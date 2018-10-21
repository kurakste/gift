<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_190537_vendertocity
 */
class m181020_190537_vendertocity extends Migration
{

    public function up()
    {
         $this->createTable('vendertocity', [
            'id' => Schema::TYPE_PK,
            'vid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'cid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-vid-vendertocity',
            'vendertocity',
            'vid',
            'venders',
            'id',
            'CASCADE'
        );
         $this->addForeignKey(
            'fk-cid-vendertocity',
            'vendertocity',
            'cid',
            'citys',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('vendertocity');
         $this->dropForeignKey(
            'fk-vid-vendertocity',
            'vendertocity');
        
         $this->dropForeignKey(
            'fk-cid-vendertocity',
            'vendertocity');
    }

}
