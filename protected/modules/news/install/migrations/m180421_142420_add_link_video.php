<?php

class m180421_142420_add_link_video extends yupe\components\DbMigration
{
	/**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->addColumn('{{news_news}}', 'video', 'string');
    }
    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropColumn('{{news_news}}', 'video');
    }
}