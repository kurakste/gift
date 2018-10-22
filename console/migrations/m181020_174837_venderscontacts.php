<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_174837_venderscontacts
 */
class m181020_174837_venderscontacts extends Migration
{

    public function up()
    {
         $this->createTable('vendercontacts', [
            'id' => Schema::TYPE_PK,
            'vid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'name' => Schema::TYPE_STRING,
            'mobile_phone' => Schema::TYPE_STRING,
            'work_phone' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING,
            'skype' => Schema::TYPE_STRING,
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->createIndex('items_vid','vendercontacts','vid', false);
         
         $this->addForeignKey(
            'fk-vendercontacts-vender',
            'vendercontacts',
            'vid',
            'venders',
            'id',
            'CASCADE');
    }

    public function down()
    {
        $this->dropTable('vendercontacts');
        $this->dropForeignKey(
            'fk-vendercontacts-vender',
            'venderscontacts'
        );
    }
}
