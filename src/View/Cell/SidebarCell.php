<?php

namespace App\View\Cell;

use App\Model\Table\CategoriesTable;
use App\Model\Table\PostsTable;
use Cake\View\Cell;

/**
 * Class SidebarCell
 * @package App\View\Cell
 * @property CategoriesTable Categories
 * @property PostsTable Posts
 */
class SidebarCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     * @return void
     */
    public function display()
    {
        $this->loadModel('Categories');
        $this->loadModel('Posts');
        $categories = $this->Categories->find();
        $posts = $this->Posts->find()->order(['id' => 'desc'])->limit(5);
        $this->set(compact('categories', 'posts'));
    }
}
