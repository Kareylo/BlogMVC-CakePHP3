<?php /** @var \App\View\AppView $this */ ?>
<?= $this->Form->create(null, ['class' => 'form-signin']); ?>
<h4 class="form-signin-heading">Please sign in</h4>
<?= $this->Form->control('username', ['label' => false, 'placeholder' => 'Username', 'class' => 'form-control', 'autofocus']) ?>
<?= $this->Form->control('password', ['label' => false, 'placeholder' => 'Password', 'class' => 'form-control']) ?>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<?= $this->Form->end(); ?>
