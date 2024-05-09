@props(['name', 'disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'name' => $name,
    'placeholder' => $attributes->get('placeholder'),
    'value' => $attributes->get('value'),
    'class' =>
        'w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm',
]) !!}>
