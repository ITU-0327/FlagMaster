<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 *
 * @method \App\Model\Entity\Profile newEmptyEntity()
 * @method \App\Model\Entity\Profile newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Profile> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profile get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Profile findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Profile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Profile> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profile|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Profile saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Profile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Profile>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Profile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Profile> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Profile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Profile>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Profile>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Profile> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ProfilesTable extends Table
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

        $this->setTable('profiles');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
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
            ->integer('address_id')
            ->allowEmptyString('address_id');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 50)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('profile_picture')
            ->maxLength('profile_picture', 255)
            ->allowEmptyFile('profile_picture');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->allowEmptyString('phone');

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
        $rules->add($rules->existsIn(['address_id'], 'Addresses'), ['errorField' => 'address_id']);

        return $rules;
    }
}
