<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController
{
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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
   
    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
 


     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
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


    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
       //property edit 
       public function propertyEdit($id = null)
       {
           $property = $this->Properties->get($id, [
               'contain' => [],
           ]);
           $image = $property->image;
           
           if ($this->request->is(['patch', 'post', 'put'])) {
               $data = $this->request->getData();
               
               $image_file = $this->request->getData("image_file");
               $fileName = $image_file->getClientFilename();
               
               if ($fileName == '') {
                   $data['image'] = $image; 
               }else{
                   $data['image'] = $fileName;
                   
               }
               $property = $this->Properties->patchEntity($property,$data);
                    if ($this->Properties->save($property)) {
                       $hasFileError = $image_file->getError();
                   if ($hasFileError > 0) {
                       $data["image"] = "";
                   } else {
                       $fileType = $image_file->getClientMediaType();
   
                       if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                           $imagePath = WWW_ROOT . "property/" . $fileName;
                           $image_file->moveTo($imagePath);
                           $data["image"] = $fileName;
                       }
                   }
               
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

        return $this->redirect(['controller'=>'Users','action' => 'showProperty']);
    }

    //proprty Active
    public function propertyActive($id = null){
        $this->autoRender = false;

        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        if(isset($property)){
        $data = array('id' => $id, 'status' => 1);
        $property = $this->Properties->patchEntity($property,$data);
       
        if($property = $this->Properties->save($property ,['modified' => false])){
            return $this->redirect(['controller'=>'Users','action' => 'showProperty']);
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
            return $this->redirect(['controller'=>'Users','action' => 'showProperty']);
        }
    }

    }
    //property active
    public function propertyShow($id = null){
        $property = $this->Properties->get($id, [
            'contain' => ['PropertyComments'],
        ]);
      $this->set(compact('property'));

    }
    public $paginate = [
        'limit' => 3
    ];

    }