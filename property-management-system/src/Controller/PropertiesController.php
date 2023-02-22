<?php
namespace App\Controller;
use App\Controller\AppController;

class PropertiesController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('UserProfile');
        $this->loadModel('PropertyComments');
        $this->loadModel('PropertyCategories');
        
       
    }

    // property add 
    public function propertyAdd(){
        $user = $this->Authentication->getIdentity();
        $this->viewBuilder()->setLayout('dashboard');
        if($user->user_type == 'admin'){//check admin
        $property = $this->Properties->newEmptyEntity();
        $categories = $this->PropertyCategories->find('all')->toArray();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            $image = $this->request->getData('property_image');
            $image_name = $image->getClientFilename();
            $path = WWW_ROOT.'property'.DS.$image_name;
            if($image_name){
                $image->moveTo($path);
            }
            $property->image = $image_name;
            if ($this->Properties->save($property)) {
                
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'properties',
                    'action' => 'propertiesShow',
                ]);
                
                return $this->redirect($redirect);
                $this->Flash->success(__('The property has been saved.'));
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $this->set(compact(['property','user','categories']));
    }
    }

    //properties show
    public function propertiesShow(){
        $this->viewBuilder()->setLayout('dashboard');
        $properties = $this->paginate($this->Properties->find('all')->where(['status'=>1]));
        $categories = $this->paginate($this->PropertyCategories->find('all')->where(['status'=>1]));
        // dd($categories); 
        $user = $this->Authentication->getIdentity();
        $user_details = $this->Users->get($user->id, [
            'contain' => ['UserProfile'],
        ]);
        $this->set(compact('properties','user_details','categories'));
    }
     //proprty Active
     public function propertyActiveInactive($id = null){
        $this->autoRender = false;

        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        if(isset($property)){
            if($property->status == 1){
                $data = array('id' => $id, 'status' => 0);
            }else {

                $data = array('id' => $id, 'status' => 1);
            }
        $property = $this->Properties->patchEntity($property,$data);
       
        if($property = $this->Properties->save($property ,['modified' => false])){
            return $this->redirect(['controller'=>'properties','action' => 'propertiesShow']);
        }
    }

    }

    // property edit 
    public function edit(){
       
        $id = $this->request->getQuery('id');
        if($this->request->is('ajax')){
            $this->autoRender = false;
            $this->layout = false;
            $property = $this->Properties->find('all')->where(['id'=>$id])->first();
                echo json_encode($property);
            }
            exit;
    }
     //proprty delete
    //  public function propertyDelete($id = null){
    //     $this->request->allowMethod(['post', 'delete']);
    //     $property = $this->Properties->get($id);
    //     $this->PropertyComments->deleteAll(array('property_id' => $id));
    //     if ($this->Properties->delete($property)) {
    //         $this->Flash->success(__('The property has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The property could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['controller'=>'properties','action' => 'propertiesShow']);
    // }
     public function propertyDelete($id = null){
        if($this->request->is('ajax')){
            $this->autoRender =false;
            $id = $this->request->getQuery('id');
            $property = $this->Properties->get($id);
            if($property){
                $data = array('id' => $id, 'status' => 2);
            }
            $property = $this->Properties->patchEntity($property,$data);
           
            if($property = $this->Properties->save($property,['modified' => false])){
              echo 1;
            }
            }
    }

    //property view

    public function propertyView($id = null){
        $this->viewBuilder()->setLayout('dashboard');
        $property = $this->Properties->get($id, [
            'contain' => ['Users', 'PropertyComments'],
        ]);

        $this->set(compact('property'));
    }

    // property edit 

    // public function propertyEdit($id = null){
    //     $this->viewBuilder()->setLayout('dashboard');
    //     $property = $this->Properties->get($id, [
    //         'contain' => [],
    //     ]);
    //     $image = $property->image;
        
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $data = $this->request->getData();
            
    //         $image_file = $this->request->getData("image");
    //         $fileName = $image_file->getClientFilename();
            
    //         if ($fileName == '') {
    //             $data['image'] = $image; 
    //         }else{
    //             $data['image'] = $fileName;
                
    //         }
    //         $property = $this->Properties->patchEntity($property,$data);
               
    //              if ($this->Properties->save($property)) {
    //                 $hasFileError = $image_file->getError();
    //             if ($hasFileError > 0) {
    //                 $data["image"] = "";
    //             } else {
    //                 $fileType = $image_file->getClientMediaType();

    //                 if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
    //                     $imagePath = WWW_ROOT . "property/" . $fileName;
    //                     $image_file->moveTo($imagePath);
    //                     $data["image"] = $fileName;
    //                 }
    //             }
            
    //             $this->Flash->success(__('update successfully'));

    //             return $this->redirect(['controller'=>'properties','action' =>'propertiesShow']);
    //         }else{
    //             $this->Flash->error(__('The property could not be saved. Please, try again.'));
    //         }
    //     }
    //     $users = $this->Properties->Users->find('list', ['limit' => 200])->all();
    //     $this->set(compact('property'));
    // }

    public function propertyEdit(){
     
        $id = $this->request->getData('property_id');
        $property = $this->Properties->get($id, [
                'contain' => [],
            ]);

        
            $image = $property->image;
       if($this->request->is('ajax')){
        $this->autoRender =false;
        $data = $this->request->getData();
                $image_file = $this->request->getData("image");
                $fileName = $image_file->getClientFilename();
                
                if ($fileName == '') {
                    $data['image'] = $image; 
                }else{
                    $data['image'] = $fileName;
                    $path = WWW_ROOT.'property'.DS.$fileName;
                    if($fileName){
                        $image_file->moveTo($path);
                    }
                    $data['image'] = $fileName;
                }
                $property = $this->Properties->patchEntity($property,$data);     
                     if ($this->Properties->save($property)) {
                        echo json_encode(1);
                    }
                    exit;
                }
       
    }


    public $paginate = [
        'limit' => 4
    ];
}

?>