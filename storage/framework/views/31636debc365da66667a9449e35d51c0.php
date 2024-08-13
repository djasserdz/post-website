<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['post']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['post']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="border border-gray-200 rounded-lg shadow-md bg-white transition-transform duration-300 hover:scale-105 hover:shadow-xl max-w-md mx-auto">
    <img src="<?php echo e(asset('storage/'.$post->image_path)); ?>" alt="Post image" class="w-full h-48 object-cover rounded-t-lg">
    <div class="p-4">
        <p class="text-xl font-bold text-gray-800 mb-3"><?php echo e($post->title); ?></p>
        <div class="text-gray-700 mb-3">
            <?php echo e($slot); ?>

        </div>
        <p class="text-gray-600 text-sm"><?php echo e($post->body); ?></p>
    </div>
</div>
<?php /**PATH C:\Users\gndja\Desktop\Post app\resources\views/components/postcard.blade.php ENDPATH**/ ?>