<?php

namespace App\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Exception;

/**
 * Articles Model
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior=
 */
class UsersTable extends AppTable
{
    public const TABLE = 'users';

    /**
    * Initialize method
    *
    * @param array $config The configuration for the Table.
    * @return void
    */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setDisplayField('name');
        $this->setPrimaryKey('id');


        $this->hasMany('Times', [
                'className' => 'Times',
            ])
            ->setForeignKey('user_id')
            ->setSort([
                'updated_at' => 'ASC'
            ])
            ->setProperty('times')
            ->setBindingKey('id');
    }

    /**
    * Default validation rules.
    *
    * @param \Cake\Validation\Validator $validator Validator instance.
    * @return \Cake\Validation\Validator
    */
    public function validationDefault(Validator $validator): Validator
    {
        $validator->setProvider("custom", "App\Model\Validation\CustomValidation");

        $validator
            ->integer('id')
            ->notEmptyString('id');

        $validator
            ->requirePresence('name', 'create') // フィールドの存在確認
            ->notEmptyString('name', "物件名は必ず入力してください")
            ->add('name', [
                'len' => [
                    'rule' => ['maxLength', 128],
                    'message' => $this->validationText("char_limit", 128),
                ],
            ]);

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
        // $rules->add($rules->existsIn(['shop_id'], 'Shops'));
        // $rules->add($rules->existsIn(['staff_id'], 'Staffs'));
        // $rules->add($rules->existsIn(['admins_id'], 'Admins'));

        return $rules;
    }
}
