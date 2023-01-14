<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\ORM\RulesChecker;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Exception;
use Cake\Core\Configure;

class TimesTable extends AppTable
{
    public const TABLE = 'times';

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'id',
            'joinType' => 'INNER'       
        ]);
    }

    public function register($post)
    {
        $entity = $this->newEntity($post);
        if ($this->save($entity)) {} 
    }

    public function update($entity, $post)
    {
        //引数をでentityを先にしないとエラー
        $entity = $this->patchEntity($entity, $post);
        if ($this->save($entity)) {} 
    }

    public function deleteRecord($entity)
    {
        if ($this->delete($entity)) {}
    }

    // public function searchCategory($id,$category){
    //     return $this->find()       
    //         ->where(['user_id' => $id])
    //         ->where(['category Like ' => $category])
    //         ->first();
    // }

    //バリデーション
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('category')
            ->maxLength('category', 255)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->dateTime('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyDateTime('start_time');

        $validator
            ->dateTime('finish_time')
            ->allowEmptyDateTime('finish_time');

        $validator
            ->integer('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
