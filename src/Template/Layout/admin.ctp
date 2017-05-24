<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Kareylo">

        <title>Blog | Admin panel</title>

        <!-- Bootstrap core CSS -->
        <?= $this->Html->css(['bootstrap', 'bootstrap-theme']) ?>
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
                    <?= $this->Html->link('Blog', ['controller' => 'Admin'], ['class' => 'navbar-brand']) ?>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><?= $this->Html->link('Back to front', '/') ?></li>
                        <li><?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']) ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content'); ?>
        </div>
    </body>
</html>
