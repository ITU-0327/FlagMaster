<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Review> $reviews
 */
?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8"><?= __('Reviews') ?></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><?= __('Reviews') ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'reviews-img',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="widget-content searchable-container list">
    <div class="card card-body">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <form class="position-relative">
                    <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search Reviews..." />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                <div class="action-btn show-btn">
                    <a href="javascript:void(0)" class="delete-multiple bg-danger-subtle btn me-2 text-danger d-flex align-items-center ">
                        <i class="ti ti-trash me-1 fs-5"></i> Delete All Row
                    </a>
                </div>
                <?= $this->Html->link(__('New Review'), ['action' => 'add'], ['class' => 'btn btn-primary d-flex align-items-center']) ?>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <div class="table-responsive">
            <table class="table search-table align-middle text-nowrap">
                <thead class="header-item">
                <th>
                    <div class="n-chk align-self-center text-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input primary" id="review-check-all" />
                            <label class="form-check-label" for="review-check-all"></label>
                        </div>
                    </div>
                </th>
                <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th><?= $this->Paginator->sort('user_id', 'User') ?></th>
                <th><?= $this->Paginator->sort('product_id', 'Product') ?></th>
                <th><?= $this->Paginator->sort('rating', 'Rating') ?></th>
                <th>Action</th>
                </thead>
                <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr class="search-items">
                        <td>
                            <div class="n-chk align-self-center text-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input review-chkbox primary" id="checkbox<?= $review->id ?>" />
                                    <label class="form-check-label" for="checkbox<?= $review->id ?>"></label>
                                </div>
                            </div>
                        </td>
                        <td><?= $this->Number->format($review->id) ?></td>
                        <td><?= $review->hasValue('user') ? $this->Html->link($review->user->email, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>
                        <td><?= $review->hasValue('product') ? $this->Html->link($review->product->name, ['controller' => 'Products', 'action' => 'view', $review->product->id]) : '' ?></td>
                        <td><?= $this->Number->format($review->rating) ?></td>
                        <td><?= h($review->created_at) ?></td>
                        <td><?= h($review->updated_at) ?></td>
                        <td>
                            <div class="action-btn">
                                <?= $this->Html->link('<i class="ti ti-eye fs-5"></i>', ['action' => 'view', $review->id], ['escape' => false, 'class' => 'text-primary edit']) ?>
                                <?= $this->Html->link('<i class="ti ti-edit fs-5"></i>', ['action' => 'edit', $review->id], ['escape' => false, 'class' => 'text-dark ms-2']) ?>
                                <?= $this->Form->postLink('<i class="ti ti-trash fs-5"></i>', ['action' => 'delete', $review->id], [
                                    'confirm' => __('Are you sure you want to delete # {0}?', $review->id),
                                    'escape' => false,
                                    'class' => 'text-danger ms-2'
                                ]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>

<?php $this->start('customScript'); ?>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="../assets/libs/fullcalendar/index.global.min.js"></script>
<script src="../assets/js/apps/contact.js"></script>
<?php $this->end(); ?>
