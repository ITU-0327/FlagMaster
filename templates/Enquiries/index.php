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
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
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
    <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
        <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
            <i class="ti ti-menu-2 fs-5"></i>
        </button>
        <form class="position-relative w-100">
            <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact" />
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="d-flex w-100">
        <div class="d-flex w-100">
            <div class="min-width-340">
                <div class="border-end user-chat-box h-100">
                    <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                        <form class="position-relative">
                            <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search" />
                            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                        </form>
                    </div>
                    <div class="app-chat">
                        <ul class="chat-users mh-n100" data-simplebar>
                            <?php $first = true; ?>
                            <?php foreach ($enquiries as $enquiry) : ?>
                                <li>
                                    <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user <?= $first ? 'bg-light-subtle' : 'justify-content-between'; ?>" id="chat_user_<?= h($enquiry->id); ?>" data-user-id="<?= h($enquiry->id); ?>">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault_<?= h($enquiry->id); ?>" />
                                        </div>
                                        <div class="position-relative w-100 ms-2">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <h6 class="mb-0">
                                                    <?= h($enquiry->user->profile->first_name ?? 'First name not available') ?>
                                                    <?= h($enquiry->user->profile->last_name ?? 'Last name not available') ?>
                                                </h6>
                                                <span class="badge text-bg-<?php
                                                if ($enquiry->status == 'open') {
                                                    echo 'primary';
                                                } elseif ($enquiry->status == 'closed') {
                                                    echo 'danger';
                                                } elseif ($enquiry->status == 'pending') {
                                                    echo 'warning';
                                                }
                                                ?>">
                                                    <?= h($enquiry->status); ?>
                                                </span>
                                            </div>
                                            <h6 class="fw-semibold text-dark">
                                                <?= h($enquiry->subject); ?>
                                            </h6>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <span>
                                                        <i class="ti ti-star fs-4 me-2 text-dark"></i>
                                                    </span>
                                                    <span class="d-block">
                                                        <i class="ti ti-alert-circle text-muted"></i>
                                                    </span>
                                                </div>
                                                <p class="mb-0 fs-2 text-muted"><?= h($enquiry->created_at->format('h:ia')); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $first = false; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="chat-container h-100 w-100">
                    <div class="chat-box-inner-part h-100">
                        <div class="chatting-box app-email-chatting-box">
                            <div class="p-9 py-3 border-bottom chat-meta-user">
                                <ul class="list-unstyled mb-0 d-flex align-items-center">
                                    <li class="d-lg-none d-block">
                                        <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                            <i class="ti ti-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Star">
                                        <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                            <i class="ti ti-star"></i>
                                        </a>
                                    </li>
                                    <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="important">
                                        <a class="d-block text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                            <i class="ti ti-alert-circle"></i>
                                        </a>
                                    </li>
                                    <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                                        <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="position-relative overflow-hidden">
                                <div class="position-relative">
                                    <div class="chat-box email-box mh-n100 p-9" data-simplebar="init">
                                        <?php if (!empty($enquiries)) : ?>
                                            <?php $first = true; ?>
                                            <?php foreach ($enquiries as $enquiry) : ?>
                                                <div class="chat-list chat <?= $first ? 'active-chat' : ''; ?>" data-user-id="<?= h($enquiry->id); ?>">
                                                    <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <?php
                                                            $profilePicture = 'profile/user-1.jpg';
                                                            if (!empty($enquiry->user->profile) && !empty($enquiry->user->profile->profile_picture)) {
                                                                $profilePicture = $enquiry->user->profile->profile_picture;
                                                            }
                                                            ?>
                                                            <?= $this->Html->image($profilePicture, [
                                                                'alt' => h($enquiry->user->username),
                                                                'class' => 'rounded-circle',
                                                                'width' => '48',
                                                                'height' => '48',
                                                            ]) ?>
                                                            <div>
                                                                <h6 class="fw-semibold mb-0">
                                                                    <?= h($enquiry->user->username); ?>
                                                                </h6>
                                                                <p class="mb-0"><?= h($enquiry->user->email); ?></p>
                                                            </div>
                                                        </div>
                                                        <span class="badge text-bg-<?php
                                                        if ($enquiry->status == 'open') {
                                                            echo 'primary';
                                                        } elseif ($enquiry->status == 'closed') {
                                                            echo 'danger';
                                                        } elseif ($enquiry->status == 'pending') {
                                                            echo 'warning';
                                                        }
                                                        ?>">
                                                            <?= h($enquiry->status); ?>
                                                        </span>
                                                    </div>
                                                    <div class="border-bottom pb-7 mb-7">
                                                        <h4 class="fw-semibold text-dark mb-3">
                                                            <?= h($enquiry->subject); ?>
                                                        </h4>
                                                        <p class="mb-3 text-dark">
                                                            <?= nl2br(h($enquiry->message)); ?>
                                                        </p>
                                                        <p class="mb-0 text-dark">Regards,</p>
                                                        <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                            <?= h($enquiry->user->profile->first_name ?? 'First name not available') ?>
                                                            <?= h($enquiry->user->profile->last_name ?? 'Last name not available') ?>
                                                        </h6>
                                                    </div>
                                                    <!-- You can render attachments here if needed -->
<!--                                                    <div class="mb-3">-->
<!--                                                        <h6 class="fw-semibold mb-0 text-dark mb-3">Attachments</h6>-->
<!--                                                        <div class="d-block d-sm-flex align-items-center gap-4">-->
<!--                                                            <a href="javascript:void(0)" class="hstack gap-3 mb-2 mb-sm-0">-->
<!--                                                                <div class="d-flex align-items-center gap-3">-->
<!--                                                                    <div class="rounded-1 text-bg-light p-6">-->
<!--                                                                        --><?php //= $this->Html->image('chat/icon-adobe.svg', [
//                                                                            'alt' => 'service-task.pdf',
//                                                                            'width' => '24',
//                                                                            'height' => '24'
//                                                                        ]) ?>
<!--                                                                    </div>-->
<!--                                                                    <div>-->
<!--                                                                        <h6 class="fw-semibold">service-task.pdf</h6>-->
<!--                                                                        <div class="d-flex align-items-center gap-3 fs-2 text-muted">-->
<!--                                                                            <span>2 MB</span>-->
<!--                                                                            <span>--><?php //= date('d M Y', strtotime($enquiry->created_at)); ?><!--</span>-->
<!--                                                                        </div>-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </a>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
                                                </div>
                                                <?php $first = false; ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <p>No enquiries found.</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="px-9 py-3 border-top chat-send-message-footer">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <ul class="list-unstyled mb-0 d-flex align-items-center gap-7">
                                                <li>
                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1" href="javascript:void(0)">
                                                        <i class="ti ti-arrow-back-up fs-5"></i>
                                                        Reply
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1" href="javascript:void(0)">
                                                        <i class="ti ti-arrow-forward-up fs-5"></i>
                                                        Forward
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
