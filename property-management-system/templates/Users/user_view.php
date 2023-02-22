<style>
  .card.my-4 {
    width: 444px;
    margin: auto;
  }
</style>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3"><?php echo $user->user_profile->first_name . ' ' . $user->user_profile->last_name ?></h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <?php echo $this->Html->image('/uploade/' . $user->image, ['style' => 'width:170px;']) ?>
                      </div>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <p class="text-xs font-weight-bold mb-0"><?php echo 'Email:- ' . $user->email ?></p>
                          <p class="text-xs font-weight-bold mb-0"><?php echo 'Contact:- ' . $user->user_profile->contact ?></p>
                          <p class="text-xs font-weight-bold mb-0"><?php echo 'Address:- ' . $user->user_profile->address ?></p>
                          <p class="text-xs font-weight-bold mb-0"><?php echo 'Status:- ';
                                                                    if ($user->status == 1) {
                                                                      echo 'Unblock';
                                                                    } else {
                                                                      echo 'Block';
                                                                    } ?></p>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                  <td>


                  </td>
                </tr>
              </tbody>
            </table>
            <?php echo $this->Html->link(__('Back'), ['controller' => 'users', 'action' => 'userProfiles'], ['class' => 'btn bg-gradient-primary mt-4 w-100']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  

