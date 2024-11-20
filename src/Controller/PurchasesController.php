<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\NotFoundException;

/**
 * Purchases Controller
 *
 * @property \App\Model\Table\PurchasesTable $Purchases
 * @method \App\Model\Entity\Purchase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PurchasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Packages'],
        ];
        $purchases = $this->paginate($this->Purchases);

        $this->set(compact('purchases'));
    }

    /**
     * View method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchase = $this->Purchases->get($id, [
            'contain' => ['Users', 'Packages'],
        ]);

        $this->set(compact('purchase'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $purchase = $this->Purchases->newEmptyEntity();
        if ($this->request->is('post')) {
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData());
            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $users = $this->Purchases->Users->find('list', ['limit' => 200])->all();
        $packages = $this->Purchases->Packages->find('list', ['limit' => 200])->all();
        $this->set(compact('purchase', 'users', 'packages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchase = $this->Purchases->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchase = $this->Purchases->patchEntity($purchase, $this->request->getData());
            if ($this->Purchases->save($purchase)) {
                $this->Flash->success(__('The purchase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase could not be saved. Please, try again.'));
        }
        $users = $this->Purchases->Users->find('list', ['limit' => 200])->all();
        $packages = $this->Purchases->Packages->find('list', ['limit' => 200])->all();
        $this->set(compact('purchase', 'users', 'packages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchase = $this->Purchases->get($id);
        if ($this->Purchases->delete($purchase)) {
            $this->Flash->success(__('The purchase has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function acheter($id){
        $user = $this->request->getAttribute('identity');

        if(!$user){
            return $this->redirect(['controller'=>'users','action'=>'login']);
        }
        
        $package = $this->Purchases -> Packages -> get($id);

        $reservation = $this->Purchases -> newEmptyEntity();
        $reservation -> user_id = $user->id;
        $reservation -> package_id = $package->id;
        $reservation->purchase_date = date('Y-m-d H:i:s');
        

        if ($this->Purchases -> save($reservation)){
            $this -> Flash -> success(__('La réservation est bien réalisé'));
        } else {
            $this -> Flash -> error(__('La réservation n\'a pas eu lieu'));
        }

        return $this->redirect(['controller' => 'Packages', 'action' => 'liste']);

    }
}
