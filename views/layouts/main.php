<?php
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */
// if (class_exists('app\assets\AppAsset')) {
    app\assets\AppAsset::register($this);
// } else {
    dmstr\web\AdminLteAsset::register($this);
// }
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link rel="shortcut icon" type="image/jpg" href="<?php echo Yii::getAlias('@web'); ?>/img/logo.png"/>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <header>
    <?php


if (Yii::$app->user->isGuest) {
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Registar', 'url' => ['/site/signup']],
        ['label' => 'Entrar', 'url' => ['/site/login']]
    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    
}else {

     $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ;
     }
    ?>
</header>


<?php
if (Yii::$app->user->isGuest) { ?>

    <main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php }else { ?>

    <div class="wrapper">

    <?=   $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ;
    ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php } ?>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

