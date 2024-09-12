<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquiry> $enquiries
 */
?>
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Contact Us</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Contact Us</li>
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

    <div class="card overflow-hidden chat-application">
        <!-- Search bar (for mobile view) -->
        <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
            <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                <i class="ti ti-menu-2 fs-5"></i>
            </button>
            <!-- Search bar -->
            <form class="position-relative w-100" method="GET" action="<?= $this->Url->build(['action' => 'index']); ?>">
                <input type="text" name="search" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contacts" />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>

        <div class="d-flex w-100">
            <div class="w-100">
                <div class="border-end user-chat-box h-100">
                    <!-- Search bar (for desktop view) -->
                    <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                        <form class="position-relative" method="GET" action="<?= $this->Url->build(['action' => 'index']); ?>">
                            <input type="text" name="search" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search" />
                            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                        </form>
                    </div>

                    <!-- Chat list -->
                    <div class="app-chat">
                        <ul class="chat-users mh-n100" data-simplebar>
                            <?php foreach ($enquiries as $enquiry): ?>
                                <li>
                                    <a href="<?= $this->Url->build(['action' => 'view', $enquiry->id]) ?>" class="px-4 py-3 bg-hover-light-black d-flex align-items-start">
                                        <div class="position-relative w-100 ms-2">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <h6 class="mb-0"><?= h($enquiry->user->profile->first_name ?? 'First name not available') ?> <?= h($enquiry->user->profile->last_name ?? 'Last name not available') ?></h6>
                                                <span class="badge text-bg-<?= $enquiry->status === 'open' ? 'primary' : ($enquiry->status === 'closed' ? 'danger' : 'warning') ?>">
                                                <?= h($enquiry->status); ?>
                                            </span>
                                            </div>
                                            <h6 class="fw-semibold text-dark"><?= h($enquiry->subject); ?></h6>
                                            <p class="mb-0 fs-2 text-muted"><?= h($enquiry->created_at->format('h:ia')); ?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$this->start('customScript'); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?= $this->Html->script('apps/chat') ?>
<?php $this->end(); ?>
