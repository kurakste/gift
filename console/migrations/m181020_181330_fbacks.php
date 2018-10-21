<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_181330_fbacks
 */
class m181020_181330_fbacks extends Migration
{
    public function up()
    {
         $this->createTable('fbacks', [
            'id' => Schema::TYPE_PK,
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'oid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'image' => Schema::TYPE_STRING.' NOT NULL',
            'date' => Schema::TYPE_DATE,
            'fbacks' => Schema::TYPE_TEXT,
            'rating' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',


        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-iid-fbacks',
            'fbacks',
            'iid',
            'items',
            'id',
            'CASCADE'
        );
         
         /* $this->addForeignKey( */
         /*    'fk-oid-fbacks', */
         /*    'fbacks', */
         /*    'iid', */
         /*    'orders', */
         /*    'id', */
         /*    'CASCADE' */
        /* ); */
    }

    public function down()
    {
        $this->dropTable('fbacks');
         $this->dropForeignKey(
            'fk-iid-fbacks',
            'fbacks');
    }
}
