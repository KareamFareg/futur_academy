<?php $attributes = $attributes->exceptProps(['category']); ?>
<?php foreach (array_filter((['category']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

    <li>
        <a href="<?php echo e($category->link); ?>"><?php echo e($category->Title); ?></a>

        <ul>
        <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category-item','data' => ['category' => $child]]); ?>
<?php $component->withName('category-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($child)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </ul>

    </li><?php /**PATH C:\xampp\htdocs\academic\resources\views/components/category-item.blade.php ENDPATH**/ ?>