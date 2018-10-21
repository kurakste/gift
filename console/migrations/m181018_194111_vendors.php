<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181018_194111_vendors
 */
class m181018_194111_vendors extends Migration
{

    public function up()
    {
         $this->createTable('venders', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'address' => Schema::TYPE_STRING. ' NOT NULL' ,
            'url' => Schema::TYPE_STRING. ' NOT NULL' ,
            'description' => Schema::TYPE_TEXT,
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );

    }

    public function down()
    {
        $this->dropTable('venders');
    }
}
