<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Users</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Users</li>
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

<div class="table-responsive mb-4 border rounded-1">
    <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">User</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Role</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Email Address</h6>
                </th>
                <th>
                    <h6 class="fs-4 fw-semibold mb-0">Phone Number</h6>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <?php
                            $profilePicture = 'profile/user-1.jpg';
                            if (!empty($user->profile) && !empty($user->profile->profile_picture)) {
                                $profilePicture = $user->profile->profile_picture;
                            }
                            ?>
                            <?= $this->Html->image($profilePicture, [
                                'class' => 'rounded-circle',
                                'width' => 40,
                                'height' => 40,
                                'alt' => 'Profile Picture',
                            ]) ?>
                            <div class="ms-3">
                                <?php
                                if (!empty($user->profile) && (!empty($user->profile->first_name) || !empty($user->profile->last_name))) {
                                    $fullName = h($user->profile->first_name . ' ' . $user->profile->last_name);
                                } else {
                                    $fullName = h($user->username);
                                }
                                ?>
                                <h6 class="fs-4 fw-semibold mb-0"><?= $fullName ?></h6>
                                <span class="fw-normal">@<?= h($user->username) ?></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <?php if ($user->role == 'admin') : ?>
                            <span class="badge bg-danger text-white fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                <i class="ti ti-shield fs-3"></i> Admin
                            </span>
                        <?php else : ?>
                            <span class="badge bg-primary text-white fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                <i class="ti ti-user fs-3"></i> User
                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <p class="mb-0 fw-normal"><?= $this->Html->link(h($user->email), 'mailto:' . h($user->email)) ?></p>
                    </td>
                    <td>
                        <?php
                        $phoneNumber = 'N/A';
                        if (!empty($user->profile) && !empty($user->profile->phone)) {
                            $phoneNumber = h($user->profile->phone);
                        }
                        ?>
                        <p class="mb-0 fw-normal"><?= $phoneNumber ?></p>
                    </td>
                    <td>
                        <div class="dropdown dropstart">
                            <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton<?= $user->id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots fs-5"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $user->id ?>">
                                <li>
                                    <?= $this->Html->link(
                                        '<i class="fs-4 ti ti-eye"></i> View',
                                        ['action' => 'view', $user->id],
                                        ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false],
                                    ); ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(
                                        '<i class="fs-4 ti ti-shopping-cart"></i> Order History',
                                        ['controller' => 'Orders', 'action' => 'index', '?' => ['user_id' => $user->id]],
                                        ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false],
                                    ); ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(
                                        '<i class="fs-4 ti ti-mail"></i> Enquiries',
                                        ['controller' => 'Enquiries', 'action' => 'index', '?' => ['user_id' => $user->id]],
                                        ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false],
                                    ); ?>
                                </li>
                                <li>
                                    <?= $this->Html->link(
                                        '<i class="fs-4 ti ti-star"></i> Reviews',
                                        ['controller' => 'Reviews', 'action' => 'index', '?' => ['user_id' => $user->id]],
                                        ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false],
                                    ); ?>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
