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
            'cost' => Schema::TYPE_DECIMAL.'(6,2)'.' NOT NULL',
            'description' => Schema::TYPE_STRING.' NOT NULL',


        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
    }

    public function down()
    {
        $this->dropTable('deliverys');
    }
}
