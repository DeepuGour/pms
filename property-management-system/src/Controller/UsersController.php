<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class UsersController extends AppController{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('UserProfile');
       
    }
    
    public function beforeFilter(\Cake\Event\EventInterface $event){
    parent::beforeFilter($event);
    $this->Authentication->addUnauthenticatedActions(['login']);
    }
    //login page
    public function login(){
        $this->viewBuilder()->setLayout('register');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {

        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'users',
            'action' => 'dashBord',
        ]);
    
        return $this->redirect($redirect);
    }

    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid email or password'));
    }
    }

    // sign page
    public function register(){
        $this->viewBuilder()->setLayout('register');
        
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $checked = $this->request->getData('checked');
            if(!empty($checked)){
            $user = $this->Users->patchEntity($user,$this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                 return $this->redirect(['action' => 'login']);
            }else{

                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }else{
            $this->Flash->error(__('Please Select the Term and Condition')); 
        }
        }
        $this->set(compact('user'));
    }

    // admin dash board
    public function dashBord(){
        $this->viewBuilder()->setLayout('dashboard');
    }

    // admin table show 

    public function userProfiles(){
        $this->viewBuilder()->setLayout('dashboard');
        $users = $this->paginate($this->Users->find('all')->contain(['UserProfile'])->where(['user_type'=>'user','status'=>1]));
        // $this->Users->find('all')->contain('UserProfile');
        $this->set(compact('users'));

    }

    //logout button
    public function logout(){
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
    //delete button
    public function delete(){
       if($this->request->is('ajax')){
        $this->autoRender =false;
        $id = $this->request->getQuery('id');
        $user = $this->Users->get($id,[
            'contain'=>'UserProfile'
        ]);
        if($user){
            $data = array('id' => $id, 'status' => 2);
        }
        $user = $this->Users->patchEntity($user,$data);
       
        if($user = $this->Users->save($user,['modified' => false])){
          echo 1;
        }
        }
    }
    // public function delete($id = null){
    //     $this->request->allowMethod(['post', 'delete']);
    //     $user = $this->Users->get($id);
    //     $this->Users->UserProfile->deleteAll(array('user_id' => $id));
    //     if ($this->Users->delete($user)) {
    //         $this->Flash->success(__('The user has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'userProfiles']);
    // }

    //user active in active
    public function activeInactive($id = null){
        
        $this->autoRender = false;

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if(isset($user)){
            if($user->status == 1){
                $data = array('id' => $id, 'status' => 0);
            }else{
                $data = array('id' => $id, 'status' => 1);
            }
         
         $user = $this->Users->patchEntity($user,$data);
       
        if($user = $this->Users->save($user,['modified' => false])){
            return $this->redirect(['action' => 'userProfiles']);
        }
    }
}
    //admin active
    public function adminActiveInactive($id = null){
        
        $this->autoRender = false;

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if(isset($user)){
        if($user->user_type == 'user'){
            $data = array('id' => $id, 'user_type' =>'admin');
        }else{
            $data = array('id' => $id, 'user_type' =>'user');
        }
        $user = $this->Users->patchEntity($user,$data);
       
        if($user = $this->Users->save($user,['modified' => false])){
            return $this->redirect(['action' => 'userProfile']);
        }
        }
    }

    // profile show 

    public function adminProfile(){
        $admin = $this->Authentication->getIdentity();
        $this->viewBuilder()->setLayout('dashboard');
        $user = $this->Users->get($admin->id, [
            'contain' => ['UserProfile'],
        ]);

        $this->set(compact('user'));

    }
    // // user show 
    public function userView($id = null){
        $this->viewBuilder()->setLayout('dashboard');
     
        $user = $this->Users->get($id, [
            'contain' => ['UserProfile'],
        ]);

        $this->set(compact('user'));
    }


    // public function userView(){
    //     $id = $this->request->getQuery('id');
    //     if($id == null){
    //         $user=$this->Users->find('all');
    //     }else{
    //         $user=$this->Users->find('all')->where(['id'=>$id]);
    //     }
    //     $user = $this->Users->get($id, [
    //                 'contain' => ['UserProfile'],   // Ajax use //
    //             ]);
    //     $this->set(compact('user'));
    //     if($this->request->is('ajax')){
    //         $this->autoRender = false;
    //         $this->layout = false;
    //         $this->render('/element/flash/ajax_view');
    //     }
    // }
    
    // custom query 
    public function query(){
        $this->autoRender = false;
    $conn = ConnectionManager::get('default');
    $results = $conn->execute('SELECT * FROM users')->fetchAll('assoc');
    
    foreach ($results as $row) {
      echo $row['id'] . ': ' . $row['email'] . '<br>';
    }  
    }        
    public $paginate = [
        'limit' => 4
    ];


}



?>