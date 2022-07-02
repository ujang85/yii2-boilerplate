<?php

class m000000_000002_user extends \yii\db\Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->bigInteger()->notNull() . ' AUTO_INCREMENT',
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'verification_token' => $this->string()->defaultValue(null),
            'PRIMARY KEY ([[id]])',
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'superadmin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => '$2y$13$wWs4/So1wkoN5R./MM5IxOJj4kuDjmWKSsifqPki0jYpbSyM0eeK.', //bastomisaja
            'password_reset_token' => null,
            'email' => 'admin@mail.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
            'verification_token' => null,
        ]);

        $this->insert('{{%user}}', [
            'id' => 2,
            'username' => 'member',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => '$2y$13$wWs4/So1wkoN5R./MM5IxOJj4kuDjmWKSsifqPki0jYpbSyM0eeK.', //bastomisaja
            'password_reset_token' => null,
            'email' => 'member@mail.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
            'verification_token' => null,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
