<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Delivery Model
 *
 * @property \App\Model\Table\OrderTable&\Cake\ORM\Association\BelongsTo $Order
 * @property \App\Model\Table\AddressTable&\Cake\ORM\Association\BelongsTo $Address
 *
 * @method \App\Model\Entity\Delivery newEmptyEntity()
 * @method \App\Model\Entity\Delivery newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Delivery> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Delivery get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Delivery findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Delivery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Delivery> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Delivery|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Delivery saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Delivery>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Delivery>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Delivery>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Delivery> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Delivery>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Delivery>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Delivery>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Delivery> deleteManyOrFail(iterable $entities, array $options = [])
 */
class DeliveryTable extends Table
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

        $this->setTable('delivery');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Order', [
            'foreignKey' => 'order_id',
        ]);
        $this->belongsTo('Address', [
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
            ->integer('order_id')
            ->allowEmptyString('order_id');

        $validator
            ->integer('address_id')
            ->allowEmptyString('address_id');

        $validator
            ->scalar('delivery_status')
            ->allowEmptyString('delivery_status');

        $validator
            ->date('estimated_delivery_date')
            ->allowEmptyDate('estimated_delivery_date');

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
        $rules->add($rules->existsIn(['order_id'], 'Order'), ['errorField' => 'order_id']);
        $rules->add($rules->existsIn(['address_id'], 'Address'), ['errorField' => 'address_id']);

        return $rules;
    }
}
