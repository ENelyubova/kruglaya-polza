<?php

class m180421_143940_add_post_visit extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{blog_post}}', 'visit', 'integer default "0"');
    }
    public function safeDown()
    {
        $this->dropColumn('{{blog_post}}', 'visit');
    }
}