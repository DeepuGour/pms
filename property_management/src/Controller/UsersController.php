<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    // initialize Model
    public function initialize(): void
    {
        parent::initialize();

       $this->loadModel('UserProfile'); //add table User table
       $this->loadModel('Properties'); //add table Property table
       $this->loadModel('PropertyComments'); // add table Property Comments
        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
// ================================================login authentication========================================================================//

    //before fillter use
    public function beforeFilter(\Cake\Event\EventInterface $event){
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login']);
    }

    // login authetication 
    public function login(){
        $this->viewBuilder()->setLayout('login');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $user = $this->Authentication->getIdentity();
            // redirect to /articles after login success
            if($user->user_type == 'user' && $user->status == 1){
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'userShow',
            ]);

            return $this->redirect($redirect);
            }else if($user->user_type == 'admin' && $user->status == 1){
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'adminPanel',
                ]);
        
                return $this->redirect($redirect);
            }else{
                $this->Flash->error(__('Your Account is Block'));
                $result = $this->Authentication->getResult();
            
             // regardless of POST or GET, redirect if user is logged in
            if ($result->isValid()) {
                $this->Authentication->logout();
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            }
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        
        }
    }

     //logout page
     public function logout(){
     $result = $this->Authentication->getResult();
     // regardless of POST or GET, redirect if user is logged in
     if ($result->isValid()) {
         $this->Authentication->logout();
         return $this->redirect(['controller' => 'Users', 'action' => 'login']);
     }
     }

    // fronted page

    public function home(){
        $this->viewBuilder()->setLayout('home');
    }
 /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

   

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
// ================================================User profile work========================================================================//

    public function userAdd()
    {
        $this->viewBuilder()->setLayout('register');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user,$this->request->getData());
            $image = $this->request->getData('image_file');
            $image_name = $image->getClientFilename();
            $path = WWW_ROOT.'uploade'.DS.$image_name;
            if($image_name){
                $image->moveTo($path);
            }
            $user->image = $image_name;
           
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view($id = null){
        $user = $this->Users->get($id, [
            'contain' => ['UserProfile'],
        ]);

        $this->set(compact('user'));
    }

    //delete user
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->Users->UserProfile->deleteAll(array('user_id' => $id));
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'userProfile']);
    }

    //user profile show
    public function userShow(){
        $this->viewBuilder()->setLayout('usershow');
        $user = $this->Authentication->getIdentity();
        $post = $this->Users->get($user->id, [
            'contain' => ['UserProfile'],
        ]);
        $properties = $this->paginate($this->Properties);
        $this->set(compact('post','properties'));
    }

    // user active 
    public function active($id = null){
        
                $this->autoRender = false;

                $user = $this->Users->get($id, [
                    'contain' => [],
                ]);
                if(isset($user)){
                $data = array('id' => $id, 'status' => 1);
                $user = $this->Users->patchEntity($user,$data);
               
                if($user = $this->Users->save($user,['modified' => false])){
                    return $this->redirect(['action' => 'userProfile']);
                }
            }
     }

     //user inactive
     public function inactive($id = null){
        
        $this->autoRender = false;

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if(isset($user)){
        $data = array('id' => $id, 'status' => 0);
        $user = $this->Users->patchEntity($user,$data);
       
        if($user = $this->Users->save($user,['modified' => false])){
            return $this->redirect(['action' => 'userProfile']);
        }
        }
    }

    //user admin set
    public function adminActive($id = null){
        
        $this->autoRender = false;

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if(isset($user)){
        $data = array('id' => $id, 'user_type' =>'admin');
        $user = $this->Users->patchEntity($user,$data);
       
        if($user = $this->Users->save($user,['modified' => false])){
            return $this->redirect(['action' => 'userProfile']);
        }
        }
    }

    //block
    public function userActive($id = null){
        $this->autoRender = false;

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if(isset($user)){
        $data = array('id' => $id, 'user_type' =>'user');
        $user = $this->Users->patchEntity($user,$data);
       
        if($user = $this->Users->save($user,['modified' => false])){
            return $this->redirect(['action' => 'userProfile']);
        }
        }
    }
    // user edit block
        public function edit($id = null){   
      
        $user = $this->Users->get($id, [
            'contain' => ['UserProfile'],
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('update successfully'));
                return $this->redirect(['action' => 'userShow']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    // ================================================admin work ========================================================================//
     //admin panel show
     public function adminPanel(){
        $user = $this->Authentication->getIdentity();
        $post = $this->Users->get($user->id, [
            'contain' => ['UserProfile'],
        ]);
        $this->set(compact('post'));
    }
    //user profile show in admin
    public function userProfile(){
        $users = $this->paginate($this->Users,['contain'=>['UserProfile']]);
        $this->set(compact('users'));
    }
    // property show in admin
    public function  showProperty(){
        $properties = $this->paginate($this->Properties);
        $this->set(compact('properties'));
    }

    //first template set
    public function homeProperties(){
        $properties = $this->paginate($this->Properties);
        $this->set(compact('properties'));
    }
    public $paginate = [
        'limit' => 3
    ];
}

