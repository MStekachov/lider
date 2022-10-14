<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<div class="container-fluid footer">
            <div class="row">
                <div class="d-none d-lg-block col-lg-2"></div>
                <div class="d-none d-lg-block col-lg-2">
                    <h6>ПОКУПАТЕЛЯМ</h6>
                    <ul class="list-group">           
                        <li class="list-group-item">Акции</li>
                        <li class="list-group-item">Программы лояльности</li>
                        <li class="list-group-item">Возврат товара</li>
                        <li class="list-group-item">Политика конфиденциальности</li>
                        <li class="list-group-item">Пользовательское соглашение</li>
                    </ul>
                </div>
                <div class="d-none d-lg-block col-lg-2">
                    <h6>БИЗНЕСУ</h6>
                    <ul class="list-group">           
                        <li class="list-group-item">Бренды</li>
                        <li class="list-group-item">Поставщикам</li>
                        <li class="list-group-item">Брендирование</li>
                        <li class="list-group-item">Вызов менеджера</li>
                    </ul>
                </div>
                <div class="d-none d-lg-block col-lg-2">
                    <h6>ЛИДЕР</h6>
                    <ul class="list-group">           
                        <li class="list-group-item">О компании</li>
                        <li class="list-group-item">Новости</li>
                        <li class="list-group-item">Вакансии</li>
                        <li class="list-group-item">Продукция СТМ</li>
                    </ul>
                </div>
                <div class="d-none d-lg-block col-lg-2">
                    <h6>ООО "ЛИДЕР", 2022</h6>
                    <ul class="list-group">           
                        <li class="list-group-item">Все права защищены</li>
                    </ul>
                    <div class="call-block">
                        <p>Для Москвы и МО</p>
                        <p>+7 (495) 308-00-69</p>
                    </div>
                    <div class="call-block">
                        <p>Бесплатно по РФ</p>
                        <p>8 (800) 222-32-36</p>
                    </div>
                    <div class="pays-block">
                        <img src="images/pays/visa.png" alt="visa">
                        <img src="images/pays/mastercad.png" alt="mastercard">
                        <img src="images/pays/mir.png" alt="mir">
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-2"></div>
            </div>
            <div class="row">
                <footer>
                    <p>© ООО "Лидер", 2022</p>
                </footer>
            </div>
        </div>


<!--footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ООО "Лидер" <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
