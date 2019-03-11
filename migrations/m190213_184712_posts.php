<?php

use yii\db\Migration;

/**
 * Class m190213_184712_posts
 */
class m190213_184712_posts extends Migration
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
        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp()->defaultValue(null),
            'title' => $this->string(255)->notNull(),
            'body' => $this->text()->notNull(),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%posts}}');

//        echo "m190213_184712_posts cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190213_184712_posts cannot be reverted.\n";

        return false;
    }
    */
}
