<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomFlagEnquiries Model
 *
 * @property \App\Model\Table\EnquiriesTable&\Cake\ORM\Association\BelongsTo $Enquiries
 *
 * @method \App\Model\Entity\CustomFlagEnquiry newEmptyEntity()
 * @method \App\Model\Entity\CustomFlagEnquiry newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CustomFlagEnquiry> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CustomFlagEnquiry get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CustomFlagEnquiry findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CustomFlagEnquiry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CustomFlagEnquiry> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CustomFlagEnquiry|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CustomFlagEnquiry saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CustomFlagEnquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CustomFlagEnquiry>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CustomFlagEnquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CustomFlagEnquiry> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CustomFlagEnquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CustomFlagEnquiry>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CustomFlagEnquiry>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CustomFlagEnquiry> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CustomFlagEnquiriesTable extends Table
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

        $this->setTable('custom_flag_enquiries');
        $this->setDisplayField('flag_size');
        $this->setPrimaryKey('id');

        $this->belongsTo('Enquiries', [
            'foreignKey' => 'enquiry_id',
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
            ->integer('enquiry_id')
            ->notEmptyString('enquiry_id');

        $validator
            ->scalar('flag_size')
            ->maxLength('flag_size', 50)
            ->requirePresence('flag_size', 'create')
            ->notEmptyString('flag_size');

        $validator
            ->scalar('flag_color')
            ->maxLength('flag_color', 50)
            ->requirePresence('flag_color', 'create')
            ->notEmptyString('flag_color');

        $validator
            ->scalar('attachment_url')
            ->maxLength('attachment_url', 255)
            ->allowEmptyString('attachment_url');

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
        $rules->add($rules->existsIn(['enquiry_id'], 'Enquiries'), ['errorField' => 'enquiry_id']);

        return $rules;
    }
}
