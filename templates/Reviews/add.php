<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Product $product
 */
?>
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Add Review</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Add Review</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <?= $this->Html->image('breadcrumb/ChatBc.png', [
                            'alt' => 'review-img',
                            'class' => 'img-fluid mb-n4',
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->Form->create($review, ['class' => 'form-horizontal']) ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-7">
                        <h4 class="card-title">Review Details</h4>
                    </div>

                    <!-- display product name -->
                    <div class="mb-4">
                        <?= $this->Form->label('product_name', 'Product Name <span class="text-danger">*</span>', ['escape' => false, 'class' => 'form-label']) ?>
                        <?= $this->Form->text('product_name', ['value' => h($product->name), 'class' => 'form-control', 'readonly' => true]) ?>
                    </div>

                    <!-- Ratings and comments -->
                    <div class="mb-4">
                        <?= $this->Form->label('rating', 'Rating <span class="text-danger">*</span>', ['escape' => false, 'class' => 'form-label']) ?>

                        <!-- Star rating -->
                        <div class="star-rating">
                            <input type="hidden" name="rating" id="ratingInput" value="0">
                            <span class="star" data-value="1">&#9733;</span>
                            <span class="star" data-value="2">&#9733;</span>
                            <span class="star" data-value="3">&#9733;</span>
                            <span class="star" data-value="4">&#9733;</span>
                            <span class="star" data-value="5">&#9733;</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <?= $this->Form->label('comment', 'Comment <span class="text-danger"></span>', ['escape' => false, 'class' => 'form-label']) ?>
                        <?= $this->Form->textarea('comment', ['class' => 'form-control', 'placeholder' => 'Enter your review']) ?>
                    </div>
                </div>
            </div>

            <!-- Form operation button -->
            <div class="form-actions mb-5">
                <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn bg-danger-subtle text-danger ms-6']) ?>
            </div>
        </div>
    </div>
<?= $this->Form->end() ?>

<?php $this->start('customScript'); ?>

    <style>
        .star-rating {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
        }
        .star-rating .star.active,
        .star-rating .star:hover,
        .star-rating .star.hovered {
            color: gold;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star-rating .star');
            const ratingInput = document.getElementById('ratingInput');

            stars.forEach(star => {
                // Highlight the current and previous stars when hovering.
                star.addEventListener('mouseover', function () {
                    const value = this.getAttribute('data-value');
                    resetStars();
                    highlightStars(value);
                });

                // When the mouse is removed, it is reset to the previously clicked scoring state.
                star.addEventListener('mouseout', function () {
                    resetStars();
                    highlightStars(ratingInput.value);
                });

                // set the score value when clicking
                star.addEventListener('click', function () {
                    const value = this.getAttribute('data-value');
                    ratingInput.value = value;
                    resetStars();
                    highlightStars(value);
                });
            });

            // Reset the star highlighting state
            function resetStars() {
                stars.forEach(s => s.classList.remove('hovered', 'active'));
            }

            // Highlight the stars according to the score
            function highlightStars(value) {
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('hovered');
                }
            }
        });
    </script>

<?php $this->end(); ?>
