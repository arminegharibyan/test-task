<?php

use yii\db\Migration;

/**
 * Class m210311_065511_add_admin
 */
class m210311_065511_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert(\common\models\User::tableName(), ['username' => 'admin', 'password_hash' => Yii::$app->security->generatePasswordHash('admin'), 'email'=>'example@example.com']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210311_065511_add_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210311_065511_add_admin cannot be reverted.\n";

        return false;
    }
    */
}
