<h1>Add post</h1>

<p><?= $this->Html->link('< Back to posts', ['controller' => 'Admin', 'action' => 'index']) ?></p>

<?= $this->Form->create($post); ?>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'Name :']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('slug', ['class' => 'form-control', 'label' => 'Slug :']) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?= $this->Form->control('category_id', ['class' => 'form-control', 'label' => 'Category :']) ?>
    </div>
    <div class="col-md-6">
        <?= $this->Form->control('user_id', ['class' => 'form-control', 'label' => 'Author :']) ?>
    </div>
</div>
<?= $this->Form->control('content', ['class' => 'form-control', 'label' => 'Content :']) ?>
<div class="submit">
    <input class="btn btn-primary" type="submit" value="Ajouter">
</div>
<?= $this->Form->end(); ?>
