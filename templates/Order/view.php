<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Order'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="order view content">
            <h3><?= h($order->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $order->hasValue('user') ? $this->Html->link($order->user->email, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($order->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($order->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Amount') ?></th>
                    <td><?= $this->Number->format($order->total_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Order Date') ?></th>
                    <td><?= h($order->order_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($order->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($order->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Delivery') ?></h4>
                <?php if (!empty($order->delivery)) : ?>
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
                        <?php foreach ($order->delivery as $delivery) : ?>
                        <tr>
                            <td><?= h($delivery->id) ?></td>
                            <td><?= h($delivery->order_id) ?></td>
                            <td><?= h($delivery->address_id) ?></td>
                            <td><?= h($delivery->delivery_status) ?></td>
                            <td><?= h($delivery->estimated_delivery_date) ?></td>
                            <td><?= h($delivery->created_at) ?></td>
                            <td><?= h($delivery->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Delivery', 'action' => 'view', $delivery->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Delivery', 'action' => 'edit', $delivery->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Delivery', 'action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Order Item') ?></h4>
                <?php if (!empty($order->order_item)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Unit Price') ?></th>
                            <th><?= __('Total Price') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->order_item as $orderItem) : ?>
                        <tr>
                            <td><?= h($orderItem->id) ?></td>
                            <td><?= h($orderItem->order_id) ?></td>
                            <td><?= h($orderItem->product_id) ?></td>
                            <td><?= h($orderItem->quantity) ?></td>
                            <td><?= h($orderItem->unit_price) ?></td>
                            <td><?= h($orderItem->total_price) ?></td>
                            <td><?= h($orderItem->created_at) ?></td>
                            <td><?= h($orderItem->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OrderItem', 'action' => 'view', $orderItem->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OrderItem', 'action' => 'edit', $orderItem->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderItem', 'action' => 'delete', $orderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Payment') ?></h4>
                <?php if (!empty($order->payment)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Order Id') ?></th>
                            <th><?= __('Payment Date') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Payment Method') ?></th>
                            <th><?= __('Stripe Payment Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($order->payment as $payment) : ?>
                        <tr>
                            <td><?= h($payment->id) ?></td>
                            <td><?= h($payment->order_id) ?></td>
                            <td><?= h($payment->payment_date) ?></td>
                            <td><?= h($payment->amount) ?></td>
                            <td><?= h($payment->payment_method) ?></td>
                            <td><?= h($payment->stripe_payment_id) ?></td>
                            <td><?= h($payment->status) ?></td>
                            <td><?= h($payment->created_at) ?></td>
                            <td><?= h($payment->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Payment', 'action' => 'view', $payment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Payment', 'action' => 'edit', $payment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payment', 'action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
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
