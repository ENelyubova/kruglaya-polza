<?php

class m180421_142419_add_visit extends yupe\components\DbMigration
{
	/**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->addColumn('{{news_news}}', 'visit', 'integer default "0"');
    }
    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropColumn('{{news_news}}', 'visit');
    }
}