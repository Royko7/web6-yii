<?php

use yii\db\Migration;

/**
 * Class m190213_184721_comments
 */
class m190213_184721_comments extends Migration
{


    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=INNODB';

        }


        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->unique(),
            'username' => $this->string(32)->notNull()->unique(),
            'post_id' => $this->integer()->notNull(),
            'body' => $this->text()->notNull(),
            'date_create' => $this->timestamp()->defaultValue(null),
            'date_update' => $this->timestamp()->defaultValue(null),

        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
//        echo "m190213_184721_comments cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190213_184721_comments cannot be reverted.\n";

        return false;
    }
    */
}
