<div class="col-md-4 sidebar">
    <h4>Categories</h4>
    <div class="list-group">
        <?php foreach ($categories as $category): ?>
            <?= $this->Html->link("<span class='badge'>{$category->post_count}</span>{$category->name}",
                ['controller' => 'Posts', 'action' => 'category', 'slug' => $category->slug],
                ['escape' => false, 'class' => 'list-group-item']); ?>
        <?php endforeach; ?>
    </div>

    <h4>Last posts</h4>
    <div class="list-group">
        <?php foreach ($posts as $post): ?>
            <?= $this->Html->link($post->name, ['controller' => 'Posts', 'action' => 'view', 'slug' => $post->slug], ['class' => 'list-group-item']); ?>
        <?php endforeach; ?>
    </div>
</div><!-- /.sidebar -->