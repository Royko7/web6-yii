<?php

use yii\db\Migration;

/**
 * Class m190215_183143_test_data
 */
class m190215_183143_test_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insert('{{%users}}',
            [
                'username' => 'ura',
                'password' => 'password',
                'email' => 'email',
                'status' => '10',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
                'auth_key' => 'qwerty',
                'password_reset_token' => 'qwerty'

            ]);
//$this->batchInsert('{{$users}}',[]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%users}}', "'username='ura'");

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190215_183143_test_data cannot be reverted.\n";

        return false;
    }
    */
}
