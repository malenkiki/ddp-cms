<?php
/*
 * Copyright (c) 2016 Michel Petit <petit.michel@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Malenki\Ddp\Model;

class Tag extends Element
{
    protected $parent = null;

    /**
     * Sets parent for current tag. 
     * 
     * @param Tag $tag 
     * @return Tag
     */
    public function setParent(Tag &$tag)
    {
        if ($this !== $tag) {
            $this->parent = $tag;
        }

        return $this;
    }

    /**
     * Checks whether current tag has a parent defined. 
     * 
     * @return boolean
     */
    public function hasParent()
    {
        return !is_null($this->parent);
    }

    /**
     * Gets parent if available 
     * 
     * @return Tag
     */
    public function getParent()
    {
        return $this->parent;
    }
}
