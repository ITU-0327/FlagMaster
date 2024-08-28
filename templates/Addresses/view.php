<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="addresses view content">
            <h3><?= h($address->street) ?></h3>
            <table>
                <tr>
                    <th><?= __('Street') ?></th>
                    <td><?= h($address->street) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($address->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= h($address->state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Postal Code') ?></th>
                    <td><?= h($address->postal_code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Country') ?></th>
                    <td><?= h($address->country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($address->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($address->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($address->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Deliveries') ?></h4>
                <?php if (!empty($address->deliveries)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Delivery Status') ?></th>
                            <th><?= __('Estimated Delivery Date') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->deliveries as $delivery) : ?>
                        <tr>
                            <td><?= h($delivery->id) ?></td>
                            <td><?= h($delivery->order_id) ?></td>
                            <td><?= h($delivery->address_id) ?></td>
                            <td><?= h($delivery->delivery_status) ?></td>
                            <td><?= h($delivery->estimated_delivery_date) ?></td>
                            <td><?= h($delivery->created_at) ?></td>
                            <td><?= h($delivery->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Deliveries', 'action' => 'view', $delivery->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Deliveries', 'action' => 'edit', $delivery->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deliveries', 'action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Profiles') ?></h4>
                <?php if (!empty($address->profiles)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('First Name') ?></th>
                            <th><?= __('Last Name') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->profiles as $profile) : ?>
                        <tr>
                            <td><?= h($profile->id) ?></td>
                            <td><?= h($profile->user_id) ?></td>
                            <td><?= h($profile->address_id) ?></td>
                            <td><?= h($profile->first_name) ?></td>
                            <td><?= h($profile->last_name) ?></td>
                            <td><?= h($profile->phone) ?></td>
                            <td><?= h($profile->created_at) ?></td>
                            <td><?= h($profile->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Profiles', 'action' => 'view', $profile->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Profiles', 'action' => 'edit', $profile->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Profiles', 'action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
