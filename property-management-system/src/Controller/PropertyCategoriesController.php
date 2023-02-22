<?php
namespace App\Controller;
use App\Controller\AppController;

class PropertyCategoriesController extends AppController{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('UserProfile');
        $this->loadModel('PropertyComments');
        $this->loadModel('Properties');
        
       
    }

    // categoryAdd 
    public function categoryAdd(){
        $this->viewBuilder()->setLayout('dashboard');
        $user = $this->Authentication->getIdentity();
        if($user->user_type == 'admin'){//check admin
        $category = $this->PropertyCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->PropertyCategories->patchEntity($category, $this->request->getData());
            if ($this->PropertyCategories->save($category)) {
                
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'properties',
                    'action' => 'propertiesShow',
                ]);
                
                return $this->redirect($redirect);
                $this->Flash->success(__('The category has been saved.'));
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category','user'));
    }
    }

    // ajax get data 
    public function getProperty(){
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $id = $this->request->getQuery('id');
            $category = $this->PropertyCategories->get($id, [
                'contain' => [],
            ]);
            $property_num = $this->Properties->find()->where(['AND'=>['category_name'=>$category->category_name,'status'=>1]])->count();
            echo $property_num;
        }
    }

    //soft delete
    public function delete(){
        $this->autoRender = false;
        $id = $this->request->getQuery('id');
        $category = $this->PropertyCategories->get($id, [
            'contain' => ['Properties'],
        ]);
        if($category){
            $data = array('id' => $id, 'status' => 2);
            $category = $this->PropertyCategories->patchEntity($category,$data);
            if($this->PropertyCategories->save($category,['modified' => false])){
                $property = $this->Properties->find('all')->where(['category_name'=>$category->category_name])->all();
                foreach($property as $property){
                    $property->status = 2;
                    $this->Properties->save($property);
                }
                
               echo 1;
            }
         
        }
    }

    // Inactive Property and category 

    public function activeInactive(){
        
    }


}

?>