<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">My Home</a>
	      
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><?php echo $this->Html->link(__('Home'), ['action' => 'home'], ['class' => 'nav-link'])?></li>
	          <li class="nav-item"><?php echo $this->Html->link(__('Register'), ['action' => 'userAdd'], ['class' => 'nav-link'])?></li>
			  <li class="nav-item"><?php echo $this->Html->link(__('login'), ['action' => 'login'], ['class' => 'nav-link'])?></li>
	        </ul>
	      </div>
	    </div>
</nav>
<div class="properties index content">
    <h3><?= __('Properties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th><?= $this->Paginator->sort('property_title') ?></th>
                    <th><?= $this->Paginator->sort('property_description') ?></th>
                    <th><?= $this->Paginator->sort('property_category') ?></th>
                    <th><?= $this->Paginator->sort('property_tags') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = $this->Paginator->counter('{{start}}');
                 foreach ($properties as $property): ?>
                <tr>
                    <td><?= $this->Number->format($count) ?></td>
                    <td><?= h($property->category_name) ?></td>
                    <td><?= h($property->property_title) ?></td>
                    <td><?= h($property->property_description) ?></td>
                    <td><?= h($property->property_category) ?></td>
                    <td><?= h($property->property_tags) ?></td>
                    <td><?php echo $this->Html->image('/property/'.$property->image,['style'=>'width:120px;']); ?></td>
                   
                </tr>
                <?php
                   $count++;
                endforeach; ?>
            </tbody>
        </table>  
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        <p class="lead fw-normal mb-1"><?php echo $this->Html->link(__('Back'), ['action' => 'home'], ['class' => 'button'])  ?></p>
    </div>
</div>
