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
            ->maxLength('username', 50, 'Username cannot exceed 50 characters.')
            ->allowEmptyString('username');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'This email is already in use',
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 255, 'Password cannot exceed 255 characters.')
            ->requirePresence('password', function ($context) {
                // Require password if it's a new record and oauth_provider is empty
                return $context['newRecord'] && empty($context['data']['oauth_provider']);
            }, 'Password is required.')
            ->notEmptyString('password', 'Password is required.', function ($context) {
                // Require password to be non-empty if it's a new record and oauth_provider is empty
                return $context['newRecord'] && empty($context['data']['oauth_provider']);
            })
            ->add('password', 'minLength', [
                'rule' => ['minLength', 8],
                'message' => 'Password must be at least 8 characters long.',
            ])
            // At Least One Number
            ->add('password', 'numeric', [
                'rule' => function ($value, $context) {
                    return (bool)preg_match('/\d/', $value);
                },
                'message' => 'Password must contain at least one number.',
            ])
            // At Least One Special Character
            ->add('password', 'specialChar', [
                'rule' => function ($value, $context) {
                    return (bool)preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value);
                },
                'message' => 'Password must contain at least one special character.',
            ])
            // At Least One Uppercase Letter
            ->add('password', 'uppercase', [
                'rule' => function ($value, $context) {
                    return (bool)preg_match('/[A-Z]/', $value);
                },
                'message' => 'Password must contain at least one uppercase letter.',
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
                    if (!$userId) {
                        return false;
                    }
                    $user = $this->get($userId);

                    return (new DefaultPasswordHasher())->check($value, $user->password);
                },
                'message' => 'Current password is incorrect',
            ])
            ->requirePresence('current_password', function ($context) {
                // Require current_password only if the user has a password set and is changing it
                $userId = $context['data']['id'];
                if (!$userId) {
                    return false;
                }
                $user = $this->get($userId);

                return !empty($user->password) && !empty($context['data']['new_password']);
            })
            ->notEmptyString('current_password', 'Please enter your current password.', function ($context) {
                // Only enforce non-empty current_password if the user has an existing password
                $userId = $context['data']['id'];
                if (!$userId) {
                    return false;
                }
                $user = $this->get($userId);

                return !empty($user->password);
            });

        $validator
            ->requirePresence('new_password', function ($context) {
                return !empty($context['data']['current_password']);
            })
            ->notEmptyString('new_password', 'Please enter a new password')
            ->add('new_password', 'minLength', [
                'rule' => ['minLength', 8],
                'message' => 'New password must be at least 8 characters long.',
            ])
            // At Least One Number
            ->add('new_password', 'numeric', [
                'rule' => function ($value, $context) {
                    return (bool)preg_match('/\d/', $value);
                },
                'message' => 'New password must contain at least one number.',
            ])
            // At Least One Special Character
            ->add('new_password', 'specialChar', [
                'rule' => function ($value, $context) {
                    return (bool)preg_match('/[!@#$%^&*(),.?":{}|<>]/', $value);
                },
                'message' => 'New password must contain at least one special character.',
            ])
            // At Least One Uppercase Letter
            ->add('new_password', 'uppercase', [
                'rule' => function ($value, $context) {
                    return (bool)preg_match('/[A-Z]/', $value);
                },
                'message' => 'New password must contain at least one uppercase letter.',
            ]);

        $validator
            ->add('confirm_password', 'compareWith', [
                'rule' => ['compareWith', 'new_password'],
                'message' => 'Passwords do not match',
            ])
            ->requirePresence('confirm_password', function ($context) {
                return !empty($context['data']['new_password']);
            })
            ->notEmptyString('confirm_password', 'Please confirm your new password');

        return $validator;
    }
}
