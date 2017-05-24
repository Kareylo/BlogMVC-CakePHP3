<h1>Manage posts</h1>

<p><?= $this->Html->link('Add a new post', ['controller' => 'Admin', 'action' => 'add'], ['class' => 'btn btn-primary']) ?></p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Publication date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post->id ?></td>
                <td><?= $post->name ?></td>
                <td><?= $post->created ?></td>
                <td><?= $post->category->name ?></td>
                <td>
                    <?= $this->Html->link('Edit', ['controller' => 'Admin', 'action' => 'edit', 'id' => $post->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Admin', 'action' => 'delete', $post->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure  ?')]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if ($this->Paginator->counter() !== '1 of 1'): ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('«') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('»') ?>
        </ul>
    </div>
<?php endif; ?>
