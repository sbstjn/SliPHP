<?php

Namespace SliPHP;

Trait body
{
    /**
     * Set ad get the body View
     *
     * @param View|null $body
     * @return View
     */
    public function body(View $body = null)
    {
        return $body === null ? $this->body : $this->body = $body;
    }
}
