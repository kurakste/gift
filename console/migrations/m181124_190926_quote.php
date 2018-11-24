<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181124_190926_quote
 */
class m181124_190926_quote extends Migration
{

    public function up()
    {
         $this->createTable('quotes', [
            'id' => Schema::TYPE_PK,
            'body' =>Schema::TYPE_TEXT,
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
    }

    public function down()
    {
        $this->dropTable('quotes');
        
    }
}
