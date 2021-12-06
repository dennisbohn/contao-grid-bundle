<?php

declare(strict_types=1);

/*
 * This file is part of erdmannfreunde/contao-grid-bundle.
 *
 * (c) Erdmann & Freunde <https://erdmann-freunde.de>
 *
 * @license MIT
 */

use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\Content;
use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\GridClassesOptionsListener;
use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\GridColsOptionsListener;
use ErdmannFreunde\ContaoGridBundle\EventListener\DataContainer\RegisterFieldsInPaletteListener;

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = [RegisterFieldsInPaletteListener::class, 'onLoadContentCallback'];
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = [Content::class, 'onsubmitCallback'];

$GLOBALS['TL_DCA']['tl_content']['palettes']['rowStart'] = '{type_legend},type;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_content']['palettes']['rowEnd'] = '{type_legend},type';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colStart'] =
    '{type_legend},type;{grid_legend},grid_columns,grid_options;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_content']['palettes']['colEnd'] = '{type_legend},type';

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_columns'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['grid_columns'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'select',
    'options_callback' => [GridColsOptionsListener::class, 'onOptionsCallback'],
    'eval' => [
        'mandatory' => false,
        'multiple' => true,
        'size' => 10,
        'tl_class' => 'w50 w50h autoheight',
        'chosen' => true,
    ],
    'sql' => 'text NULL',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['grid_options'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['grid_options'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'select',
    'options_callback' => [GridClassesOptionsListener::class, 'onOptionsCallback'],
    'eval' => [
        'mandatory' => false,
        'multiple' => true,
        'size' => 10,
        'tl_class' => 'w50 w50h autoheight',
        'chosen' => true,
    ],
    'sql' => 'text NULL',
];
