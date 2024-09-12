<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 * @var \Cake\Collection\CollectionInterface|string[] $products
 */
?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Category</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Category</li>
                        <li class="breadcrumb-item" aria-current="page">Add</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'flagmaster-img',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Form->button(__('View All Categories'), [
                'type' => 'button',
                'onclick' => "location.href='" . $this->Url->build(['action' => 'index']) . "'",
                'class' => 'btn btn-primary mb-3',
            ]) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3"><?= __('Add Category') ?></h4>
                <?= $this->Form->create($category) ?>
                <div class="row">
                    <!-- Name field -->
                    <div class="col-md-12">
                        <label for="category-name"><?= __('Name') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Category Name']) ?>
                        </div>
                    </div>
                    <!-- Description field -->
                    <div class="col-md-12">
                        <label for="description"><?= __('Description') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('description', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Description']) ?>
                        </div>
                    </div>
                    <!-- Created At field -->
                    <div class="col-md-6">
                        <label for="created-at"><?= __('Created At') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('created_at', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Created At']) ?>
                        </div>
                    </div>
                    <!-- Updated At field -->
                    <div class="col-md-6">
                        <label for="updated-at"><?= __('Updated At') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('updated_at', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Updated At']) ?>
                        </div>
                    </div>
                    <!-- Products field -->
                    <div class="col-md-12">
                        <label for="products"><?= __('Products') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('products._ids', ['options' => $products, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Products']) ?>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div class="col-12">
                        <div class="d-md-flex align-items-center">
                            <div class="ms-auto mt-3 mt-md-0">
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary hstack gap-6']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
