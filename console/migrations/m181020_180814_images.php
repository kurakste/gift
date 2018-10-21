<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181020_180814_images
 */
class m181020_180814_images extends Migration
{
    public function up()
    {
         $this->createTable('images', [
            'id' => Schema::TYPE_PK,
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'alt' => Schema::TYPE_STRING.' NOT NULL',
            'path' => Schema::TYPE_STRING.' NOT NULL',
            'main' => Schema::TYPE_BOOLEAN,


        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->addForeignKey(
            'fk-iid-images',
            'images',
            'iid',
            'items',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('images');
         $this->dropForeignKey(
            'fk-iid-images',
            'images');
    }
}
