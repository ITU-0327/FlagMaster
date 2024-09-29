<?php
declare(strict_types=1);

namespace App\Model\Table;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\EnquiriesTable&\Cake\ORM\Association\HasMany $Enquiries
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\ProfilesTable&\Cake\ORM\Association\HasMany $Profiles
 * @property \App\Model\Table\ReviewsTable&\Cake\ORM\Association\HasMany $Reviews
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');

        $this->hasMany('Enquiries', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasOne('Profiles', [
            'foreignKey' => 'user_id',
            'dependent' => true,
            'cascadeCallbacks' => true,
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'user_id',
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
            ->scalar('username')
            ->maxLength('username', 50)
            ->allowEmptyString('username');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'This email is already in use.']);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->notEmptyString('password', 'A password is required.')
            ->add('password', 'strength', [
                'rule' => function ($value, $context) {
                    // Check for minimum length
                    if (strlen($value) < 8) {
                        return false;
                    }
                    // Check for at least one number
                    if (!preg_match('/\d/', $value)) {
                        return false;
                    }
                    // Check for at least one symbol
                    if (!preg_match('/[\W]/', $value)) {
                        return false;
                    }

                    return true;
                },
                'message' => 'Password must be at least 8 characters long and contain at least one number and one symbol.',
            ]);
        $validator
            ->scalar('role')
            ->allowEmptyString('role');

        $validator
            ->scalar('oauth_provider')
            ->allowEmptyString('oauth_provider');

        $validator
            ->scalar('oauth_id')
            ->maxLength('oauth_id', 255)
            ->allowEmptyString('oauth_id');

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
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['oauth_provider', 'oauth_id'], ['allowMultipleNulls' => true]), ['errorField' => 'oauth_provider']);

        return $rules;
    }

    /**
     * Custom finder for authentication without associations.
     *
     * @param \Cake\ORM\Query $query The query to modify
     * @param array $options The options for the finder
     * @return \Cake\ORM\Query The modified query
     */
    public function findAuth(Query $query, array $options): Query
    {
        return $query->select(['id', 'email', 'password', 'role']);
    }

    /**
     * Custom finder for authentication with associations.
     *
     * @param \Cake\Validation\Validator $validator
     * @return \Cake\Validation\Validator The modified query
     */
    public function validationPassword(Validator $validator): Validator
    {
        $validator
            ->add('current_password', 'custom', [
                'rule' => function ($value, $context) {
                    $userId = $context['data']['id'];
                    $user = $this->get($userId);
                    if ((new DefaultPasswordHasher())->check($value, $user->password)) {
                        return true;
                    }

                    return false;
                },
                'message' => 'Current password is incorrect',
            ])
            ->requirePresence('current_password', function ($context) {
                return !empty($context['data']['new_password']);
            })
            ->notEmptyString('current_password');

        $validator
            ->requirePresence('new_password', function ($context) {
                return !empty($context['data']['current_password']);
            })
            ->notEmptyString('new_password')
            ->minLength('new_password', 6, 'Password must be at least 6 characters long');

        $validator
            ->add('confirm_password', 'compareWith', [
                'rule' => ['compareWith', 'new_password'],
                'message' => 'Passwords do not match',
            ])
            ->requirePresence('confirm_password', function ($context) {
                return !empty($context['data']['new_password']);
            })
            ->notEmptyString('confirm_password');

        return $validator;
    }
}
