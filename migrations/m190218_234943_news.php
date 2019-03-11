<?php

use yii\db\Migration;

/**
 * Class m190218_234943_news
 */
class m190218_234943_news extends Migration
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
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'author' => $this->string(255)->notNull(),
            'date_created' => $this->timestamp()->defaultValue(null),
            'category' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),
            'title' => $this->string(255)->notNull(),
            'views' => $this->integer()->notNull()->defaultValue(0),
            'tags' => $this->string(255)->notNull(),
            'image_id' => $this->integer()->notNull(),
        ], $tableOptions);


//        $this->createIndex()
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190218_234943_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190218_234943_news cannot be reverted.\n";

        return false;
    }
    */
}
