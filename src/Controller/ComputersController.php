<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Computers Controller
 *
 * @property \App\Model\Table\ComputersTable $Computers
 * @method \App\Model\Entity\Computer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComputersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $computers = $this->paginate($this->Computers);

        $this->set(compact('computers'));
    }

    /**
     * View method
     *
     * @param string|null $id Computer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $computer = $this->Computers->get($id, [
            'contain' => ['Games', 'Maintenances'],
        ]);

        $this->set(compact('computer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $computer = $this->Computers->newEmptyEntity();
        if ($this->request->is('post')) {
            $computer = $this->Computers->patchEntity($computer, $this->request->getData());
            if ($this->Computers->save($computer)) {
                $this->Flash->success(__('L\'ordinateur a bien été ajouté.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('L\'action n\'a pas abouti, merci de réessayer ultérieurement.'));
        }
        $games = $this->Computers->Games->find('list', ['limit' => 200])->all();
        $this->set(compact('computer', 'games'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Computer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $computer = $this->Computers->get($id, [
            'contain' => ['Games'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $computer = $this->Computers->patchEntity($computer, $this->request->getData());
            if ($this->Computers->save($computer)) {
                $this->Flash->success(__('Modifications sauvegardées.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('L\'action n\'a pas abouti, merci de réessayer ultérieurement.'));
        }
        $games = $this->Computers->Games->find('list', ['limit' => 200])->all();
        $this->set(compact('computer', 'games'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Computer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $computer = $this->Computers->get($id);
        if ($this->Computers->delete($computer)) {
            $this->Flash->success(__('Ordinateur supprimé.'));
        } else {
            $this->Flash->error(__('L\'action n\'a pas abouti, merci de réessayer ultérieurement.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
