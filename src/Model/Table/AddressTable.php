<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Address Model
 *
 * @method \App\Model\Entity\Addres newEmptyEntity()
 * @method \App\Model\Entity\Addres newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Addres> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Addres get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Addres findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Addres patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Addres> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Addres|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Addres saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Addres>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Addres>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Addres>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Addres> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Addres>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Addres>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Addres>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Addres> deleteManyOrFail(iterable $entities, array $options = [])
 */
class AddressTable extends Table
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

        $this->setTable('address');
        $this->setDisplayField('street');
        $this->setPrimaryKey('id');
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
            ->scalar('street')
            ->maxLength('street', 255)
            ->requirePresence('street', 'create')
            ->notEmptyString('street');

        $validator
            ->scalar('city')
            ->maxLength('city', 100)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 100)
            ->requirePresence('state', 'create')
            ->notEmptyString('state');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 20)
            ->requirePresence('postal_code', 'create')
            ->notEmptyString('postal_code');

        $validator
            ->scalar('country')
            ->maxLength('country', 100)
            ->requirePresence('country', 'create')
            ->notEmptyString('country');

        $validator
            ->dateTime('created_at')
            ->allowEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }
}
