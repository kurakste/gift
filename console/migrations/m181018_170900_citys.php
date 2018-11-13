<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_184147_citys
 */
class m181018_170900_citys extends Migration
{

    public function up()
    {
         $this->createTable('citys', [
            'id' => Schema::TYPE_PK,
            'code' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'cpu' => Schema::TYPE_STRING.' NOT NULL',
            'notes' => Schema::TYPE_STRING.' NOT NULL',


        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->execute("ALTER TABLE citys ADD CONSTRAINT unique_city_cpu UNIQUE(cpu)");

    }

    public function down()
    {
        $this->dropTable('citys');
    }
}
