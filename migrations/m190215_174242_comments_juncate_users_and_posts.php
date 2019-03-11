<?php

use yii\db\Migration;

/**
 * Class m190215_174242_comments_juncate_users_and_posts
 */
class m190215_174242_comments_juncate_users_and_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createIndex('idx-comments_users-users_id',
            '{{%comments}}',
            'user_id'
        );
        $this->addForeignKey(
            'fk-comments_users-users_id',
            '{{%comments}}',
            'user_id',
            '{{%users}}',
            'id'

        );
        $this->createIndex(
            'idx-comments_posts-post_id',
            '{{%comments}}',
            'post_id');

        $this->addForeignKey(
            'fk-post_posts-post_id',
            '{{%comments}}',
            'post_id',
            '{{%posts}}',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-post_user-user_id', '{{%comments}}');
        $this->dropForeignKey('idx-comments_posts-post_id', '{{%comments}}');

        $this->dropIndex('idx-comments_posts-post_id', '{{%comments}}');
        $this->dropIndex('idx-comments_users-users_id', '{{%comments}}');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190215_174242_comments_juncate_users_and_posts cannot be reverted.\n";

        return false;
    }
    */
}
