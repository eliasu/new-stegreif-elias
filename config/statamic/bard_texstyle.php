<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Styles
    |--------------------------------------------------------------------------
    |
    | List of toggleable styles.
    |
    */

    'styles' => [

        // 'hero' => [
        //     'type'   => 'heading',
        //     'level'  => 1,
        //     'name'   => 'Hero Heading',
        //     'ident'  => 'H',
        //     'class'  => 'hero-heading',
        //     'cp_css' => 'font-family: Caslon',
        // ],

        'bigger' => [
            'type'   => 'paragraph',
            'name'   => 'Bigger',
            'ident'  => 'B',
            'class'  => 'text-2xl leading-l', 
            'cp_css' => 'font-size: 1.25em;',
        ],

        'smaller' => [
            'type'   => 'paragraph',
            'name'   => 'Smaller',
            'ident'  => 'S',
            'class'  => 'text-sm leading-l',
            'cp_css' => 'font-size: 0.85em;',
        ],

        'accent' => [
            'type'   => 'span',
            'name'   => 'Accent Color',
            'ident'  => 'A',
            'class'  => 'text-skin-primary',
            'cp_css' => 'color: dodgerblue; font-weight: 700',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Classes
    |--------------------------------------------------------------------------
    |
    | Default classes that will be applied to elements with no style set.
    |
    */

    'default_classes' => [
        // 'heading' => [
        //     1 => 'heading-1',
        //     2 => 'heading-2',
        //     3 => 'heading-3',
        //     4 => 'heading-4',
        //     5 => 'heading-5',
        //     6 => 'heading-6',
        // ],
        // 'paragraph' => 'paragraph',
    ],

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    |
    | By default the class names are saved to your content. If you would prefer
    | to save the style keys instead you can change this option to "key".
    |
    */

    'store' => 'class',

];
