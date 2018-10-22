<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_190933_deliverytoitems
 */
class m181020_190933_deliverytoitems extends Migration
{

    public function up()
    {
         $this->createTable('deliverytocitys', [
            'id' => Schema::TYPE_PK,
            'did' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'cid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-did-deliverytocitys',
            'deliverytocitys',
            'did',
            'deliverys',
            'id',
            'CASCADE'
        );
         $this->addForeignKey(
            'fk-iid-deliverytocitys',
            'deliverytocitys',
            'cid',
            'citys',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('deliverytocitys');
         $this->dropForeignKey(
            'fk-did-deliverytocitys',
            'deliverytocitys');
        
         $this->dropForeignKey(
            'fk-iid-deliverytocitys',
            'deliverytocitys');
    }
}
