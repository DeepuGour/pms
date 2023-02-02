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

   

    // ================================================Property work========================================================================//

    // property add 
    public function propertyAdd(){
        $user = $this->Authentication->getIdentity();
        if($user->user_type == 'admin'){//check admin
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            $image = $this->request->getData('image_file');
            $image_name = $image->getClientFilename();
            $path = WWW_ROOT.'property'.DS.$image_name;
            if($image_name){
                $image->moveTo($path);
            }
            $property->image = $image_name;
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'showProperty',
                ]);
        
                return $this->redirect($redirect);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $this->set(compact('property','user'));
    }
    }

    // property show
    public function propertyShow($id = null){
        $property = $this->Properties->get($id, [
            'contain' => ['PropertyComments'],
        ]);
      $this->set(compact('property'));

    }
         //property edit 
    public function propertyEdit($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());

                    $image_file = $this->request->getData("image_file");
                    $fileName = $image_file->getClientFilename();

                    if ($fileName == '') {
                        
                    }else{
                        $property->image = $fileName;
                        
                    }
                    
                    
                   
                if ($this->Properties->save($property)) {
                    $path = WWW_ROOT.'property'.DS.$fileName;
                    $image_file->moveTo($path);
            
                $this->Flash->success(__('update successfully'));

                return $this->redirect(['action' => 'showProperty']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $users = $this->Properties->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('property', 'users'));
    }

    //property show 
    public function propertyView($id = null){
        $property = $this->Properties->get($id, [
            'contain' => ['Users', 'PropertyComments'],
        ]);

        $this->set(compact('property'));
    }

    //proprty delete
    public function propertyDelete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        $this->PropertyComments->deleteAll(array('property_id' => $id));
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'showProperty']);
    }

    //property active 
    public function propertyActive($id = null){
        $this->autoRender = false;

        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        if(isset($property)){
        $data = array('id' => $id, 'status' => 1);
        $property = $this->Properties->patchEntity($property,$data);
       
        if($property = $this->Properties->save($property ,['modified' => false])){
            return $this->redirect(['action' => 'showProperty']);
        }
    }

    }

    //property inactive
    public function propertyInactive($id = null){
        $this->autoRender = false;

        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        if(isset($property)){
        $data = array('id' => $id, 'status' => 0);
        $property = $this->Properties->patchEntity($property,$data);
       
        if($property = $this->Properties->save($property ,['modified' => false])){
            return $this->redirect(['action' => 'showProperty']);
        }
    }

    }


// ================================================Property Comment work========================================================================//
    // propertyComment

    public function propertyComment($id=null){
         $user = $this->Authentication->getIdentity();
          $user_id = $user->id;
          $post = $this->Users->get($user->id, [
            'contain' => ['UserProfile'],
        ]);
        $user_name = $post->user_profile->first_name;
         $comment = $this->PropertyComments->newEmptyEntity();
         if($this->request->is('post')){
            $data['property_id'] = $id;
            $data['user_id'] = $user_id;
            $data['user_name'] = $user_name;
            $data['comments'] = $this->request->getData('comment');
            $comment = $this->PropertyComments->patchEntity($comment, $data);
            if($this->PropertyComments->save($comment)){
                $this->Flash->success(__('The property has been saved.'));

                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'propertyShow/'.$id,
                ]);
        
                return $this->redirect($redirect);
            }else{
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'propertyShow/'.$id,
                ]);
        
                return $this->redirect($redirect);
            }
         }

        

    }

   
// pagination set
    public $paginate = [
        'limit' => 3
    ];
}
