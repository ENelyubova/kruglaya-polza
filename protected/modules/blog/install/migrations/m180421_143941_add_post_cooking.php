<?php

class m180421_143941_add_post_cooking extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{blog_post}}', 'cooking', 'varchar(250)');
    }
    public function safeDown()
    {
        $this->dropColumn('{{blog_post}}', 'cooking');
    }
}