<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181018_183810_scategorys
 */
class m181018_183810_scategorys extends Migration
{

    public function up()
    {
         $this->createTable('scategorys', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'cpu' => Schema::TYPE_STRING. ' NOT NULL' ,
            'description' => Schema::TYPE_STRING,
            'image' => Schema::TYPE_STRING. ' NOT NULL',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
        $this->execute("ALTER TABLE scategorys ADD FULLTEXT INDEX cpu_categorys (cpu ASC)");
        $this->execute("ALTER TABLE scategorys ADD CONSTRAINT unique_category_cpu UNIQUE(cpu)");

    }

    public function down()
    {
        $this->dropTable('scategorys');
    }
}
