<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Maintenances Model
 *
 * @property \App\Model\Table\ComputersTable&\Cake\ORM\Association\BelongsTo $Computers
 *
 * @method \App\Model\Entity\Maintenance newEmptyEntity()
 * @method \App\Model\Entity\Maintenance newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Maintenance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Maintenance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Maintenance findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Maintenance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Maintenance[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Maintenance|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Maintenance saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Maintenance[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Maintenance[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Maintenance[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Maintenance[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MaintenancesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('maintenances');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Computers', [
            'foreignKey' => 'computer_id',
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
            ->dateTime('dates')
            ->requirePresence('dates', 'create')
            ->notEmptyDateTime('dates');

        $validator
            ->integer('computer_id')
            ->notEmptyString('computer_id');

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
        $rules->add($rules->existsIn('computer_id', 'Computers'), ['errorField' => 'computer_id']);

        return $rules;
    }
}
