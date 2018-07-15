<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Friendships Model
 *
 * @method \App\Model\Entity\Friendship get($primaryKey, $options = [])
 * @method \App\Model\Entity\Friendship newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Friendship[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Friendship|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Friendship|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Friendship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Friendship[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Friendship findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FriendshipsTable extends Table
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

        $this->setTable('friendships');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('user_from')
            ->requirePresence('user_from', 'create')
            ->notEmpty('user_from');

        $validator
            ->integer('user_to')
            ->requirePresence('user_to', 'create')
            ->notEmpty('user_to');

        $validator
            ->scalar('status')
            ->maxLength('status', 48)
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
