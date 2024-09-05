<ul class="list-group pt-2 border-bottom rounded-0">
    <h6 class="my-3 mx-4">Filter by Category</h6>
    <?php foreach ($categories as $id => $category): ?>
        <li class="list-group-item border-0 p-0 mx-4 mb-2">
            <?= $this->Html->link(
                h($category),
                ['?' => array_merge($this->request->getQuery(), ['category' => $id])],
                ['class' => 'd-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1']
            ) ?>
        </li>
    <?php endforeach; ?>
</ul>

<ul class="list-group pt-2 border-bottom rounded-0">
    <h6 class="my-3 mx-4">Filter by Price</h6>
    <li class="list-group-item border-0 p-0 mx-4 mb-2">
        <?= $this->Html->link('0-50', ['?' => array_merge($this->request->getQuery(), ['price_range' => '0-50'])]) ?>
    </li>
    <li class="list-group-item border-0 p-0 mx-4 mb-2">
        <?= $this->Html->link('50-100', ['?' => array_merge($this->request->getQuery(), ['price_range' => '50-100'])]) ?>
    </li>
    <li class="list-group-item border-0 p-0 mx-4 mb-2">
        <?= $this->Html->link('100-200', ['?' => array_merge($this->request->getQuery(), ['price_range' => '100-200'])]) ?>
    </li>
    <li class="list-group-item border-0 p-0 mx-4 mb-2">
        <?= $this->Html->link('Over 200', ['?' => array_merge($this->request->getQuery(), ['price_range' => 'over-200'])]) ?>
    </li>
</ul>
