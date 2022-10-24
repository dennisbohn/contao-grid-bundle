<?php

declare(strict_types=1);

/*
 * This file is part of erdmannfreunde/contao-grid-bundle.
 *
 * (c) Erdmann & Freunde <https://erdmann-freunde.de>
 *
 * @license MIT
 */

$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace(
    ',combineScripts',
    ',combineScripts,addEuFGridCss',
    $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['addEuFGridCss'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_layout']['addEuFGridCss'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "char(1) NOT NULL default ''",
];
