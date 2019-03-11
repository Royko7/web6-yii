<?php

use yii\db\Migration;

/**
 * Class m190219_004336_images
 */
class m190219_004336_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=INNODB';

        }
        $this->createTable('{{%images}}', [
            'id' => $this->primaryKey(),
            'img_size' => $this->integer()->notNull(),
            'author' => $this->string()->notNull(),
            'date_create' => $this->timestamp()->notNull(),
            'category' => $this->string(255)->notNull(),
            'image_id' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190219_004336_images cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190219_004336_images cannot be reverted.\n";

        return false;
    }
    */
}
