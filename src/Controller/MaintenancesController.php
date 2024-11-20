<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Maintenances Controller
 *
 * @property \App\Model\Table\MaintenancesTable $Maintenances
 * @method \App\Model\Entity\Maintenance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaintenancesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Computers'],
        ];
        $maintenances = $this->paginate($this->Maintenances);

        $this->set(compact('maintenances'));
    }

    /**
     * View method
     *
     * @param string|null $id Maintenance id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maintenance = $this->Maintenances->get($id, [
            'contain' => ['Computers'],
        ]);

        $this->set(compact('maintenance'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maintenance = $this->Maintenances->newEmptyEntity();
        if ($this->request->is('post')) {
            $maintenance = $this->Maintenances->patchEntity($maintenance, $this->request->getData());
            if ($this->Maintenances->save($maintenance)) {
                $this->Flash->success(__('La date de maintencances est sauvegardés.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Réessaye.'));
        }
        $computers = $this->Maintenances->Computers->find('list', ['limit' => 200])->all();
        $this->set(compact('maintenance', 'computers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Maintenance id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maintenance = $this->Maintenances->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maintenance = $this->Maintenances->patchEntity($maintenance, $this->request->getData());
            if ($this->Maintenances->save($maintenance)) {
                $this->Flash->success(__('The maintenance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maintenance could not be saved. Please, try again.'));
        }
        $computers = $this->Maintenances->Computers->find('list', ['limit' => 200])->all();
        $this->set(compact('maintenance', 'computers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Maintenance id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maintenance = $this->Maintenances->get($id);
        if ($this->Maintenances->delete($maintenance)) {
            $this->Flash->success(__('The maintenance has been deleted.'));
        } else {
            $this->Flash->error(__('The maintenance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
