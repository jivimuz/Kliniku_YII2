<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'Kliniku',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav nav items-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/'],
            'visible' => Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ? 
            ['label' => 'Menu', 'url' => ['/site/login']]
            : 
            ['label' => 'Menu', 'url' => ['/site/menu']]
            
        ]
    ]);
    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ],
        'items' => [
            // ['label' => 'Home', 'url' => ['/site/index']],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            [
                'label' => 'Users   ',
                'url' => ['user/index'],
                'visible' => !Yii::$app->user->isGuest && Yii::$app->session->get('users')->role == 1,
                'template' => '<a href="{url}" class="href_class">{label}</a>',
            ],
            [
                'label' => 'Master',
                'url' => ['site/index'],
                'options'=>['class'=>'dropdown'],
                'visible' => !Yii::$app->user->isGuest && (Yii::$app->session->get('users')->role == 1 ||Yii::$app->session->get('users')->role == 2 ),
                'template' => '<a href="{url}" class="href_class">{label}</a>',
                'items' => [
                    ['label' => 'Wilayah', 'url' => ['/master/wilayah']],
                    ['label' => 'Pegawai', 'url' => ['/master/pegawai']],
                    ['label' => 'Tindakan', 'url' => ['/master/tindakan']],
                    ['label' => 'Obat', 'url' => ['/master/obat']],
                ]
            ],
            
            [
                'label' => 'Transaksi',
                'url' => ['site/index'],
                'options'=>['class'=>'dropdown'],
                'visible' => !Yii::$app->user->isGuest && (Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3),
                'template' => '<a href="{url}" class="href_class">{label}</a>',
                'items' => [
                    ['label' => 'Pasien', 'url' => ['/transaksi/pasien']],
                    ['label' => 'Pemeriksaan', 'url' => ['/transaksi/pemeriksaan']],
                ]
            ],
            [
                'label' => 'Graph',
                'url' => ['site/graph'],
                'visible' => !Yii::$app->user->isGuest,
                'template' => '<a href="{url}" class="href_class">{label}</a>',
            ],
            
           
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav nav items-right'],
        'items' => [
            Yii::$app->user->isGuest ? 
            ['label' => 'Login', 'url' => ['/site/login']]

            : 
            
            '<li class="nav-item">' . Html::beginForm(['/site/logout']) . Html::submitButton( 'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'nav-link btn btn-link logout']
                    ) . Html::endForm() . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container ">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">Jivimuz &copy; Kliniku <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
