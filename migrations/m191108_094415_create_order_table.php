<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m191108_094415_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey()->unsigned(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'qty' => $this->integer()->notNull(),
            'sum' => $this->float()->notNull(),
            'status' => 'ENUM("0", "1")',
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
        ]);

        $sql = "ALTER TABLE `order` ALTER `status` SET DEFAULT '0'";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
