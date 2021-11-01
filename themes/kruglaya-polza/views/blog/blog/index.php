<?php
/**
 * @var $this BlogController
 * @var $form TbActiveForm
 * @var $blogs Blog
 */
$this->title = Yii::t('BlogModule.blog', 'Blogs');
$this->description = Yii::t('BlogModule.blog', 'Blogs');
$this->keywords = Yii::t('BlogModule.blog', 'Blogs');
?>

<?php $this->breadcrumbs = [Yii::t('BlogModule.blog', '')]; ?>

<div class="page-news page-blog pb">
    <div class="content-site">
        <?php $this->widget(
            'bootstrap.widgets.TbBreadcrumbs',
            [
                'links' => $this->breadcrumbs,
            ]
        );?>
        <h1 class="heading heading-pb">Рецепты</h1>
        <div id="news-box">
           
            <?php
                $this->widget(
                    'bootstrap.widgets.TbListView',
                    [
                        'dataProvider'       => $dataProvider,
                        'template'           => '{items} {pager}',
                        'itemsCssClass'      => 'blog-list fl fl-w',
                        'itemView'           => '//blog/post/_item',
                        'pagerCssClass' => 'pagination-box  fl fl-jc-c',
                        'pager' => [
                            'header' => '',
                            'nextPageLabel'=> false,
                            'prevPageLabel'=> false,
                            'firstPageLabel'=> '<',
                            'lastPageLabel'=> '>',
                            'selectedPageCssClass' => 'active',
                            'hiddenPageCssClass' => 'disabled',
                            'htmlOptions' => [
                                'class' => 'pagination pagination-panel'
                            ]
                        ]
                    ]
                );
                ?>

        </div>

        <div class="mobile-news read-all page-news">
            <div class="news-panel">
                <?php $this->widget("application.modules.blog.widgets.LastPostsWidget", [
                    'view' => 'mobile-post',
                ]); ?>
            </div>
        </div>
    </div>
</div>



