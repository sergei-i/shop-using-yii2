<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_items}}`.
 */
class m191108_094501_create_order_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_items}}', [
            'id' => $this->primaryKey()->unsigned(),
            'order_id' => $this->integer()->unsigned()->notNull(),
            'product_id' => $this->integer()->unsigned()->notNull(),
            'name' => $this->string()->notNull(),
            'price' => $this->float()->notNull(),
            'qty_item' => $this->integer()->notNull(),
            'sum_item' => $this->float()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_items}}');
    }
}
