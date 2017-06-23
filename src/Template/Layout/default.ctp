<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?= $this->fetch('title'); ?> | MyDomain.com</title>

        <!-- Bootstrap core CSS -->
        <?= $this->Html->css(['bootstrap', 'bootstrap-theme']); ?>
        <style>
            body {
                padding-top: 50px;
            }

            .sidebar {
                margin-top: 50px;
            }
        </style>
    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?= $this->Html->link('Blog', '/', ['class' => 'navbar-brand']) ?>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <?php if ($this->request->session()->read('Auth.User')): ?>
                            <li><?= $this->Html->link('Admin', ['controller' => 'Admin', 'action' => 'index']) ?></li>
                        <?php else: ?>
                            <li><?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content'); ?>
                <?php if ($this->request->params['action'] !== 'login'): ?>
                    <?= $this->cell('Sidebar') ?>
                <?php endif; ?>
            </div>
        </div>
        <?= $this->Html->script(['bootstrap']); ?>
    </body>
</html>
