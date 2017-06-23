<?php

namespace App\Model\Table;

use App\Model\Entity\Comment;
use Cake\Datasource\EntityInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comments Model
 *
 * @property BelongsTo $Posts
 *
 * @method Comment get($primaryKey, $options = [])
 * @method Comment newEntity($data = null, array $options = [])
 * @method Comment[] newEntities(array $data, array $options = [])
 * @method Comment|bool save(EntityInterface $entity, $options = [])
 * @method Comment patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Comment[] patchEntities($entities, array $data, array $options = [])
 * @method Comment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin TimestampBehavior
 */
class CommentsTable extends Table
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

        $this->setTable('comments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('username')
            ->notEmpty('username');

        $validator
            ->requirePresence('mail')
            ->add('mail', 'validFormat', [
                'rule' => 'email',
                'message' => 'E-mail must be valid'
            ])
            ->notEmpty('mail');

        $validator
            ->requirePresence('content')
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
        $rules->add($rules->existsIn(['post_id'], 'Posts'));

        return $rules;
    }
}
