<?php

class m180421_143939_add_post_time extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{blog_post}}', 'time', 'varchar(250)');
    }
    public function safeDown()
    {
        $this->dropColumn('{{blog_post}}', 'time');
    }
}