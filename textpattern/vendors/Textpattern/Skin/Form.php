<?php

/*
 * Textpattern Content Management System
 * https://textpattern.com/
 *
 * Copyright (C) 2018 The Textpattern Development Team
 *
 * This file is part of Textpattern.
 *
 * Textpattern is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation, version 2.
 *
 * Textpattern is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Textpattern. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * Form
 *
 * Manages Form.
 *
 * @since   4.7.0
 * @package Skin
 */

namespace Textpattern\Skin {

    class Form extends AssetBase implements FormInterface
    {
        protected static $event = 'form';
        protected static $table = 'txp_form';
        protected static $dir = 'forms';
        protected static $subdirField = 'type';
        protected static $subdirValues = array('article', 'category', 'comment', 'file', 'link', 'section', 'misc');
        protected static $defaultSubdir = 'misc';
        protected static $fileContentsField = 'Form';
        protected static $essential = array(
            array(
                'name' => 'comments',
                'type' => 'comment',
                'Form' => '<!-- Here goes the default rendering contents of the comments tag. '
                         .'See https://docs.textpattern.io/tags/comments. -->',
            ),
            array(
                'name' => 'comments_display',
                'type' => 'comment',
                'Form' => '<!-- Here goes the default rendering contents of the popup_comments tag. '
                         .'See https://docs.textpattern.io/tags/popup_comments. -->',
            ),
            array(
                'name' => 'comment_form',
                'type' => 'comment',
                'Form' => '<!-- Here goes the default rendering contents of the comments_form tag. '
                         .'See https://docs.textpattern.io/tags/comments_form. -->',
            ),
            array(
                'name' => 'default',
                'type' => 'article',
                'Form' => '<!-- Here goes the default rendering contents of the article tag. '
                         .'See https://docs.textpattern.io/tags/article. -->',
            ),
            array(
                'name' => 'plainlinks',
                'type' => 'link',
                'Form' => '<!-- Here goes the default rendering contents of the linklist tag. '
                         .'See https://docs.textpattern.io/tags/linklist. -->',
            ),
            array(
                'name' => 'files',
                'type' => 'file',
                'Form' => '<!-- Here goes the default rendering contents of the file_download tag. '
                         .'See https://docs.textpattern.io/tags/file_download. -->',
            ),
        );

        /**
         * $infos+$name properties setter.
         *
         * @param  string $name Form name;
         * @param  string $type Form type;
         * @param  string $Form Form contents;
         * @return object $this The current class object (chainable).
         */

        public function setInfos(
            $name,
            $type = null,
            $Form = null
        ) {
            $name = $this->setName($name)->getName();

            $this->infos = compact('name', 'type', 'Form');

            return $this;
        }

        /**
         * $defaultSubdir property getter.
         */

        public static function getTypes()
        {
            return static::$subdirValues;
        }
    }
}