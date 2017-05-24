<div class="col-md-8">


    <div class="page-header">
        <h1><?= $post->name; ?></h1>
        <p>
            <small>
                Category : <?= $this->Html->link($post->category->name, ['controller' => 'Posts', 'action' => 'category', 'slug' => $post->category->slug]) ?>,
                by <?= $this->Html->link($post->user->username, ['controller' => 'Posts', 'action' => 'author', 'id' => $post->user->id]) ?> on <em><?= $post->created->format('F jS Y, H:i') ?></em>
            </small>
        </p>
    </div>

    <article>
        <?= $this->Markdown->parse($post->content); ?>
    </article>

    <hr>

    <section class="comments">

        <h3>Comment this post</h3>

        <?= $this->Form->create($comment); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $this->Form->control('mail', ['class' => 'form-control', 'placeholder' => 'Your email', 'label' => false]) ?>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Your username', 'label' => false]) ?>
                </div>
            </div>
            <?= $this->Form->control('post_id', ['type' => 'hidden', 'value' => $post->id]) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->control('content', ['class' => 'form-control', 'placeholder' => 'Your comment', 'label' => false]) ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <?= $this->Form->end(); ?>

        <?php if ($post->comments): ?>
            <h3><?= count($post->comments) ?> Commentaires</h3>
            <?php foreach ($post->comments as $comment): ?>
                <div class="row">
                    <div class="col-md-2">
                        <img src="http://lorempicsum.com/futurama/100/100/<?= mt_rand(1, 9) ?>" width="100%">
                    </div>
                    <div class="col-md-10">
                        <p><strong><?= $comment->username ?></strong> <?= $comment->created->timeAgoInWords() ?></p>
                        <p><?= $this->Markdown->parse($comment->content) ?></p>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>


</div>
