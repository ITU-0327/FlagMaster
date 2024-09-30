<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<?php $this->start('css'); ?>

<?= $this->Html->css('/libs/owl.carousel/dist/assets/owl.carousel.min.css') ?>

<?php $this->end(); ?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Product Detail</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Product Detail</li>
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

<div class="shop-detail">
    <div class="card shadow-none border">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-6">
                    <div id="sync1" class="owl-carousel owl-theme">
                        <?php if (!empty($product->product_images)) : ?>
                            <?php foreach ($product->product_images as $image) : ?>
                                <div class="item rounded-4 overflow-hidden">
                                    <?= $this->Html->image($image->image_url, [
                                        'alt' => h($product->name) . ' Image',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="item rounded-4 overflow-hidden">
                                <?= $this->Html->image('products/Brazil-Flag.png', [
                                    'alt' => 'No Image Available',
                                    'class' => 'img-fluid',
                                ]) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div id="sync2" class="owl-carousel owl-theme">
                        <?php if (!empty($product->product_images)) : ?>
                            <?php foreach ($product->product_images as $image) : ?>
                                <div class="item rounded-4 overflow-hidden">
                                    <?= $this->Html->image($image->image_url, [
                                        'alt' => h($product->name) . ' Thumbnail',
                                        'class' => 'img-fluid',
                                        'loading' => 'lazy',
                                    ]) ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <!-- Placeholder Thumbnail -->
                            <div class="item rounded-4 overflow-hidden">
                                <?= $this->Html->image('products/Brazil-Flag.png', [
                                    'alt' => 'No Thumbnail Available',
                                    'class' => 'img-fluid',
                                ]) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="shop-content">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <?php if ($product->stock_quantity > 0) : ?>
                                <span class="badge text-bg-success fs-2 fw-semibold">In Stock</span>
                            <?php else : ?>
                                <span class="badge text-bg-danger fs-2 fw-semibold">Out of Stock</span>
                            <?php endif; ?>
                            <span class="fs-2">
                                <?php foreach ($product->categories as $category) : ?>
                                    <?= h($category->name) ?>
                                <?php endforeach; ?>
                            </span>
                        </div>
                        <h4><?= h($product->name) ?></h4>
                        <div class="mb-3"><?= $product->description ?></div>

                        <h4 class="mb-3">
                            <?php if (($product->discount_type === 'fixed' || $product->discount_type === 'percentage') && $product->discount_value) : ?>
                                <del class="fs-5 text-muted"><?= $this->Number->currency($product->price, 'AUD') ?></del>
                                <?= $this->Number->currency($product->discount_value, 'AUD') ?>
                            <?php else : ?>
                                <?= $this->Number->currency($product->price, 'AUD') ?>
                            <?php endif; ?>
                        </h4>

                        <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                            <?php
                            // Calculate average rating
                            $averageRating = 0;
                            $totalReviews = count($product->reviews);
                            if ($totalReviews > 0) {
                                $sumRatings = 0;
                                foreach ($product->reviews as $review) {
                                    $sumRatings += $review->rating;
                                }
                                $averageRating = round($sumRatings / $totalReviews, 1);
                            }
                            ?>
                            <ul class="list-unstyled d-flex align-items-center mb-0">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <li>
                                        <a class="me-1" href="javascript:void(0)">
                                            <i class="ti ti-star <?= $i <= floor($averageRating) ? 'text-warning' : 'text-muted' ?> fs-4"></i>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                            <a href="#pills-reviews">(<?= $totalReviews ?> reviews)</a>
                        </div>
                        <div class="d-flex align-items-center gap-8 py-7">
                            <h6 class="mb-0 fs-4">QTY:</h6>
                            <div class="input-group input-group-sm rounded">
                                <button class="btn minus min-width-40 py-0 border-end border-muted fs-5 border-end-0 text-muted" type="button" id="add1">
                                    <i class="ti ti-minus"></i>
                                </button>
                                <input type="text" class="min-width-40 flex-grow-0 border border-muted text-muted fs-4 fw-semibold form-control text-center qty" placeholder="" aria-label="Example text with button addon" aria-describedby="add1" value="1">
                                <button class="btn min-width-40 py-0 border border-muted fs-5 border-start-0 text-muted add" type="button" id="addo2">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="d-sm-flex align-items-center gap-6 pt-8 mb-7">
                            <?php if ($product->stock_quantity > 0) : ?>
                                <?= $this->Html->link('Buy Now', ['action' => 'checkout', $product->id], ['class' => 'btn d-block btn-primary px-5 py-8 mb-6 mb-sm-0']) ?>
                                <?= $this->Form->postLink('Add to Cart', ['action' => 'addToCart', $product->id], ['class' => 'btn d-block btn-danger px-7 py-8']) ?>
                            <?php else : ?>
                                <span class="text-danger fs-5">This product is currently out of stock.</span>
                            <?php endif; ?>
                        </div>
                        <p class="mb-0">Dispatched in 2-3 weeks</p>
                        <a href="javascript:void(0)">Why the longer time for delivery?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-none border">
        <div class="card-body p-4">
            <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                        Description
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">
                        Reviews
                    </button>
                </li>
            </ul>
            <div class="tab-content pt-4" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">
                    <h5 class="fs-5 mb-7"><?= __('Product Description') ?></h5>
                    <div class="mb-7"><?= $product->description ?></div>
                </div>
                <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                                <div class="card-body text-center p-4 d-flex flex-column justify-content-center">
                                    <h6 class="mb-3">Average Rating</h6>
                                    <h2 class="text-primary mb-3 fw-semibold fs-9"><?= h($averageRating) ?>/5</h2>
                                    <ul class="list-unstyled d-flex align-items-center justify-content-center mb-0">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <li>
                                                <a class="me-1" href="javascript:void(0)">
                                                    <i class="ti ti-star <?= $i <= floor($averageRating) ? 'text-warning' : 'text-muted' ?> fs-6"></i>
                                                </a>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                                <div class="card-body p-4 d-flex flex-column justify-content-center">
                                    <?php
                                    // Calculate rating breakdown
                                    $ratingsCount = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
                                    foreach ($product->reviews as $review) {
                                        if (isset($ratingsCount[$review->rating])) {
                                            $ratingsCount[$review->rating]++;
                                        }
                                    }
                                    ?>
                                    <?php foreach (range(5, 1, -1) as $rating) : ?>
                                        <div class="d-flex align-items-center gap-9 mb-3">
                                            <span class="flex-shrink-0 fs-2"><?= $rating ?> Stars</span>
                                            <div class="progress bg-primary-subtle w-100 h-4">
                                                <?php
                                                $percentage = $totalReviews > 0 ? $ratingsCount[$rating] / $totalReviews * 100 : 0;
                                                ?>
                                                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percentage ?>%;"></div>
                                            </div>
                                            <h6 class="mb-0">(<?= $ratingsCount[$rating] ?>)</h6>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow-none border w-100 mb-7 mb-lg-0">
                                <div class="card-body p-4 d-flex flex-column justify-content-center">
                                    <button type="button" class="btn btn-outline-primary d-flex align-items-center gap-2 mx-auto">
                                        <i class="ti ti-pencil fs-7"></i>Write an Review
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews List -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (!empty($product->reviews)) : ?>
                                <?php foreach ($product->reviews as $review) : ?>
                                    <div class="d-flex align-items-start mb-6">
                                        <div class="me-4">
                                            <?= $this->Html->image('users/default.png', [
                                                'alt' => h($review->user->name),
                                                'class' => 'rounded-circle',
                                                'width' => '50px',
                                                'height' => '50px',
                                            ]) ?>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between">
                                                <h6><?= h($review->user->name) ?></h6>
                                                <small class="text-muted"><?= $review->created_at->format('M d, Y') ?></small>
                                            </div>
                                            <ul class="list-unstyled d-flex align-items-center mb-2">
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <li>
                                                        <i class="ti ti-star <?= $i <= $review->rating ? 'text-warning' : 'text-muted' ?> fs-5"></i>
                                                    </li>
                                                <?php endfor; ?>
                                            </ul>
                                            <p><?= h($review->comment) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No reviews yet. Be the first to review this product!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="related-products pt-7">
        <h4 class="mb-3 fw-semibold">Related Products</h4>
        <div class="row">
            <?php if (!empty($relatedProducts)) : ?>
                <?php foreach ($relatedProducts as $related) : ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="card hover-img overflow-hidden">
                            <div class="position-relative">
                                <?php
                                if ($related->thumbnail_url) :
                                    $thumbnail = $related->thumbnail_url;
                                else :
                                    $thumbnail = 'products/Brazil-Flag.png';
                                endif;
                                ?>
                                <?= $this->Html->link(
                                    $this->Html->image($thumbnail, [
                                        'alt' => h($related->name) . ' Image',
                                        'class' => 'card-img-top',
                                    ]),
                                    ['controller' => 'Products', 'action' => 'view', $related->id],
                                    ['escape' => false]
                                ) ?>
                            </div>
                            <div class="card-body pt-3 p-4">
                                <h6 class="fs-4"><?= h($related->name) ?></h6>
                                <div class="d-flex align-items-center justify-content-between">
                                    <?php if (($related->discount_type === 'fixed' || $related->discount_type === 'percentage') && $related->discount_value) : ?>
                                        <h6 class="fs-4 mb-0"><?= $this->Number->currency($related->discount_value, 'AUD') ?>
                                            <span class="ms-2 fw-normal text-muted fs-3">
                                            <del><?= $this->Number->currency($related->price, 'AUD') ?></del>
                                        </span>
                                        </h6>
                                    <?php else : ?>
                                        <?= $this->Number->currency($related->price, 'AUD') ?>
                                    <?php endif; ?>
                                    <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <?php
                                        // Calculate average rating for related product
                                        $relatedAverageRating = 0;
                                        $relatedTotalReviews = count($related->reviews);
                                        if ($relatedTotalReviews > 0) {
                                            $sumRelatedRatings = 0;
                                            foreach ($related->reviews as $rReview) {
                                                $sumRelatedRatings += $rReview->rating;
                                            }
                                            $relatedAverageRating = round($sumRelatedRatings / $relatedTotalReviews, 1);
                                        }
                                        ?>
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <li>
                                                <i class="ti ti-star <?= $i <= floor($relatedAverageRating) ? 'text-warning' : 'text-muted' ?> fs-6"></i>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No related products found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $this->start('customScript'); ?>

<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?= $this->Html->script('/libs/owl.carousel/dist/owl.carousel.min') ?>
<?= $this->Html->script('apps/productDetail') ?>

<?php $this->end(); ?>
