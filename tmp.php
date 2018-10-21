<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181011_184040_items
 */
class m181011_184040_items extends Migration
{

    public function up()
    {
         $this->createTable('items', [
            'id' => Schema::TYPE_PK,
            'cid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'colid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'exid' => Schema::TYPE_STRING.' NOT NULL',
            'description' => Schema::TYPE_STRING.' NOT NULL',
            'weigth' => Schema::TYPE_DECIMAL.'(3,2)'.' NOT NULL',
            'width' => Schema::TYPE_DECIMAL.'(3,2)'.' NOT NULL',
            'height' => Schema::TYPE_DECIMAL.'(3,2)'.' NOT NULL',
            'length' => Schema::TYPE_DECIMAL.'(3,2)'.' NOT NULL',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->createIndex('items_colid','items','colid', false);
         $this->createIndex('items_cid','items','cid', false);
         $this->addForeignKey(
            'fk-items-color_id',
            'items',
            'colid',
            'colors',
            'id',
            'CASCADE'
        );
         $this->addForeignKey(
            'fk-items-category_id',
            'items',
            'cid',
            'categorys',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('items');
    }
}


<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m181011_194819_images
 */
class m181011_194819_images extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
         $this->createTable('images', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'cpu' => Schema::TYPE_TEXT,
            'description' => Schema::TYPE_STRING,
            'image' => Schema::TYPE_STRING. ' NOT NULL',
        ],
        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );

    }

    public function down()
    {
        $this->dropTable('categorys');
    }
    
    
}

