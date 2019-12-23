<!DOCTYPE html>
<html class="<?= $params['html_class'] ?>" lang="<?= $intl->getLocaleTag() ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $view->render('head') ?>
        <?php $view->style('uikit3', 'theme:css/uikit/uikit.min.css') ?>
        <?php $view->style('theme', 'theme:css/theme.css') ?>
        <?php $view->script('uikit3', 'theme:js/uikit/uikit.min.js') ?>
        <?php $view->script('uikit3_icons', 'theme:js/uikit/uikit-icons.min.js') ?>
    </head>
    <body>

        <?php if ($params['logo'] || $view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
            <div class="uk-position-relative">
                <nav class="<?= $params['classes.navbar'] ?>" <?= $params['classes.sticky'] ?> uk-navbar>
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo" href="<?= $view->url()->get() ?>">
                            <?php if ($params['logo']) : ?>
                                <img src="<?= $this->escape($params['logo']) ?>" alt="">
                            <?php else : ?>
                                <?= $params['title'] ?>
                            <?php endif ?>
                        </a>
                    </div>

                    <div class="uk-navbar-right">
                        <?php if ($view->menu()->exists('main') || $view->position()->exists('navbar')) : ?>
                        <div class="uk-navbar-nav bk-navbar-main">
                            <?= $view->menu('main', 'menu-navbar.php') ?>
                            <?= $view->position('navbar', 'position-blank.php') ?>
                        </div>
                        <?php endif ?>
                        <div class="uk-navbar-nav">
                            <button class="bk-hamburger" uk-toggle="target: #offcanvas" uk-navbar-toggle-icon type="button"></button>
                        </div>
                    </div>
                </nav>

            </div>
        <?php endif ?>

        <?php if ($view->position()->exists('hero')) : ?>
        <div class="bk-hero uk-section uk-light <?= $params['classes.hero'] ?>" <?= $params['hero_image'] ? "style=\"background-image: url('{$view->url($params['hero_image'])}');\"" : '' ?> <?= $params['classes.parallax'] ?>>
            <div class="uk-container">
                <?= $view->position('hero', 'position-grid.php') ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($view->position()->exists('top')) : ?>
        <div class="uk-section uk-section-primary uk-light">
            <div class="uk-container">
            <?= $view->position('top', 'position-grid.php') ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="uk-section uk-section-default <?= $params['main_style'] ?>">
            <div class="uk-container uk-container-small">

                <div class="uk-grid" uk-grid>

                    <main class="<?= $view->position()->exists('sidebar') ? 'uk-width-3-4@m' : 'uk-width-1-1'; ?>">
                        <?= $view->render('content') ?>
                    </main>

                    <?php if ($view->position()->exists('sidebar')) : ?>
                    <aside class="uk-width-1-4@m <?= $params['sidebar_first'] ? 'uk-flex-order-first-medium' : ''; ?>">
                        <?= $view->position('sidebar', 'position-panel.php') ?>
                    </aside>
                    <?php endif ?>

                </div>

            </div>
        </div>

        <?php if ($view->position()->exists('bottom')) : ?>
        <div class="uk-section uk-section-default <?= $params['bottom_style'] ?>">
            <div class="uk-container uk-container">

                <section class="uk-grid uk-grid-match" uk-grid>
                    <?= $view->position('bottom', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif; ?>

        <?php if ($view->position()->exists('footer')) : ?>
        <div class="uk-section uk-section-secondary uk-light">
            <div class="uk-container">

                <section class="uk-grid-match uk-child-width-1-3@m" uk-grid></section>
                    <?= $view->position('footer', 'position-grid.php') ?>
                </section>

            </div>
        </div>
        <?php endif; ?>

        <?php if ($view->position()->exists('offcanvas') || $view->menu()->exists('offcanvas')) : ?>
        <div id="offcanvas" uk-offcanvas="mode: reveal; overlay: true">
            <div class="uk-offcanvas-bar uk-flex uk-flex-column">
                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <?php if ($params['logo_offcanvas']) : ?>
                <div class="uk-panel uk-text-center">
                    <a href="<?= $view->url()->get() ?>">
                        <img src="<?= $this->escape($params['logo_offcanvas']) ?>" alt="">
                    </a>
                </div>
                <?php endif ?>

                <?php if ($view->menu()->exists('offcanvas')) : ?>
                    <?= $view->menu('offcanvas', ['class' => 'uk-nav-default']) ?>
                <?php endif ?>

                <?php if ($view->position()->exists('offcanvas')) : ?>
                    <?= $view->position('offcanvas', 'position-panel.php') ?>
                <?php endif ?>

            </div>
        </div>
        <?php endif ?>

        <?= $view->render('footer') ?>

    </body>
</html>
