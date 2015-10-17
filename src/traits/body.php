<?php

Namespace SliPHP;

Trait body
{
    /**
     * Set ad get the body View
     *
     * @param View|string|null $body
     * @return View
     */
    public function body($body = null)
    {
        if ($body === null) {
            return $this->body;
        } elseif ($body instanceof View) {
            return $this->body = $body;
        } else {
            return $this->body = new View($body, $this->locals);
        }
    }
}
