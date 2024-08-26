<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Review Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProductTable&\Cake\ORM\Association\BelongsTo $Product
 *
 * @method \App\Model\Entity\Review newEmptyEntity()
 * @method \App\Model\Entity\Review newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Review> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Review get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Review findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Review patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Review> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Review|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Review saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Review>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Review>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Review>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Review> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Review>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Review>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Review>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Review> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ReviewTable extends Table
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

        $this->setTable('review');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Product', [
            'foreignKey' => 'product_id',
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
            ->integer('product_id')
            ->allowEmptyString('product_id');

        $validator
            ->integer('rating')
            ->allowEmptyString('rating');

        $validator
            ->scalar('comment')
            ->allowEmptyString('comment');

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
        $rules->add($rules->existsIn(['product_id'], 'Product'), ['errorField' => 'product_id']);

        return $rules;
    }
}
