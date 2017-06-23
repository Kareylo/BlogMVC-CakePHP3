<?php

namespace App\Model\Table;

use App\Model\Entity\Post;
use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\CounterCacheBehavior;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property BelongsTo $Categories
 * @property BelongsTo $Users
 * @property HasMany $Comments
 *
 * @method Post get($primaryKey, $options = [])
 * @method Post newEntity($data = null, array $options = [])
 * @method Post[] newEntities(array $data, array $options = [])
 * @method Post|bool save(EntityInterface $entity, $options = [])
 * @method Post patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Post[] patchEntities($entities, array $data, array $options = [])
 * @method Post findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin TimestampBehavior
 * @mixin CounterCacheBehavior
 */
class PostsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('posts');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', ['Categories' => ['post_count']]);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'post_id'
        ]);
    }

    /**
     * beforeSave method
     * @param Event $event beforeEvent Event
     * @param EntityInterface $entity Given entity
     * @param ArrayObject $options options
     * @return void
     */
    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        if (!$entity->get('slug') && $entity->get('name')) {
            $entity->set('slug', strtolower(Text::slug($entity->get('name'))));
        } else {
            $entity->set('slug', strtolower(Text::slug($entity->get('slug'))));
        }
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
