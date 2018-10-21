<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_183442_deliverys
 */
class m181020_183442_delivery extends Migration
{

    public function up()
    {
         $this->createTable('deliverys', [
            'id' => Schema::TYPE_PK,
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'description' => Schema::TYPE_STRING.' NOT NULL',


        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-iid-deliverys',
            'deliverys',
            'iid',
            'items',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('deliverys');
         $this->dropForeignKey(
            'fk-iid-deliverys',
            'deliverys');
    }
}
