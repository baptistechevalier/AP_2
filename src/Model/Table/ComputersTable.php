<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Computers Model
 *
 * @property \App\Model\Table\MaintenancesTable&\Cake\ORM\Association\HasMany $Maintenances
 * @property \App\Model\Table\GamesTable&\Cake\ORM\Association\BelongsToMany $Games
 *
 * @method \App\Model\Entity\Computer newEmptyEntity()
 * @method \App\Model\Entity\Computer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Computer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Computer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Computer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Computer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Computer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Computer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Computer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Computer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Computer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Computer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Computer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ComputersTable extends Table
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

        $this->setTable('computers');
        $this->setDisplayField('processeur');
        $this->setPrimaryKey('id');

        $this->hasMany('Maintenances', [
            'foreignKey' => 'computer_id',
        ]);
        $this->belongsToMany('Games', [
            'foreignKey' => 'computer_id',
            'targetForeignKey' => 'game_id',
            'joinTable' => 'computers_games',
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
            ->scalar('processeur')
            ->maxLength('processeur', 100)
            ->requirePresence('processeur', 'create')
            ->notEmptyString('processeur');

        $validator
            ->scalar('os')
            ->maxLength('os', 50)
            ->requirePresence('os', 'create')
            ->notEmptyString('os');

        $validator
            ->scalar('ram')
            ->maxLength('ram', 20)
            ->requirePresence('ram', 'create')
            ->notEmptyString('ram');

        $validator
            ->scalar('gpu')
            ->maxLength('gpu', 50)
            ->requirePresence('gpu', 'create')
            ->notEmptyString('gpu');

        $validator
            ->scalar('stockage')
            ->maxLength('stockage', 20)
            ->requirePresence('stockage', 'create')
            ->notEmptyString('stockage');

        $validator
            ->scalar('alim')
            ->maxLength('alim', 50)
            ->requirePresence('alim', 'create')
            ->notEmptyString('alim');

        $validator
            ->boolean('disponiblie')
            ->requirePresence('disponiblie', 'create')
            ->notEmptyString('disponiblie');

        return $validator;
    }
}
