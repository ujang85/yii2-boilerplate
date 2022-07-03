<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m220702_012148_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%products}}', [
            'id' => $this->bigInteger()->notNull() . ' AUTO_INCREMENT',
            'product_name' => $this->string(255)->notNull(),
            'category_id' => $this->bigInteger(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted_at' => $this->integer(),
            'created_by' => $this->bigInteger()->notNull(),
            'updated_by' => $this->bigInteger()->notNull(),
            'deleted_by' => $this->bigInteger()->null(),
            'PRIMARY KEY ([[id]])',
            'FOREIGN KEY ([[category_id]]) REFERENCES {{%categories}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[created_by]]) REFERENCES {{%user}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[updated_by]]) REFERENCES {{%user}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[deleted_by]]) REFERENCES {{%user}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);

        $data = array();

        for ($i=1; $i <= 100; $i++) { 
            $faker = Faker\Factory::create();
            $data[$i]['id'] = $i;
            $data[$i]['product_name'] = $faker->word;
            $data[$i]['category_id'] = rand(1,50);
            $data[$i]['created_at'] = time();
            $data[$i]['updated_at'] = time();
            $data[$i]['deleted_at'] = null;
            $data[$i]['created_by'] = rand(1,2);
            $data[$i]['updated_by'] = rand(1,2);
            $data[$i]['deleted_by'] = null;
        }

        $this->batchInsert('{{%products}}', ['id', 'product_name', 'category_id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'], $data);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
