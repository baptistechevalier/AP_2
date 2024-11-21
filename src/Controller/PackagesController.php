<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Exception\NotFoundException;

/**
 * Packages Controller
 *
 * @property \App\Model\Table\PackagesTable $Packages
 * @method \App\Model\Entity\Package[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PackagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


     public function initialize(): void
    {
        parent::initialize();
    
    // Charger explicitement le modèle Users depuis le plugin CakeDC
        $this->loadModel('CakeDC/Users.Users');
    }

    public function index()
    {
        $packages = $this->paginate($this->Packages);

        $this->set(compact('packages'));
    }

    /**
     * View method
     *
     * @param string|null $id Package id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $package = $this->Packages->get($id, [
            'contain' => ['Purchases'],
        ]);

        $this->set(compact('package'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $package = $this->Packages->newEmptyEntity();
        if ($this->request->is('post')) {
            $package = $this->Packages->patchEntity($package, $this->request->getData());
            if ($this->Packages->save($package)) {
                $this->Flash->success(__('Le forfait est bien ajouté.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('L\'action n\'a pas abouti, merci de réessayer ultérieurement.'));
        }
        $this->set(compact('package'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Package id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $package = $this->Packages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $package = $this->Packages->patchEntity($package, $this->request->getData());
            if ($this->Packages->save($package)) {
                $this->Flash->success(__('Le forfai est sauvegardés.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('L\'action n\'a pas abouti, merci de réessayer ultérieurement'));
        }
        $this->set(compact('package'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Package id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $package = $this->Packages->get($id);
        if ($this->Packages->delete($package)) {
            $this->Flash->success(__('Le forfait est bien supprimé.'));
        } else {
            $this->Flash->error(__('L\'action n\'a pas abouti, merci de réessayer ultérieurement.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function liste()
    {
        $packages = $this->paginate($this->Packages);

        $this->set(compact('packages'));
    }
    
    //Fait avec Chat GPT
    public function acheter($id = null)
    {
        $package = $this->Packages->findById($id)->first();
        if (!$package) {
            throw new NotFoundException(__('Forfait introuvable'));
        }
        // Vérifie si l'utilisateur est connecté
        $user = $this->request->getSession()->read('Auth');
        if (!$user) {
            $this->Flash->error(__('Veuillez vous connecter pour acheter un forfait.'));
            //return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        // Enregistrement de l'achat
        if ($this->request->is('get')) {
            // Créer une entrée dans une table "purchases" ou similaire
            $purchasesTable = $this->getTableLocator()->get('purchases');
            $purchase = $purchasesTable->newEmptyEntity();
            $purchase->user_id = $user['id'];
            $purchase->package_id = $package->id;
            $purchase->purchase_date = date('Y-m-d H:i:s');

            if ($purchasesTable->save($purchase)) {
                $this->Flash->success(__('Forfait acheté avec succès !'));
                return $this->redirect(['action' => 'liste']);
            } else {
                $this->Flash->error(__('Erreur lors de l\'achat du forfait. Veuillez réessayer.'));
            }
        }

        $this->set(compact('package'));
    }
}
