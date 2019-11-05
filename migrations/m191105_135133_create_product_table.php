<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m191105_135133_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
                'id' => $this->primaryKey()->unsigned(),
                'category_id' => $this->integer()->unsigned()->notNull(),
                'name' => $this->string()->notNull(),
                'content' => $this->text()->null(),
                'price' => $this->float()->defaultValue(0),
                'keywords' => $this->string()->null(),
                'description' => $this->string()->null(),
                'img' => $this->string()->defaultValue('no-image.png'),
                'hit' => 'ENUM("0", "1")',
                'new' => 'ENUM("0", "1")',
                'sale' => 'ENUM("0", "1")',
            ]
        );
        $sql = "ALTER TABLE product ALTER hit SET DEFAULT '0', ALTER new SET DEFAULT '0', ALTER sale SET DEFAULT '0'";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
