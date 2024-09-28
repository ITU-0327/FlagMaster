<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enquiries Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Enquiry newEmptyEntity()
 * @method \App\Model\Entity\Enquiry newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Enquiry> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Enquiry findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Enquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Enquiry> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enquiry|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Enquiry saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Enquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Enquiry> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EnquiriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('enquiries');
        $this->setDisplayField('subject');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->scalar('subject')
            ->maxLength('subject', 255)
            ->requirePresence('subject', 'create')
            ->notEmptyString('subject', 'Subject is required.');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message', 'Message is required.');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
