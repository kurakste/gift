<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181018_175525_fcategorys
 */
class m181018_175525_fcategorys extends Migration
{

    public function up()
    {
         $this->createTable('fcategorys', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'cpu' => Schema::TYPE_STRING. ' NOT NULL' ,
            'description' => Schema::TYPE_TEXT,
            'image' => Schema::TYPE_STRING. ' NOT NULL',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
        $this->execute("ALTER TABLE fcategorys ADD FULLTEXT INDEX cpu_categorys (cpu ASC)");
        $this->execute("ALTER TABLE fcategorys ADD CONSTRAINT unique_category_cpu UNIQUE(cpu)");

    }

    public function down()
    {
        $this->dropTable('fcategorys');
    }

}
