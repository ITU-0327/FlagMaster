<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="card overflow-hidden">
    <div class="chat-container h-100 w-100">
        <div class="chat-box-inner-part h-100">
            <div class="chatting-box app-email-chatting-box">
                <div class="p-9 py-3 border-bottom chat-meta-user">
                    <ul class="list-unstyled mb-0 d-flex align-items-center">
                        <li class="d-lg-none d-block">
                            <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="<?= $this->Url->build(['action' => 'index']) ?>">
                                <i class="ti ti-arrow-left"></i>
                            </a>
                        </li>
                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Star">
                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                <i class="ti ti-star"></i>
                            </a>
                        </li>
                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                            <?= $this->Form->postLink(
                                '<i class="ti ti-trash"></i>',
                                ['action' => 'delete', $enquiry->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->id), 'escapeTitle' => false]
                            ) ?>
                        </li>
                    </ul>
                </div>
                <div class="chat-box email-box mh-n100 p-9">
                    <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                        <div class="d-flex align-items-center gap-2">
                            <?= $this->Html->image('profile/user-' . h($enquiry->user->id) % 12 . '.jpg', [
                                'alt' => h($enquiry->user->username),
                                'class' => 'rounded-circle',
                                'width' => '48',
                                'height' => '48'
                            ]) ?>
                            <div>
                                <h6 class="fw-semibold mb-0"><?= h($enquiry->user->username); ?></h6>
                                <p class="mb-0"><?= h($enquiry->user->email); ?></p>
                            </div>
                        </div>
                        <span class="badge text-bg-<?= $enquiry->status === 'open' ? 'primary' : ($enquiry->status === 'closed' ? 'danger' : 'warning') ?>">
                            <?= h($enquiry->status); ?>
                        </span>
                    </div>
                    <div class="border-bottom pb-7 mb-7">
                        <h4 class="fw-semibold text-dark mb-3"><?= h($enquiry->subject); ?></h4>
                        <p class="mb-3 text-dark"><?= nl2br(h($enquiry->message)); ?></p>
                        <p class="mb-0 text-dark">Regards,</p>
                        <h6 class="fw-semibold mb-0 text-dark pb-1">
                            <?= h($enquiry->user->profile->first_name ?? 'First name not available') ?>
                            <?= h($enquiry->user->profile->last_name ?? 'Last name not available') ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
