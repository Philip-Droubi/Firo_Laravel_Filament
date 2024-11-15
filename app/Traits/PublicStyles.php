<?php

namespace App\Traits;

trait PublicStyles
{
    public function getInfolistFieldStyle(): string
    {
        return "border-radius:4px;
                border:1px solid #84808066;
                padding:4px 12px;
                background-color: #84808024";
    }

    public function getEditAsPileButton(): string
    {
        return "padding:5px;
                border-radius:6px;
                border:1px solid #fbbf24;
                background-color:#fbbf241f;";
    }

    public function getDeleteAsPileButton(): string
    {
        return "padding:5px;
                border-radius:6px;
                border:1px solid #f87171;
                background-color:#f871711f;
                margin-inline-start:auto;";
    }
}
