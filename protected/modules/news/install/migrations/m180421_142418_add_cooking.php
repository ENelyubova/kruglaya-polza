<?php

class m180421_142418_add_cooking extends yupe\components\DbMigration
{
	/**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->addColumn('{{news_news}}', 'cooking', 'varchar(250)');
    }
    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropColumn('{{news_news}}', 'cooking');
    }
}