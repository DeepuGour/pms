<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PropertyComments Controller
 *
 * @property \App\Model\Table\PropertyCommentsTable $PropertyComments
 * @method \App\Model\Entity\PropertyComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyCommentsController extends AppController
{
   
    public function initialize():void{
        parent::initialize();
        $this->loadModel('Users'); //add table User table
       $this->loadModel('UserProfile'); //add table User table
       $this->loadModel('Properties'); //add table Property table
      
    }

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
               $this->Flash->success(__('The Comment has been saved.'));

               $redirect = $this->request->getQuery('redirect', [
                   'controller' => 'Properties',
                   'action' => 'propertyShow/'.$id,
               ]);
       
               return $this->redirect($redirect);
           }else{
               $redirect = $this->request->getQuery('redirect', [
                   'controller' => 'Properties',
                   'action' => 'propertyShow/'.$id,
               ]);
       
               return $this->redirect($redirect);
           }
        }

       

   }


}
