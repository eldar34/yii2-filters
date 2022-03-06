<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m220305_060942_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'country_id' => $this->integer(),
            'category_id' => $this->integer(),
            'price' => $this->integer(),
            'color' => $this->string(),            

            'created_at' => $this->date(),
            'updated_at' => $this->date()
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            'idx-products-country_id',
            'products',
            'country_id'
        );

        // add foreign key for table `country`
        $this->addForeignKey(
            'fk-products-country_id',
            'products',
            'country_id',
            'country',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-products-category_id',
            'products',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
