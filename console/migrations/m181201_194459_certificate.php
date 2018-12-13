<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181201_194459_certificate
 */
class m181201_194459_certificate extends Migration
{

    public function up()
    {
         $this->createTable('certificates', [
            'id' => Schema::TYPE_PK,
            'purchase_price' => Schema::TYPE_DECIMAL.'(6,2)'.' NOT NULL',
            'sale_price' => Schema::TYPE_DECIMAL.'(6,2)'.' NOT NULL',
            'certid' => Schema::TYPE_STRING.' NOT NULL',
            'iid' => Schema::TYPE_INTEGER.' NOT NULL DEFAULT 1',
            'donor_name' => Schema::TYPE_STRING,
            'donor_phone' => Schema::TYPE_STRING,
            'donor_email' => Schema::TYPE_STRING,
            'recipient_name' => Schema::TYPE_STRING,
            'recipient_phone' =>Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_TIMESTAMP.' NOT NULL',
            'activated_at' => Schema::TYPE_TIMESTAMP,
            'closed_at' => Schema::TYPE_TIMESTAMP,
            'status' => Schema::TYPE_TINYINT.' NOT NULL',
        ],

        'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB'
    );
         $this->createIndex('certid_index', 'certificates', 'certid', true);
         $this->createIndex('status_index', 'certificates', 'status');
         $this->createIndex('status_iid', 'certificates', 'status');
         $this->addForeignKey(
            'fk-certificates-items',
            'certificates',
            'iid',
            'items',
            'id',
            'CASCADE');
    }

    public function down()
    {
        $this->dropIndex('certid_index', 'certificates');
        $this->dropIndex('status_index', 'certificates', 'status');
        $this->dropIndex('status_iid', 'certificates', 'status');
        $this->dropForeignKey(
            'fk-certificates-items',
            'certificates'
        );
        $this->dropTable('certificates');
        
    }
}
